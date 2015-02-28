<?php 
    require_once("includes/libs/Smarty.class.php");
    require_once("includes/class.Conexion.BD.php");
    require_once("config/parametros.php");

    $smarty = new Smarty();

    $smarty->template_dir = 'templates';
    $smarty->compile_dir = 'templates_c';

    $videoPairs = array();
    $videoTotalCount = 0;
    $conn = new PDO('mysql:host=localhost;dbname=videoProducer', 'root', 'oso2203');

    $page = (int)$_POST['pageNumber'];

    $sql = "SELECT * FROM videos WHERE deleted <> 1 LIMIT ".(($page-1)*8).",8";
    $sqlCount = "SELECT COUNT(*) FROM videos WHERE deleted <> 1";

    $result = $conn->query($sql);
    $resultCountQuery = $conn->query($sqlCount);

    $resultCount = $resultCountQuery->fetch();

    if($resultCount){
            $previousRecordsCount = ($page-1)*8;

            $videoCount = $resultCount[0] - $previousRecordsCount;
            if($videoCount > 8)
                    $videoCount = 8;

            $videoTotalCount = $resultCount[0];

            for ($i=0; $i < $videoCount ; $i+=2) { 
                    $pair = array($result->fetch());
                    $next = $result->fetch();
                    if ($next) {
                            array_push($pair, $next);
                    }
                    array_push($videoPairs, $pair);
            }
    }
    $videoPages = 0;
    for ($i=0; $i < $videoTotalCount ; $i+=8) { 
            $videoPages++;
    }

    $smarty->assign('videos', $videoPairs);	
    $smarty->assign('videosCount', $videoTotalCount);
    $smarty->assign('videoPages', $videoPages);

    $smarty->display("videoPage.tpl");
