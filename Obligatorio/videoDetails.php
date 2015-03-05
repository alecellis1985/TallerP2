<?php

session_start();
require_once("includes/libs/Smarty.class.php");
require_once("includes/class.Conexion.BD.php");
require_once("config/parametros.php");
$videoId = (int) $_POST['videoId'];
$conn = new ConexionBD(DRIVER, SERVIDOR, BASE, USUARIO, CLAVE);

$smarty = new Smarty();
$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';

if ($conn->conectar()) {
    $sqlSelectVideo = "SELECT * FROM videos WHERE idVideo = :videoId";
    $paramsSelect = array();
    $paramsSelect[0] = array("videoId", $videoId, "int");
    if ($conn->consulta($sqlSelectVideo, $paramsSelect)) {
        $video = $conn->siguienteRegistro();
        $smarty->assign('video', $video);

        $sqlComments = "SELECT * FROM comments WHERE idVideo = :videoId ORDER BY dateTime LIMIT 8";
        $paramsComments = array();
        $paramsComments[0] = array("videoId", $videoId, "int");
        if ($conn->consulta($sqlComments, $paramsComments)) {
            $comments = $conn->restantesRegistros();
            $smarty->assign("comments", $comments);

            $sqlCount = "SELECT COUNT(*) FROM comments WHERE idVideo = :videoId";
            $paramsCount = array();
            $paramsCount[0] = array("videoId", $videoId, "int");
            if ($conn->consulta($sqlCount, $paramsCount)) {
                $commentsPages = ceil((int) $conn->cantidadRegistros() / CANTPAG);
                $smarty->assign("commentsPages", $commentsPages);
                $smarty->display("videoDetails.tpl");
            } else {
                echo "SQL ERROR.";
            }
        } else {
            echo "SQL ERROR";
        }
    } else {
        echo "SQL ERROR";
    }
} else {
//    $result = array("success" => false, "errorMsj" => "Internet connection error, please reload the page.");
//    echo json_encode($result);
    echo "SQL ERROR.";
}    
