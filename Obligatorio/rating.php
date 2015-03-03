<?php

session_start();
require_once("includes/class.Conexion.BD.php");
require_once("config/parametros.php");

$rating = (int) $_POST['rating'];
$videoId = (int) $_POST['videoId'];
$userIp = $_SERVER['REMOTE_ADDR'];

$conn = new ConexionBD(DRIVER, SERVIDOR, BASE, USUARIO, CLAVE);
if ($conn->conectar()) {
    $sql = "SELECT * FROM ratings WHERE idVideo = :videoId and ip = :userIp";
    $params = array();
    $params[0] = array("videoId", $videoId, "int");
    $params[1] = array("userIp", $userIp, "string");

    if ($conn->consulta($sql, $params)) {
        $ratings = $conn->restantesRegistros();
        $ratingRow = $ratings[0];
        if (isset($ratingRow['ip'])) {
            $result = array("success" => false, "errorMsj" => "You have already rated this video.");
            echo json_encode($result);
        } else {
            $sqlInsert = "INSERT INTO ratings VALUES (:videoId,:rating,:userIp)";
            $paramsIns = array();
            $paramsIns[0] = array("videoId", $videoId, "int");
            $paramsIns[2] = array("userIp", $userIp, "string");
            $paramsIns[1] = array("rating", $rating, "int");
            if ($conn->consulta($sqlInsert, $paramsIns)) {
                $result = array("success" => true, "errorMsj" => "");
                echo json_encode($result);
            } else {
                $result = array("success" => false, "errorMsj" => "SQL error.", "data" => $paramsIns);
                echo json_encode($result);
            }
        }
    } else {
        $result = array("success" => false, "errorMsj" => "Internet connection error, please reload the page.");
        echo json_encode($result);
    }
}

