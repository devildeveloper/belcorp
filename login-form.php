<?php

error_reporting(E_ALL);
if ($_POST) {
    include_once './models/DBConnection.php';
    include_once './models/login.php';    
    
    session_start();
    
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