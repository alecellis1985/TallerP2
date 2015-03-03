<?php

session_start();
require_once("includes/class.Conexion.BD.php");
require_once("config/parametros.php");

$rating = $_POST['rating'];
$videoId = $_POST['videoId'];
$userIp = $_POST['userIp'];

$conn = new ConexionBD(DRIVER, SERVIDOR, BASE, USUARIO, CLAVE);
if ($conn->conectar()) {
    $sql = "SELECT * FROM ratings WHERE idVideo = :videoId and ip = :userIp";
    $params = array();
    $params[0] = array("videoId", $videoId, "int");
    $params[1] = array("userIp", $userIp, "string");

    if ($conn->consulta($sql, $params)) {
        $ratings = $conn->restantesRegistros();
        $rating = $ratings[0];
        if (isset($rating['ip'])) {
            $result = array("success" => false, "errorMsj" => "You have already rated this video.");
            echo json_encode($result);
            //echo "Hello&nbsp" . $user['userName'] . " you have been successfuly logged in.";
        } else {
            $sqlInsert = "INSERT INTO ratings VALUES (:videoId,:rating,:userIp)";
            $params[2] = array("rating", $rating, "int");
            if ($conn->consulta($sql, $params)) {
                $result = array("success" => true, "errorMsj" => "");
                echo json_encode($result);
            } else {
                $result = array("success" => false, "errorMsj" => "Internet connection error, please reload the page.");
                echo json_encode($result);
            }            
        }
    } else {
        $result = array("success" => false, "errorMsj" => "Internet connection error, please reload the page.");
        echo json_encode($result);
    }
}

