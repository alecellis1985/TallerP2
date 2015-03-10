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
        $sql2 = "SELECT * FROM videos where deleted <> 1 ORDER BY rating desc LIMIT ". CANTPAG;
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
        $smarty->assign('videosCountInPage', count($videos));
    }
    else
    {
        echo "Could not connect to SQL";
    }
    $smarty->display("videoList.tpl");
