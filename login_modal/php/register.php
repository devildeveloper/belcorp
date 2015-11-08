<?php
error_reporting(E_ALL);
require_once('models/DBConnection.php');
require_once('models/Usuario.php');
require_once('enviar_correo.php');
$mensaje = '';
	
	$name = $_POST['txtName'];
	$lastName = $_POST['txtLastName'];
	$email = $_POST['txtEmail1'];
	$pais = $_POST['txtPais'];
	$jerarquia = $_POST['txtJerarquia'];
	$password = $_POST['txtClave'];

	$usuario = new Usuario($email,$password,$pais,$jerarquia,$lastName,$name);
	
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