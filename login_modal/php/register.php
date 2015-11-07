<?php
error_reporting(E_ALL);
require_once('models/DBConnection.php');
require_once('models/Usuario.php');
require_once('enviar_correo.php');
$mensaje = '';
	
	$name = $_POST['txtName'];
	$email = $_POST['txtEmail1'];
	$password = $_POST['txtClave1'];
	$pais = $_POST['txtPais'];
	$ocupacion = $_POST['txtOcupacion'];

	$usuario = new Usuario($name,$email,$password,$pais,$ocupacion);
	
	$resultado = $usuario->insertALL();
	
	if ($resultado == 2) {
			$mensaje = '2';
			echo $mensaje;
	} else if ($resultado == 1) 
	{
			$mensaje = '1';
			$correo = new CEnviarCorreo($email,$password);
			echo $mensaje;
	}
	else if ($resultado == 0) 
	{
			$mensaje = '0';
			echo $mensaje;
	}
	
	

?>