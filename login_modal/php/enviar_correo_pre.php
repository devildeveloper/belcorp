<?php
// $email="mario.zarate@ucsp.edu.pe";
// $contrasena="mario";
include("class.phpmailer.php");
include("class.smtp.php");

class CEnviarCorreoPre {

	public $email;
	public $pregunta;
	public $emailUsuario;
	public $usuario;
	public $expositor;
	
	public function __construct($email, $pregunta, $emailUsuario, $usuario, $expositor)
    {
		$this->email = $email;
		$this->pregunta = $pregunta;
		$this->emailUsuario = $emailUsuario;
		$this->usuario = $usuario;
		$this->expositor = $expositor;
		$this->enviarCorreo();
		$this->tema = "Modelos de Tarificación en Distribución Planificación de la Transmisión";
		$this->temaHtml = "Modelos de Tarificación en Distribución Planificación de la Transmisión";
    }
	

 public function enviarCorreo() {
	
	
		$mensaje = '
		<html>
		<head>
		  <title> PREGUNTAS </title>
		</head>
		<body>
		  <p> Email del Usuario: '.$this->emailUsuario.' </p>
		  <p> Usuario: '.$this->usuario.' </p>	 
			<p> Tema: Impacto en la Regulacion – Redes Electricas Inteligentes </p>
		  <p> Pregunta: '.$this->pregunta.' </p>
		  <p> Expositor: '.$this->expositor.'</p>
		  <p>El link es: http://www.suruna.com/suruna_rep/suruna/Front-End/congresoregulacionperu2013/ </p>
		  <p>Disfrute de la transmisi&oacute;n</p>
		</body>
		</html>
		';
	
		$mensaje2 = 'PREGUNTAS\n Email del Usuario: '.$this->emailUsuario.' \n Usuario: '.$this->usuario.' \n Tema: Impacto en la Regulacion – Redes Eléctricas Inteligentes \n Pregunta: '.$this->pregunta.' \n
		  Expositor: '.$this->expositor.' \n El link es: http://www.suruna.com/suruna_rep/suruna/Front-End/congresoregulacionperu2013/ \n\n
		  Disfrute de la transmisión \n\n
		';
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
		$mail->Subject = "PREGUNTA - IV Congreso Internacional de Regulacion";
		$mail->AltBody = $mensaje2;
		$mail->MsgHTML($mensaje);


		$mail->AddAddress("consultas.congreso2013@gmail.com");
		$mail->IsHTML(true);
		
		$mail->Send();
	}
}

?>