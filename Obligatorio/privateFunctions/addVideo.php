<?php

require_once("../config/parametros.php");
require_once("../includes/class.Conexion.BD.php");
require_once("../includes/MessageHandler.php");

$client = $_POST['client'];
$url = $_POST['url'];
$releaseDate = $_POST['releaseDate'];
$description = $_POST['description'];
$title = $_POST['title'];

$conn = new ConexionBD(DRIVER,SERVIDOR,BASE,USUARIO,CLAVE);
$response = null;
if($conn->conectar()){
        $sql = "INSERT INTO videos (client, url, title, releaseDate, description, destacado, views, deleted)";
        $sql .= " VALUES (:client, :url, :title, :releaseDate, :description, 0, 0, 0)";
	$parametros = array();
	$parametros[0] =  array("client",$client,"STRING",45);
	$parametros[1] =  array("url",$url,"STRING",150);
        $parametros[2] =  array("title",$title,"STRING",45);
	$parametros[3] =  array("releaseDate",$releaseDate,"STRING",250);
        $parametros[4] =  array("description",$description,"STRING",250);
        /*
        * TODO: check if video already exists
         * * TODO: check if video already exists
         * * TODO: check if video already exists
         * * TODO: check if video already exists
         * TODO: check if video already exists
         *          */
	if($conn->consulta($sql,$parametros)){
            $id = $conn->ultimoIdInsert();
            $sql2 = "SELECT * FROM videos where idVideo = " . $id;
            if($conn->consulta($sql2)){
                $elemInserted = $conn->restantesRegistros();
                $response = MessageHandler::getSuccessResponse('Video successfully added', $elemInserted);
            }
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


