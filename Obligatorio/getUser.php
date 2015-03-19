<?php

$sessionExists = session_start();
$user = $_SESSION['usuario'];
if ($sessionExists && $_SESSION['ingreso'] && isset($user)) {
    $result = array("success" => true, "user" => $user);
    echo json_encode($result);
} else {
    $result = array("success" => false);
    echo json_encode($result);
}


