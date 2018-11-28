<?php
    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
    
        if (empty($username)) {
            array_push($errors, "Ingrese el usuario");
        }
        if (empty($password)) {
            array_push($errors, "Ingrese la contraseña");
        }
    
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $results = mysqli_query($db, $query);

            if (mysqli_num_rows($results) == 1) {
                $logged_in_user = mysqli_fetch_assoc($results);

                $_SESSION['username'] = $username;
                $_SESSION['success']  = "Has iniciado sesión con éxito";
                header('location: Views/home.php');	

            }else{
                array_push($errors, "Usuario o contraseña incorrecta");
            }
        }
    }
?>