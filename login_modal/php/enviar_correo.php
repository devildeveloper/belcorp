<?php

include("class.phpmailer.php");
include("class.smtp.php");

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
 
	$mensaje = '
	<html>
	<head>
	  <title> Datos de Acceso </title>
	</head>
	<body>
	  <p> Estos son los datos con los que podr&aacute; acceder a la transmisi&oacute;n en vivo del IV Congreso Internacional de Regulaci&oacute;n </p>
	  <p> Usuario: '.$this->email.' </p>
	  <p> Contrase&#241;a: '.$this->contrasena.' </p>
	  <p>El link es: http://www.suruna.com/suruna_rep/suruna/Front-End/congresoregulacionperu2013/ </p>
	  <p>Disfrute de la transmisi&oacute;n</p>
	</body>
	</html>
	';
	
	$mensaje2 = 'Datos de Acceso \n Estos son los datos con los que podrá acceder a la transmisión en vivo del IV Congreso Internacional de Regulación \n
	  Usuario: '.$this->email.' \n Contrase&ntilde;a: '.$this->contrasena.' \n  El link es: http://www.suruna.com/suruna_rep/suruna/Front-End/congresoregulacionperu2013/ \n\n
	  Disfrute de la transmisión \n\n';
	
	
	
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";

	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->Username = "maliaga.pantoja@gmail.com";
	$mail->Password = "Isl_2012";

	$mail->From = "consultas.congreso2013@gmail.com";
	$mail->FromName = "IV Congreso Internacional de Regulacion";
	$mail->Subject = "Datos de Acceso - IV Congreso Internacional de Regulacion";
	$mail->AltBody = $mensaje2;
	$mail->MsgHTML($mensaje);

	// Adjuntar archivos
	// Podemos agregar mas de uno si queremos.
	$mail->AddAddress( $this->email);
	$mail->IsHTML(true);
	$mail->Send();
	}
}

?>