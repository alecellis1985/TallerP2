<?php

require_once("../includes/libs/Smarty.class.php");
require_once("../includes/class.Conexion.BD.php");
require_once("../config/parametros.php");
require_once("../includes/MessageHandler.php");

$smarty = new Smarty();
$smarty->template_dir = '../templates';
$smarty->compile_dir = '../templates_c';

session_start();
if ($_SESSION['ingreso']) {
    $videoId = (int) $_POST['videoId'];
    $conn = new ConexionBD(DRIVER, SERVIDOR, BASE, USUARIO, CLAVE);
    if ($conn->conectar()) {
        $sqlSelectVideo = "SELECT * FROM videos WHERE idVideo = :videoId ";
        $paramsSelect = array();
        $paramsSelect[0] = array("videoId", $videoId, "int");
        if ($conn->consulta($sqlSelectVideo, $paramsSelect)) {
            $video = $conn->siguienteRegistro();
            $smarty->assign('video', $video);
            $sqlComments = "SELECT * FROM comments WHERE idVideo = :videoId AND public = true ORDER BY dateTime desc LIMIT " . CANTPAGCOMMENTS;
            $paramsComments = array();
            $paramsComments[0] = array("videoId", $videoId, "int");
            if ($conn->consulta($sqlComments, $paramsComments)) {
                $comments = $conn->restantesRegistros();
                $smarty->assign("comments", $comments);
                $sqlCount = "SELECT COUNT(*) FROM comments WHERE idVideo = :videoId";
                $paramsCount = array();
                $paramsCount[0] = array("videoId", $videoId, "int");
                if ($conn->consulta($sqlCount, $paramsCount)) {
                    $commentsCount = $conn->restantesRegistros();
                    $commentsPages = ceil((int) $commentsCount[0][0] / CANTPAGCOMMENTS);
                    $smarty->assign("commentsPages", $commentsPages);
                    $smarty->display("private/videoDetailsPrivate.tpl");
                    $conn->desconectar();
                } else {
                    $conn->desconectar();
                    echo "SQL ERROR.";
                }
            } else {
                $conn->desconectar();
                echo "SQL ERROR";
            }
        } else {
            $conn->desconectar();
            echo "SQL ERROR";
        }
    } else {
        echo "SQL ERROR.";
    }  
}
else
{
    header('HTTP/1.1 401 Unauthorized Request');
    echo MessageHandler::getDBUnauthorizedResponse();
}