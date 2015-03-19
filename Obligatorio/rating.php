<?php

session_start();
require_once("includes/class.Conexion.BD.php");
require_once("config/parametros.php");
require_once("includes/MessageHandler.php");

$rating = (int) $_POST['rating'];
$videoId = (int) $_POST['videoId'];
$userIp = $_SERVER['REMOTE_ADDR'];

$conn = new ConexionBD(DRIVER, SERVIDOR, BASE, USUARIO, CLAVE);
$response = null;
if ($conn->conectar()) {
    $sql = "SELECT * FROM ratings WHERE idVideo = :videoId and ip = :userIp";
    $params = array();
    $params[0] = array("videoId", $videoId, "int");
    $params[1] = array("userIp", $userIp, "string");

    if ($conn->consulta($sql, $params)) {
        $ratings = $conn->restantesRegistros();
        $ratingRow = $ratings[0];
        if (isset($ratingRow['ip'])) {
            $response = MessageHandler::getErrorResponse("You have already rated this video.");
        } else {
            $sqlInsert = "INSERT INTO ratings VALUES (:videoId,:rating,:userIp)";
            $paramsIns = array();
            $paramsIns[0] = array("videoId", $videoId, "int");
            $paramsIns[2] = array("userIp", $userIp, "string");
            $paramsIns[1] = array("rating", $rating, "int");
            if ($conn->consulta($sqlInsert, $paramsIns)) {

                $sqlSelectVideo = "SELECT * FROM videos WHERE idVideo = :idVideo";
                $paramsSelect = array();
                $paramsSelect[0] = array("idVideo", $videoId, "int");
                if ($conn->consulta($sqlSelectVideo, $paramsSelect)) {
                    $videos = $conn->restantesRegistros();
                    $video = $videos[0];
                    $newVotes = intval($video["votes"]) + 1;
                    $currentRating = floatval($video["rating"]);
                    $newAvgRating = (($currentRating + $rating) / $newVotes);
                    $newAvgRatingString = number_format($newAvgRating, 2, '.', '');
                    $sqlUpdate = "UPDATE videos SET rating = :rating, votes = :votes WHERE idVideo = :idVideo";
                    $paramsUpdate = array();
                    $paramsUpdate[0] = array("rating", $newAvgRatingString, "string");
                    $paramsUpdate[2] = array("votes", $newVotes, "int");
                    $paramsUpdate[1] = array("idVideo", $videoId, "int");

                    if ($conn->consulta($sqlUpdate, $paramsUpdate)) {
                        $response = MessageHandler::getSuccessResponse("", null);
                    } else {
                        $response = MessageHandler::getErrorResponse("Internet connection error, please reload the page.");
                    }
                } else {

                    $response = MessageHandler::getErrorResponse("Internet connection error, please reload the page.");
                }
            } else {
                $result = array("success" => false, "errorMsj" => "SQL error.", "data" => $paramsIns);
                echo json_encode($result);
            }
        }
    } else {
        $response = MessageHandler::getErrorResponse("Internet connection error, please reload the page.");
    }
}
if ($response == null) {
    header('HTTP/1.1 400 Bad Request');
    $conn->desconectar();
    echo MessageHandler::getDBErrorResponse();
} else {
    $conn->desconectar();
    echo $response;
}

