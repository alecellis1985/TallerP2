<?php

session_start();
require_once("../includes/class.Conexion.BD.php");
require_once("../config/parametros.php");
require_once("../includes/libs/Smarty.class.php");

$smarty = new Smarty();
$smarty->template_dir = '../templates';
$smarty->compile_dir = '../templates_c';

if ($_SESSION['ingreso']) {

    $conn = new ConexionBD(DRIVER, SERVIDOR, BASE, USUARIO, CLAVE);
    if ($conn->conectar()) {
        $sqlVideosPerRating = "SELECT * FROM videos ORDER BY rating DESC";
        if ($conn->consulta($sqlVideosPerRating)) {
            $videosPerRating = $conn->restantesRegistros();
            $smarty->assign("videosPerRating", $videosPerRating);

            $sqlPerComments = "select v.*, c3.commentCount from videos as v left join (select distinct c.idVideo, commentCount from comments as c join 
                                (select idVideo, count(*) as commentCount from comments group by idVideo)
                                as c2 on (c.idVideo = c2.idVideo) order by c2.commentCount desc) as c3 on v.idVideo = c3.idVideo order by c3.commentCount desc;";
            if ($conn->consulta($sqlPerComments)) {
                $videosPerComment = $conn->restantesRegistros();
                $smarty->assign("videosPerComment", $videosPerComment);

                $smarty->display("private/statistics.tpl");
            } else {
                echo "Error, please refresh the web.";
            }
        } else {
            echo "Error, please refresh the web.";
        }
        $conn->desconectar();
    } else {
        echo "SQL ERROR";
    }
} else {
    echo "Unauthorized user";
}