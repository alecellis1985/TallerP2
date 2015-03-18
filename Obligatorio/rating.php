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
                $result = array("success" => false, "errorMsj" => "SQL error.", "data" => $paramsIns);
                echo json_encode($result);
            }
        }
    } else {
        $result = array("success" => false, "errorMsj" => "Internet connection error, please reload the page.");
        echo json_encode($result);
    }
}

