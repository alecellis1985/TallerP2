<?php

require_once("../config/parametros.php");
require_once("../includes/class.Conexion.BD.php");
require_once("../includes/MessageHandler.php");
session_start();
if($_SESSION['ingreso'])
{
   $idVideo = $_POST['idVideo'];
   $conn = new ConexionBD(DRIVER, SERVIDOR, BASE, USUARIO, CLAVE);
   $response = null;
    if($conn->conectar())
    {
        $sql = "UPDATE videos SET deleted = 1 where idVideo = :idVideo";
        $params = array();
        $params[0] = array("idVideo", $idVideo, "INT");
        if ($conn->consulta($sql, $params)) {
            $response = MessageHandler::getSuccessResponse('Video successfully deleted', null);
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
