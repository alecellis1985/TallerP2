<?php
require_once("../config/parametros.php");
require_once("../includes/class.Conexion.BD.php");
//start_session();
//if($_SESSION['ingreso'])
//{
   $idVideo = $_POST['idVideo'];
   $conn = new ConexionBD(DRIVER, SERVIDOR, BASE, USUARIO, CLAVE);
    if($conn->conectar())
    {
        $sql = "UPDATE videos SET deleted = 1 where idVideo = :idVideo";
        $params = array();
        $params[0] = array("idVideo",$idVideo,"INT");
        var_dump($idVideo);
        if($conn->consulta($sql,$params))
        {
            echo json_encode(array('success'=>true,'msg'=>'Video successfully eleted'));
        }
        else
        {
            echo "Error, please refresh the web.";
        }
    }
    else
    {
        echo "SQL ERROR";
    }
//}
//else
//{
//    echo "FORBBBBIDENZEN";
//}

