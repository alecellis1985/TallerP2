<?php

require('../includes/ExcelArrPrinter.php');
require_once("../includes/class.Conexion.BD.php");
require_once("../config/parametros.php");

session_start();
if ($_SESSION['ingreso']) {
    $conn = new ConexionBD(DRIVER, SERVIDOR, BASE, USUARIO, CLAVE);
    if ($conn->conectar()) {
        $sqlVideosPerRating = "SELECT * FROM videos ORDER BY rating DESC";
        if ($conn->consulta($sqlVideosPerRating)) {
            $videosPerRatingRsult = $conn->restantesRegistros();
            $videosPerRating = array();

            foreach ($videosPerRatingRsult as $row) {
                $elemn = array();
                foreach ($row as $keyRow => $value) {
                    if (!(gettype($keyRow) == 'integer')) {
                        $elemn[$keyRow] = $value;
                    }
                }
                array_push($videosPerRating, $elemn);
            }
            //var_dump($videosPerRating);
            $sqlPerComments = "select v.*, c3.commentCount from videos as v join (select distinct c.idVideo, commentCount from comments as c join 
                                (select idVideo, count(*) as commentCount from comments group by idVideo)
                                as c2 on (c.idVideo = c2.idVideo) order by c2.commentCount desc) as c3 on v.idVideo = c3.idVideo;";
            if ($conn->consulta($sqlPerComments)) {
                $videosPerCommentArr = $conn->restantesRegistros();
                
                $videosPerComment = array();
                
                foreach ($videosPerCommentArr as $row) {
                    $elemn = array();
                    foreach ($row as $keyRow => $value) {
                        if (!(gettype($keyRow) == 'integer')) {
                            $elemn[$keyRow] = $value;
                        }
                    }
                    array_push($videosPerComment, $elemn);
                }
            }
        }
        $conn->desconectar();
    }

    $filename = "MyCompay_Videos" . date('Ymd') . ".xls";

    header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Content-Type: application/vnd.ms-excel");
    ExcelArrPrinter::printArray($videosPerRating, "Videos Per Comments");
    ExcelArrPrinter::printArray($videosPerComment, "Videos Per Rating");
    exit;
} else {
    echo "Private Zone";
}


