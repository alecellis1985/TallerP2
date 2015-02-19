<?php

require_once("libs/Smarty.class.php");

$smarty = new Smarty();

$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';


$conn = new PDO('mysql:host=localhost;dbname=videoProducer', 'root', 'oso2203');
$sql = "SELECT * FROM videos WHERE deleted <> 1 LIMIT 8";
$result = $conn->query($sql);

$firstVideo = $result->fetch();

if ($firstVideo)
    $mainVideo = $firstVideo;


$smarty->assign("mainVideo", $mainVideo);

$smarty->display("index.tpl");
