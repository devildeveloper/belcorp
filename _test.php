<?php
//RECIBIR VARIABLES
$r_nombre     = "MARIOTEST";
//$r_pais       = utf8_decode ($_REQUEST['v_pais']);
//$r_email      = $_REQUEST['v_email'];
$r_pregunta    = "MARIOTEST TEST TEST";

$c_fecha      = date('Y-m-d');
$c_hora       = date('H:i:s');
$c_asunto     = "Pregunta";

if($_SERVER['REMOTE_ADDR'] == "") $ip = "no ip";
else $ip = $_SERVER['REMOTE_ADDR'];
$browser = $_SERVER['HTTP_USER_AGENT'];
      
$sitename = "CCA";
$siteaddress ="http://www.alterlatina.tv/canales/cca";
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

?>