<?php

require_once("../config/parametros.php");
require_once("../includes/class.Conexion.BD.php");
//TODO MISSING TITLE
        
$idVideo = $_Post['idVideo'];
$client = $_Post['client'];
$url = $_Post['url'];
$releaseDate = $_Post['releaseDate'];
$description = $_Post['description'];
$conn = new ConexionBD(DRIVER,SERVIDOR,BASE,USUARIO,CLAVE);
if($conn->conectar()){
    var_dump($idVideo);
    var_dump($client);
    var_dump($url);
    var_dump($releaseDate);
    var_dump($description);
        $sql = "UPDATE videos SET client = :client , url = :url , releaseDate = :releaseDate , description = :description WHERE idVideo = :idVideo ";
        var_dump($sql);
        $parametros = array();
	$parametros[0] =  array("client",$client,"STRING",200);
	$parametros[1] =  array("url",$url,"STRING",150);
	$parametros[2] =  array("releaseDate",$releaseDate,"STRING",250);
        $parametros[3] =  array("description",$description,"STRING",250);
        $parametros[4] =  array("idVideo",$idVideo,"INT");
	if($conn->consulta($sql,$parametros)){
            $result = array("success" =>true,'msg'=>'Element updated');
            echo json_encode($result);
	}
	else{
		echo "Error de SQL";
	}
}
else{
	echo "Error de Conexi�n";
}


