<?php

session_start();
$_SESSION['ingreso'] = false;
unset($_SESSION['usuario']);
unset($_SESSION['password']);
session_unset();
session_destroy();
if (isset($_COOKIE['usuario'])) {
    unset($_COOKIE['usuario']);
}
if (!isset($_COOKIE['usuario']) && !isset($_SESSION['usuario'])) {
    echo "sucess";
} else {
    echo "error";
}
