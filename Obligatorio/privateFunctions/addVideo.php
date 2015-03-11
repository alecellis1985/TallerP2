<?php

require_once("../config/parametros.php");
require_once("../includes/class.Conexion.BD.php");
//TODO MISSING TITLE
$client = $_POST['client'];
$url = $_POST['url'];
$releaseDate = $_POST['releaseDate'];
$description = $_POST['description'];

$conn = new ConexionBD(DRIVER,SERVIDOR,BASE,USUARIO,CLAVE);
if($conn->conectar()){
        $sql = "INSERT INTO videos (client, url, releaseDate,description,destacado,views,deleted)";
        $sql .= " VALUES (:client, :url, :releaseDate,:description,0,0,0)";
	$parametros = array();
	$parametros[0] =  array("client",$client,"STRING",200);
	$parametros[1] =  array("url",$url,"STRING",150);
	$parametros[2] =  array("releaseDate",$releaseDate,"STRING",250);
        $parametros[3] =  array("description",$description,"STRING",250);
	if($conn->consulta($sql,$parametros)){
            $id = $conn->ultimoIdInsert();
            $sql2 = "SELECT * FROM videos where idVideo = " . $id;
            if($conn->consulta($sql2)){
                $elemInserted = $conn->restantesRegistros();
                $result = array("success" =>true,'msg'=>'Video successfully added',"element"=>$elemInserted);
                echo json_encode($result);
            }
            else
            {
                    echo "Error de SQL 1";
            }
	}
	else
        {
		echo "Error de SQL 2";
	}
}
else
{
	echo "Error de Conexion";
}
