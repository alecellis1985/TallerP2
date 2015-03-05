<?php

session_start();
require_once("includes/class.Conexion.BD.php");
require_once("config/parametros.php");

$alias = $_POST['alias'];
$comment = $_POST['comment'];
$idVideo = intval($_POST['idVideo']);

if (!isset($comment)) {
    $result = array("success" => false, "errorMsj" => "Comment text is required");
    echo json_encode($result);
} else {

    $conn = new ConexionBD(DRIVER, SERVIDOR, BASE, USUARIO, CLAVE);
    if ($conn->conectar()) {

        $ip = $_SERVER['REMOTE_ADDR'];

        $sql = "INSERT INTO comments VALUES (default, :idVideo, :alias, :ip, :comment, NOW(),1)";
        $params = array();
        $params[0] = array("idVideo", $idVideo, "int");
        $params[1] = array("alias", $alias, "string");
        $params[2] = array("ip", $ip, "string");
        $params[3] = array("comment", $comment, "string");

        if ($conn->consulta($sql, $params)) {
            $result = array("success" => true);
            echo json_encode($result);
        } else {
            $result = array("success" => false, "errorMsj" => "SERVER ERROR");
            echo json_encode($result);
        }
    } else {
        $result = array("success" => false, "errorMsj" => "SERVER ERROR");
        echo json_encode($result);
    }
}
