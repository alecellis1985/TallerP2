<?php 
    require_once("includes/libs/Smarty.class.php");
    require_once("includes/class.Conexion.BD.php");
    require_once("config/parametros.php");
    
    session_start();
    
    $smarty = new Smarty();
    $smarty->template_dir = 'templates';
    $smarty->compile_dir = 'templates_c';

    
    $conn = new ConexionBD(DRIVER,SERVIDOR,BASE,USUARIO,CLAVE);
    if($conn->conectar())
    {
        $sql = "SELECT COUNT(*) FROM videos";
        if($conn->consulta($sql))
        {
            $countVideos = $conn->restantesRegistros();
            $videoPages = ceil((int)$countVideos[0][0]/CANTPAG);
        }
        else
        {
            echo "SQL Error";
        }
        $sql2 = "SELECT * FROM videos where deleted <> 1 LIMIT 8";
        if($conn->consulta($sql2))
        {
            $videos = $conn->restantesRegistros();
        }
        else
        {
            echo "SQL ERROR";
        }
        $smarty->assign('videos', $videos);	
        $smarty->assign('videosCount', $countVideos);
        $smarty->assign('videoPages', $videoPages);
    }
    else
    {
        echo "Could not connect to SQL";
    }
    
    
    /*$videoPairs = array();
    $videoTotalCount = 0;
    $conn = new PDO('mysql:host=localhost;dbname=videoProducer', 'root', 'turtleman1');


    $sql = "SELECT * FROM videos WHERE deleted <> 1 LIMIT 8";
    $sqlCount = "SELECT COUNT(*) FROM videos WHERE deleted <> 1";

    $result = $conn->query($sql);
    $resultCountQuery = $conn->query($sqlCount);

    $resultCount = $resultCountQuery->fetch();

    if($resultCount){
            $videoCount = $resultCount[0];
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
    $videoPages = ceil($resultCount[0]/CANTPAG);

    $smarty->assign('videos', $videoPairs);	
    $smarty->assign('videosCount', $videoTotalCount);
    $smarty->assign('videoPages', $videoPages);
*/
    $smarty->display("videoList.tpl");