<?php

require_once("includes/libs/Smarty.class.php");
require_once("includes/class.Conexion.BD.php");
require_once("config/parametros.php");

$smarty = new Smarty();
$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';

$conn = new ConexionBD(DRIVER,SERVIDOR,BASE,USUARIO,CLAVE);
if($conn->conectar())
{
    $sql = "SELECT * FROM videos WHERE deleted <> 1 LIMIT 8";
    if($conn->consulta($sql,array())){
        $mainVideo = $conn->restantesRegistros();
        //var_dump($mainVideo);
        $smarty->assign("mainVideo", $mainVideo);
		
    }
    else{
            echo "Error de SQL";
    }
}
else
{
    echo "Error de Conexi�n";
}


/*$conn = new PDO('mysql:host=localhost;dbname=videoProducer', 'root', 'turtleman1');
$sql = "SELECT * FROM videos WHERE deleted <> 1 LIMIT 8";
$result = $conn->query($sql);

$firstVideo = $result->fetch();

if ($firstVideo)
    $mainVideo = $firstVideo;
$smarty->assign("mainVideo", $mainVideo);*/

$smarty->display("index.tpl");
