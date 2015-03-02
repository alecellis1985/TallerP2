<?php 
    //require_once("includes/libs/Smarty.class.php");
    require_once("includes/class.Conexion.BD.php");
    require_once("config/parametros.php");
    $pagina = (int)$_POST['pagenumber'];
    //$pagina = 2;
    
    /*$smarty = new Smarty();

    $smarty->template_dir = 'templates';
    $smarty->compile_dir = 'templates_c';*/
    $conn = new ConexionBD(DRIVER,SERVIDOR,BASE,USUARIO,CLAVE);
    
    
    
    if($conn->conectar()){
        if(empty($pagina)){
                $pagina=1;
        }
	$sql = "SELECT * FROM videos WHERE deleted <> 1 LIMIT " . (($pagina-1) * CANTPAG) . "," . CANTPAG;
	if($conn->consulta($sql,array())){
            $videos = $conn->restantesRegistros();
               echo json_encode($videos);
            }
	else{
		echo "Error de SQL";
	}
}
else{
	echo "Error de Conexion";
}    
    
    //$smarty->display("videoPage.tpl");
