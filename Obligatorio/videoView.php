<?php

session_start();
require_once("includes/class.Conexion.BD.php");
require_once("config/parametros.php");

$videoId = intval($_POST['videoId']);

$conn = new ConexionBD(DRIVER, SERVIDOR, BASE, USUARIO, CLAVE);
if ($conn->conectar()) {
    $sql = "SELECT idVideo, views FROM videos WHERE idVideo = :videoId";
    $params = array();
    $params[0] = array("videoId", $videoId, "int");

    if ($conn->consulta($sql, $params)) {
        $video = $conn->siguienteRegistro();
        $newViewsQty = intval($video["views"]) + 1;
        $sqlUpdate = "UPDATE videos SET views = :newViewsQty WHERE idVideo = :videoId";
        $paramsUpdate = array();
        $paramsUpdate[0] = array("newViewsQty", $newViewsQty, "int");
        $paramsUpdate[1] = array("videoId", $videoId, "int");
        if ($conn->consulta($sqlUpdate, $paramsUpdate)) {
            $result = array("success" => true);
            echo json_encode($result);
        } else {
            $result = array("success" => false, "errorMsj" => "Internet connection error, please reload the page.");
            echo json_encode($result);
        }
    } else {
        $result = array("success" => false, "errorMsj" => "Internet connection error, please reload the page.");
        echo json_encode($result);
    }
} else {
    $result = array("success" => false, "errorMsj" => "Internet connection error, please reload the page.");
    echo json_encode($result);
}