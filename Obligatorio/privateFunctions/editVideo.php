<?php

require_once("../config/parametros.php");
require_once("../includes/class.Conexion.BD.php");
require_once("../includes/MessageHandler.php");
session_start();
if ($_SESSION['ingreso']) {
    $idVideo = $_POST['idVideo'];
    $title = $_POST['title'];
    $client = $_POST['client'];
    $url = $_POST['url'];
    $releaseDate = $_POST['releaseDate'];
    $description = $_POST['description'];
    $featured = $_POST['featured'];
    $conn = new ConexionBD(DRIVER, SERVIDOR, BASE, USUARIO, CLAVE);
    $response = null;
    if ($conn->conectar()) {
        //Check for video Url is not duplicated 
        $sqlCheck = "SELECT * FROM videos WHERE url = :url";
        $paramsCheck = array();
        $paramsCheck[0] = array("url", $url, "STRING", 150);
        if ($conn->consulta($sqlCheck, $paramsCheck) && $conn->cantidadRegistros() > 0) {
            $response = MessageHandler::getErrorResponse("Video already exists");
        } else {
            //Check if must update featured video
            $featuredInt = $featured ? 1 : 0;
            $sql = "UPDATE videos SET client = :client , url = :url , releaseDate = :releaseDate , description = :description, title =:title, destacado = :featured WHERE idVideo = :idVideo ";
            $parametros = array();
            $parametros[0] = array("client", $client, "STRING", 200);
            $parametros[1] = array("url", $url, "STRING", 150);
            $parametros[2] = array("releaseDate", $releaseDate, "STRING", 250);
            $parametros[3] = array("description", $description, "STRING", 250);
            $parametros[4] = array("idVideo", $idVideo, "INT");
            $parametros[5] = array("title", $title, "STRING", 45);
            $parametros[6] = array("featured", $featuredInt, "INT");

            if ($featured) {
                $sqlUpdateAll = "UPDATE videos SET destacado = 0 WHERE idVideo <> :idVideo";
                $parametros2 = array();
                $parametros2[0] = array("idVideo", $idVideo, "INT");
            }

            if ($conn->consulta($sql, $parametros) && $conn->consulta($sqlUpdateAll, $parametros2)) {
                $response = MessageHandler::getSuccessResponse('Video successfully updated', null);
            }
        }
    }

    if ($response == null) {
        header('HTTP/1.1 400 Bad Request');
        echo MessageHandler::getDBErrorResponse();
    } else {
        $conn->desconectar();
        echo $response;
    }
} else {
    header('HTTP/1.1 401 Unauthorized Request');
    echo MessageHandler::getDBUnauthorizedResponse();
}    
