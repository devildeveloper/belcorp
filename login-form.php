<?php

error_reporting(E_ALL);
if ($_POST) {
    session_start();
    include_once './login_modal/php/models/DBConnection.php';
    include_once './login_modal/php/models/login.php';    
    
    
    
    $email = $_POST['txtEmail'];
    $clave = $_POST['txtClave'];

    $login = new login($email, $clave);
    if ($login->autenticado == 1) {
        $_SESSION['login'] = '1';
        header("Location:./index.php");
    } else {
        header("Location:./login.php");
   }
} 