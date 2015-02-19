<?php 
	require_once("libs/Smarty.class.php");

	$smarty = new Smarty();

	$smarty->template_dir = 'templates';
	$smarty->compile_dir = 'templates_c';

	$smarty->assign("nombre", ', esto es Smarty paaa!');

	// Array asociativo

	$contactos = array(array("nombre" => "carlos", "apellido" => "Berruti", "sexo" => "M", "telefono" => "12345"),
						array("nombre" => "Agustin", "apellido" => "Daguerre", "sexo" => "M", "telefono" => "99999"),
						array("nombre" => "Nicolas", "apellido" => "Prieto", "sexo" => "M", "telefono" => "858455"),
						array("nombre" => "Julia", "apellido" => "Munhoz", "sexo" => "F", "telefono" => "858455"),
						array("nombre" => "Jessica", "apellido" => "Vacca", "sexo" => "F", "telefono" => "858455"));
	
	$smarty->assign("contactos", $contactos);
	//


	$smarty->display("prueba.tpl");
?>