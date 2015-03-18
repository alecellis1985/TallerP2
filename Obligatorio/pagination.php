<?php

require_once("includes/libs/Smarty.class.php");
require_once("includes/class.Conexion.BD.php");
require_once("config/parametros.php");
$pagina = (int) $_POST['pagenumber'];
$conn = new ConexionBD(DRIVER, SERVIDOR, BASE, USUARIO, CLAVE);

session_start();
$smarty = new Smarty();
$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';

if ($conn->conectar()) {
    if (empty($pagina)) {
        $pagina = 1;
    }
    $sql = "SELECT * FROM videos WHERE deleted  <> 1 ORDER BY rating desc LIMIT " . (($pagina - 1) * CANTPAG) . "," . CANTPAG;
    if ($conn->consulta($sql, array())) {
        $videos = $conn->restantesRegistros();
        $smarty->assign('videos', $videos);
        $smarty->assign('videosCountInPage', count($videos));
        $smarty->display("videoPage.tpl");
    } else {
        echo "Error de SQL";
    }
} else {
    echo "Error de Conexion";
}    
