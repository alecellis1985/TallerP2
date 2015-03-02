<?php
session_start();
require_once("includes/libs/Smarty.class.php");
require_once("includes/class.Conexion.BD.php");
require_once("config/parametros.php");

$smarty = new Smarty();
$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';

$usuario =  $_POST['username'];
$password = $_POST['password'];
if(!isset($usuario) && !isset($password))
{
    //TODO ERRORS and do login ajax wei
//    $smarty->assign("error",$error_message);
//    $smarty->display("index.tpl");
//    $smarty->assign("errorName",$error_name);
    $result = array("success" => false, "errorMsj" => "Username and/or password are required");
    echo json_encode($result);
}
else
{
    $conn = new ConexionBD(DRIVER,SERVIDOR,BASE,USUARIO,CLAVE);
    if($conn->conectar()){
        $sql = $sql = "SELECT * FROM users WHERE userName = :userName and password = :password";
        $params = array();
        $params[0] = array("userName",$usuario,"STRING");
        $params[1] = array("password",md5($password),"STRING");
        
        if($conn->consulta($sql, $params))
        {
            $users = $conn->restantesRegistros();
            $user = $users[0];
            if(isset($user['userName']))
            {
                $_SESSION['ingreso'] = true;
                $_SESSION['usuario'] = $user['userName'];
                $_SESSION['password'] = $user['password'];
                setcookie('usuario',  $user['userName']);
                //header('Location: videoList.php');
                $result = array("success" => true, "errorMsj" => "");
                echo json_encode($result);
            }
            else
            {
                $_SESSION['ingreso'] = false;
                //$smarty->display("index.tpl");
                $result = array("success" => false, "errorMsj" => "Wrong user or password. Try again");
                echo json_encode($result);
            }
        }
        else
        {
            echo "SQL ERROR";
        }
    }
}
