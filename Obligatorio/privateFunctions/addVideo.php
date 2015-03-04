<?php

require_once("../config/parametros.php");
require_once("../includes/class.Conexion.BD.php");
//TODO MISSING TITLE
$client = $_Post['client'];
$url = $_Post['url'];
$releaseDate = $_Post['releaseDate'];
$description = $_Post['description'];

$conn = new ConexionBD(DRIVER,SERVIDOR,BASE,USUARIO,CLAVE);

if($conn->conectar()){
//	if($accion=="N"){ //Es uno nuevo
		$sql = "INSERT INTO videos (client, url, releaseDate,description,destacado,views,deleted)";
		$sql .= " VALUES (:client, :url, :releaseDate,:description,0,0,0)";
//	}
//	else{	//Es Modificaci�n
//		$sql = "UPDATE autores SET nombre = :nombre, especialidad = :especialidad,";
//		$sql .= " foto = :foto WHERE id = :id";
//	}
	
	$parametros = array();
	$parametros[0] =  array("client",$client,"STRING",200);
	$parametros[1] =  array("url",$url,"STRING",150);
	$parametros[2] =  array("releaseDate",$releaseDate,"STRING",250);
        $parametros[3] =  array("description",$description,"STRING",250);
	if($conn->consulta($sql,$parametros)){
            $id = $conn->ultimoIdInsert();
            $sql2 = "SELECT * FROM videos where id = " . $id;
            if($conn->consulta($sql)){
                $result = array("success" =>true,'msg'=>'Elemento Insertado',"element"=>$insertedVid);
                echo json_encode($result);
            }
            else{
                    echo "Error de SQL";
            }
	}
	else{
		echo "Error de SQL";
	}
	
}
else{
	echo "Error de Conexi�n";
}
