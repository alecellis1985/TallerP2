<?php

require_once("../config/parametros.php");
require_once("../includes/class.Conexion.BD.php");
require_once("../includes/MessageHandler.php");
//TODO MISSING TITLE
$idVideo = $_POST['idVideo'];
$title = $_POST['title'];
$client = $_POST['client'];
$url = $_POST['url'];
$releaseDate = $_POST['releaseDate'];
$description = $_POST['description'];
$conn = new ConexionBD(DRIVER,SERVIDOR,BASE,USUARIO,CLAVE);
$response = null;
if($conn->conectar()){
    $sql = "UPDATE videos SET client = :client , url = :url , releaseDate = :releaseDate , description = :description, title =:title WHERE idVideo = :idVideo ";        
    $parametros = array();
    $parametros[0] =  array("client",$client,"STRING",200);
    $parametros[1] =  array("url",$url,"STRING",150);
    $parametros[2] =  array("releaseDate",$releaseDate,"STRING",250);
    $parametros[3] =  array("description",$description,"STRING",250);
    $parametros[4] =  array("idVideo",$idVideo,"INT");
    $parametros[5] =  array("title",$title,"STRING",45);
    
    if($conn->consulta($sql,$parametros)){
        $response = MessageHandler::getSuccessResponse('Video successfully updated',null);
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

