<?php

session_start();
require('../includes/ExcelArrPrinter.php');
require_once("../includes/class.Conexion.BD.php");
require_once("../config/parametros.php");


if ($_SESSION['ingreso']) {

    $conn = new ConexionBD(DRIVER, SERVIDOR, BASE, USUARIO, CLAVE);
    if ($conn->conectar()) {
        $sqlVideosPerRating = "SELECT * FROM videos ORDER BY rating DESC";
        if ($conn->consulta($sqlVideosPerRating)) {
            $videosPerRating = $conn->restantesRegistros();
            $sqlPerComments = "select v.*, c3.commentCount from videos as v join (select distinct c.idVideo, commentCount from comments as c join 
                                (select idVideo, count(*) as commentCount from comments group by idVideo)
                                as c2 on (c.idVideo = c2.idVideo) order by c2.commentCount desc) as c3 on v.idVideo = c3.idVideo;";
            if ($conn->consulta($sqlPerComments)) {
                $videosPerComment = $conn->restantesRegistros();
            }
        }
        $conn->desconectar();
    }
    // filename for download
    $filename = "MyCompay_Videos" . date('Ymd') . ".xls";

    header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Content-Type: application/vnd.ms-excel");
    ExcelArrPrinter::printArray($videosPerRating, "Videos Per Comments");
    ExcelArrPrinter::printArray($videosPerComment, "Videos Per Rating");
    exit;
} else {
    echo "Private Zone";
}


