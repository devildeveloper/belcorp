<?php
error_reporting(E_ALL);
require_once('models/DBConnection.php');
require_once('models/login.php');
//require_once('enviar_correo_con.php');
$mensaje = '';


	$email = $_POST['txtEmail'];
	$clave = $_POST['txtClave'];
		
	$login = new login($email,$clave);
	
	if ($clave != '' ) {
		echo $login->autenticado;		
	} 

	
	// if($login->autenticado) {			
		// $_SESSION['userLogin'] = $login->autenticado;
		// $_SESSION['alias'] = $login->alias;
		// $_SESSION['idusuario'] = $login->idusuario;
		// $_SESSION['prefijo'] = $login->prefijo;
		// $_SESSION['nivel_acceso'] = $login->nivel_acceso;
		// $_SESSION['hora_acceso'] = date('Y-m-d H:i:s');		
		// // header("Location:index.php");
	// }

?>