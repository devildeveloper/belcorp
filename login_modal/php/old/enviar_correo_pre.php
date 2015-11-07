<?php
// $email="mario.zarate@ucsp.edu.pe";
// $contrasena="mario";

class CEnviarCorreoPre {

	public $email;
	public $pregunta;
	public $emailUsuario;
	public $usuario;
	
	public function __construct($email, $pregunta, $emailUsuario, $usuario)
    {
		$this->email = $email;
		$this->pregunta = $pregunta;
		$this->emailUsuario = $emailUsuario;
		$this->usuario = $usuario;
		$this->enviarCorreo();
    }
	

 public function enviarCorreo() {
	// Varios destinatarios
	$para  = $this->email;

	// subject
	$titulo = 'PREGUNTA - IV Congreso Internacional de Regulación';

	// message
	$mensaje = '
	<html>
	<head>
	  <title> PREGUNTAS </title>
	</head>
	<body>
	  <p> Email del Usuario: '.$this->emailUsuario.' </p>
	  <p> Usuario: '.$this->usuario.' </p>	  
	  <p> Pregunta: '.$this->pregunta.' </p>
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
	$cabeceras .= "Cc: consultas.congreso2013@gmail.com\r\n"; 

	// Mail it
	mail($para, $titulo, $mensaje, $cabeceras);
	
	}
}

?>