<?php
session_start();
require_once("includes/class.Conexion.BD.php");
require_once("config/parametros.php");

$usuario =  $_POST['username'];
$password = $_POST['password'];
if(!isset($usuario) && !isset($password))
{//TODO ERRORS and do login ajax wei
    echo "User or Password is not correct";
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
                $_SESSION['usuario'] = $user['userName'];
                $_SESSION['password'] = $user['password'];
                setcookie('usuario',  $user['userName']);
                echo "Hello&nbsp" . $user['userName'] . " you have been successfuly logged in.";
            }
            else
            {
                $_SESSION['ingreso'] = false;
                echo "User or Password is not correct";
            }
        }
        else
        {
            echo "SQL ERROR";
        }
    }
}
