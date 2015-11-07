
<?php 
include("class.phpmailer.php");
include("class.smtp.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";

$mail->Host = "alterlatina.tv";
$mail->Port = 25;
$mail->Username = "mario@alterlatina.tv";
$mail->Password = "Mario$357";

$mail->From = "m.zaratev@gmail.com";
$mail->FromName = "Nombre del remitente";
$mail->Subject = "Asunto del correo";
$mail->AltBody = "Hola,\neste correo ha sido enviado desde PHP usando PHPMailer.";
$mail->MsgHTML("Hola,<br>este correo ha sido enviado desde PHP usando <strong>PHPMailer</strong>.");

// Adjuntar archivos
// Podemos agregar mas de uno si queremos.
$mail->AddAddress("rflorest@osinerg.gob.pe");
$mail->IsHTML(true);

if(!$mail->Send()) {
  echo "Error: " . $mail->ErrorInfo;
} else {
  echo "Mensaje enviado.";
}

?>