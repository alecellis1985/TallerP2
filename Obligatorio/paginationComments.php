<?php

require_once("includes/class.Conexion.BD.php");
require_once("includes/libs/Smarty.class.php");
require_once("config/parametros.php");
$pagina = (int) $_POST['pagenumber'];
$idVideo = (int) $_POST['idVideo'];
$conn = new ConexionBD(DRIVER, SERVIDOR, BASE, USUARIO, CLAVE);

$smarty = new Smarty();
$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';

if ($conn->conectar()) {
    if (empty($pagina)) {
        $pagina = 1;
    }
    $sql = "SELECT * FROM comments WHERE idVideo = :videoId AND public = true ORDER BY dateTime desc LIMIT " . (($pagina - 1) * CANTPAGCOMMENTS) . "," . CANTPAGCOMMENTS;
    $paramsComments = array();
    $paramsComments[0] = array("videoId", $idVideo, "int");
    if ($conn->consulta($sql, $paramsComments)) {
        $comments = $conn->restantesRegistros();
        $smarty->assign("comments", $comments);
        $smarty->display("videoComments.tpl");
        $conn->desconectar();
    } else {
        $conn->desconectar();
        echo "Error de SQL";
    }
} else {
    $conn->desconectar();
    echo "Error de Conexion";
}    
