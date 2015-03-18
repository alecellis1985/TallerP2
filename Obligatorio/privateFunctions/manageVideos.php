<?php

session_start();
require_once("../includes/class.Conexion.BD.php");
require_once("../config/parametros.php");
require_once("../includes/libs/Smarty.class.php");
$smarty = new Smarty();
$smarty->template_dir = '../templates';
$smarty->compile_dir = '../templates_c';

if ($_SESSION['ingreso']) {
    $conn = new ConexionBD(DRIVER, SERVIDOR, BASE, USUARIO, CLAVE);
    if ($conn->conectar()) {
        $sql = "SELECT * FROM videos"; //WHERE deleted <> 1
        if ($conn->consulta($sql)) {
            $videos = $conn->restantesRegistros();
            $smarty->assign("videos", $videos);
            $smarty->display("private/managevideos.tpl");
        } else {
            echo "Error, please refresh the web.";
        }
        $conn->desconectar();
    } else {
        echo "SQL ERROR";
    }
} else {
    echo "Unauthorized user";
}