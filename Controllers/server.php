<?php
    //Conexión a la base de datos
    require('conexion.php');

    session_start();

    $username = "";
    $email    = "";
    $errors = array();
    $success = array();

    // Registro de usuario
    include 'sigin.php';

    // Inicio de sesión
    include 'login.php';

    // Envio de fondos
    include 'send.php';

    // Depósito de fondos
    include 'deposit.php';
?>