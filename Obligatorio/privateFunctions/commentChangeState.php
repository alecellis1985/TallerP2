<?php

require_once("../config/parametros.php");
require_once("../includes/class.Conexion.BD.php");
require_once("../includes/MessageHandler.php");

session_start();
if ($_SESSION['ingreso']) {
    $idComments = $_POST['idComments'];
    $public = $_POST['public'];
    $conn = new ConexionBD(DRIVER, SERVIDOR, BASE, USUARIO, CLAVE);
    $response = null;
    if ($conn->conectar()) {
        $sql = "UPDATE comments SET public = :public WHERE idComments = :idComments ";
        $parametros = array();
        $parametros[0] = array("public", $public, "INT");
        $parametros[1] = array("idComments", $idComments, "INT");
        if ($conn->consulta($sql, $parametros)) {
            $response = MessageHandler::getSuccessResponse('Comment successfully updated', null);
        }
    }
    if ($response == null) {
        header('HTTP/1.1 400 Bad Request');
        echo MessageHandler::getDBErrorResponse();
    } else {
        echo $response;
    }
} else {
    echo "Unauthorized";
}
