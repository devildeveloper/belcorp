<?php
//RECIBIR VARIABLES
$r_nombre     = utf8_decode ($_REQUEST['v_nombre']);
//$r_pais       = utf8_decode ($_REQUEST['v_pais']);
$r_email      = "info@alterlatina.com";
$r_pregunta    = utf8_decode ($_REQUEST['v_pregunta']);

$c_fecha      = date('Y-m-d');
$c_hora       = date('H:i:s');
$c_asunto     = "Pregunta del Live Webcast ";

if($_SERVER['REMOTE_ADDR'] == "") $ip = "no ip";
else $ip = $_SERVER['REMOTE_ADDR'];
$browser = $_SERVER['HTTP_USER_AGENT'];
      
$sitename = "Belcorp";
$siteaddress ="http://www.alterlatina.tv/canales/belcorp";
//$adminaddress = "mcervera@belcorp.biz";
$adminaddress = "m.zaratev@gmail.com";
$adminaddressinv = $r_email ;

//enviando al adaministrador
mail("$adminaddress","$c_asunto",
"
Datos Enviados: \n
Nombre: $r_nombre \n
Pregunta: $r_pregunta \n
_____________________________________________________________________________________________
IP: $ip","FROM:$r_nombre <$adminaddressinv>");

header("Location: pregunta-respuesta.html"); exit;
?>