<?php
   $db = mysqli_connect('localhost', 'root', '', 'billetera_movil_db');
   $db->set_charset("utf8");

   if(mysqli_connect_errno()){
        echo 'Conexion Fallida : ', mysqli_connect_error();
        exit();
    }
?>