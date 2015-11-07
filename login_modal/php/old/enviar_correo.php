<?php
// $email="mario.zarate@ucsp.edu.pe";
// $contrasena="mario";

class CEnviarCorreo {

	public $email;
	public $contrasena;
	
	public function __construct($email, $contrasena)
    {
		$this->email = $email;
		$this->contrasena = $contrasena;
		$this->enviarCorreo();
    }
	

 public function enviarCorreo() {
	// Varios destinatarios
	$para  = $this->email;

	// subject
	$titulo = 'Datos de Acceso - IV Congreso Internacional de Regulación';

	// message
	$mensaje = '
	<html>
	<head>
	  <title> Datos de Acceso </title>
	</head>
	<body>
	  <p>¡Estos son los datos con los que podrá acceder a la transmisión en vivo del IV Congreso Internacional de Regulación!</p>
	  <p> Usuario: '.$this->email.' </p>
	  <p> Contraseña: '.$this->contrasena.' </p>
	  <p>El link es: http://www.suruna.com/suruna_rep/suruna/Front-End/congresoregulacionperu2013/ </p>
	  <p>Disfrute de la transmisión!</p>
	</body>
	</html>
	';
	
	// echo $mensaje;

	// Para enviar un correo HTML mail, la cabecera Content-type debe fijarse
	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	// Cabeceras adicionales
	$cabeceras .= 'From: IV Congreso Internacional de Regulación <sistemasgart@osinerg.gob.pe>' . "\r\n";
	
	// Mail it
	mail($para, $titulo, $mensaje, $cabeceras);
	
	}
}

?>