<?php
// $email="mario.zarate@ucsp.edu.pe";
// $contrasena="mario";

include("class.phpmailer.php");
include("class.smtp.php");

class CEnviarCorreoCon {

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
	  <title> Recordatorio de contraseña</title>
	</head>
	<body>
	  <p> Estos son los datos con los que podr&aacute; acceder a la transmisi&oacute;n en vivo del IV Congreso Internacional de Regulaci&oacute;n</p>
	  <p> Usuario: '.$this->email.' </p>
	  <p> Contrase&#241;a: '.$this->contrasena.' </p>
	  <p>El link es: http://www.suruna.com/suruna_rep/suruna/Front-End/congresoregulacionperu2013/ </p>
	  <p> </p>
	</body>
	</html>
	';
	
	$mensaje2 = 'Recordatorio de contraseña \n Estos son los datos con los que podrá acceder a la transmisión en vivo del IV Congreso Internacional de Regulación\n
	        Usuario: '.$this->email.' \n Contraseña: '.$this->contrasena.' \n El link es: http://www.suruna.com/suruna_rep/suruna/Front-End/congresoregulacionperu2013/ \n\n';
	
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl";

		$mail->Host = "alterlatina.tv";
		$mail->Port = 465;
		$mail->Username = "mario@alterlatina.tv";
		$mail->Password = "Mario$357";

		$mail->From = "consultas.congreso2013@gmail.com";
		$mail->FromName = "IV Congreso Internacional de Regulacion";
		$mail->Subject = "Recordatorio de Clave - IV Congreso Internacional de Regulacion";
		$mail->AltBody = $mensaje2;
		$mail->MsgHTML($mensaje);


		$mail->AddAddress( $this->email);
		$mail->IsHTML(true);
		$mail->Send();
		}
	}

?>