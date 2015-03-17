<?php

session_start();
require_once("includes/libs/Smarty.class.php");
require_once("includes/class.Conexion.BD.php");
require_once("config/parametros.php");

$smarty = new Smarty();
$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';

$conn = new ConexionBD(DRIVER, SERVIDOR, BASE, USUARIO, CLAVE);
if ($conn->conectar()) {
    $sql = "SELECT * FROM videos WHERE deleted <> 1 AND destacado = 1";
    if ($conn->consulta($sql, array())) {
        $mainVideo = $conn->restantesRegistros();
        $smarty->assign("mainVideo", $mainVideo);
        $smarty->assign("videoExists", $conn->cantidadRegistros() > 0);
    } else {
        echo "Error de SQL";
    }
} else {
    echo "Error de Conexi�n";
}

$smarty->display("index.tpl");
