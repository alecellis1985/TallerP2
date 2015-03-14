<?php
session_start();
require_once("../includes/class.Conexion.BD.php");
require_once("../config/parametros.php");
require_once("../includes/libs/Smarty.class.php");

$smarty = new Smarty();
$smarty->template_dir = '../templates';
$smarty->compile_dir = '../templates_c';

if ($_SESSION['ingreso']) 
{
    $conn = new ConexionBD(DRIVER, SERVIDOR, BASE, USUARIO, CLAVE);
    if ($conn->conectar()) {
        $sqlVideosPerRating = "SELECT * FROM comments ORDER BY dateTime DESC";
        if ($conn->consulta($sqlVideosPerRating)) {
            $comments = $conn->restantesRegistros();
            $count = $conn->cantidadRegistros();
            $smarty->assign("commentsCount", $count);
            $smarty->assign("comments", $comments);
                $smarty->display("commentsPrivate.tpl");
            } else {
                echo "Error, please refresh the web.";
            }
            $conn->desconectar();
        }
} else {
    echo "Unauthorized user";
}
