<?php

require_once("../config/parametros.php");
require_once("../includes/class.Conexion.BD.php");
require_once("../includes/MessageHandler.php");

$client = $_POST['client'];
$url = $_POST['url'];
$releaseDate = $_POST['releaseDate'];
$description = $_POST['description'];
$title = $_POST['title'];
$featured = $_POST['featured'];
session_start();
if($_SESSION['ingreso'])
{
    $conn = new ConexionBD(DRIVER,SERVIDOR,BASE,USUARIO,CLAVE);
    $response = null;
    if ($conn->conectar()) {
        $featuredInt = $featured ? 1 : 0;
        if ($featured) {
            $sqlUpdateAll = "UPDATE videos SET destacado = 0";
        }
        $sql = "INSERT INTO videos (client, url, title, releaseDate, description, destacado, views, deleted)";
        $sql .= " VALUES (:client, :url, :title, :releaseDate, :description, destacado = :featured, 0, 0)";
        $parametros = array();
        $parametros[0] = array("client", $client, "STRING", 45);
        $parametros[1] = array("url", $url, "STRING", 150);
        $parametros[2] = array("title", $title, "STRING", 45);
        $parametros[3] = array("releaseDate", $releaseDate, "STRING", 250);
        $parametros[4] = array("description", $description, "STRING", 250);
        $parametros[5] = array("featured", $featuredInt, "INT");
        /*
         * TODO: check if video already exists
         *          */
        if($featured)
        {
            $sqlUpdateAll = "UPDATE videos SET destacado = 0";
            if($conn->consulta($sqlUpdateAll))
            {
                if ($conn->consulta($sql, $parametros)) {
                    $id = $conn->ultimoIdInsert();
                    $sql2 = "SELECT * FROM videos where idVideo = " . $id;
                    if ($conn->consulta($sql2)) {
                        $elemInserted = $conn->restantesRegistros();
                        $response = MessageHandler::getSuccessResponse('Video successfully added', $elemInserted);
                    }
                }
            }
        }
        else
        {
            if ($conn->consulta($sql, $parametros)) {
                    $id = $conn->ultimoIdInsert();
                    $sql2 = "SELECT * FROM videos where idVideo = " . $id;
                    if ($conn->consulta($sql2)) {
                        $elemInserted = $conn->restantesRegistros();
                        $response = MessageHandler::getSuccessResponse('Video successfully added', $elemInserted);
                    }
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
}
else
{
    header('HTTP/1.1 401 Unauthorized Request');
    echo MessageHandler::getDBUnauthorizedResponse();
}
