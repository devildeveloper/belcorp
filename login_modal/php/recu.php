<?php
	error_reporting(E_ALL);
	require_once('models/DBConnection.php');
	require_once('models/login.php');
	require_once('enviar_correo.php');
	$mensaje = '';


	$email = $_POST['txtEmail'];
	$nombre;
	$pais;
	
	
		$rs = new query("SELECT * FROM osinergmin_usuarios WHERE email = '$email'");
		if ($rs->n > 0)
		{
			foreach($rs->v as $filas);
			$nombre	= $filas->name;
			
			echo $nombre;
		}
	
	
?>