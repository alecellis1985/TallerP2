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
    $smarty->assign("error",$error_message);
    $smarty->display("index.tpl");
    $smarty->assign("errorName",$error_name);
}
else
{
    $conn = new ConexionBD(DRIVER,SERVIDOR,BASE,USUARIO,CLAVE);
    if($conn->conectar()){
        $sql = $sql = "SELECT * FROM users WHERE userName = :userName and password = :password";
        $parametros = array();
        $parametros[0] = array("userName",$usuario,"STRING");
        $parametros[1] = array("password",md5($password),"STRING");
        
        if($conn->consulta($sql, $parametros))
        {
            $users = $conn->restantesRegistros();
            $user = $users[0];
            if(isset($user['userName']))
            {
                $_SESSION['ingreso'] = true;
                $_SESSION['usuario'] = $user['username'];
                $_SESSION['password'] = $user['password'];
                setcookie('usuario',$usuario);
                $smarty->display("videoList.tpl");
            }
            else
            {
                $_SESSION['ingreso'] = false;
                $smarty->display("index.tpl");
            }
        }
        else
        {
            echo "SQL ERROR";
        }
    }
}
