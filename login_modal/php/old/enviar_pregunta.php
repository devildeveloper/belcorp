<?php
	error_reporting(E_ALL);
	require_once('enviar_correo_pre.php');
	$mensaje = '1';


	$email = $_POST['txtEmail'];
	$pregunta = $_POST['txtPregunta'];
	$nombre = $_POST['txtUsuario'];
	// 
	$correo = new CEnviarCorreoPre("consultas_congreso@osinergmin.gob.pe",$pregunta,$email,$nombre);
	echo $mensaje;
	
?>