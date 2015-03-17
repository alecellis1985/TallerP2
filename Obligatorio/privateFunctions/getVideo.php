<?php

require_once("../config/parametros.php");
require_once("../includes/class.Conexion.BD.php");
require_once("../includes/MessageHandler.php");

if ($_SESSION['ingreso']) {
    $idVideo = $_GET['idVideo'];
    $conn = new ConexionBD(DRIVER,SERVIDOR,BASE,USUARIO,CLAVE);
    $response = null;
    if($conn->conectar()){
        $sql = "SELECT * FROM videos WHERE idVideo = :idVideo ";        
        $parametros = array();
        $parametros[0] =  array("idVideo",$idVideo,"INT");
        if($conn->consulta($sql,$parametros)){
            $data = $conn->restantesRegistros();
            $response = MessageHandler::getSuccessResponse('Video Exists',$data);
        }
    }

    if($response == null)
    {
        header('HTTP/1.1 400 Bad Request');
        echo MessageHandler::getDBErrorResponse();
    }
    else
    {
        echo $response;
    }
}
else
{
    echo "Unauthorized";
}

