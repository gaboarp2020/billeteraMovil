<?php
    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
        $phone = mysqli_real_escape_string($db, $_POST['phone']);
    
        // Validación de campos vacios
        if (empty($username)) { array_push($errors, "Ingrese el usuario"); }
        if (empty($email)) { array_push($errors, "Ingrese el email"); }
        if (empty($password_1)) { array_push($errors, "Ingrese la contraseña"); }
        if ($password_1 != $password_2) { array_push($errors, "La contraseña no coincide"); }
        if (empty($name)) { array_push($errors, "Ingrese su nombre"); }
        if (empty($last_name)) { array_push($errors, "Ingrese su apellido"); }
        if (empty($phone)) { array_push($errors, "Ingrese algun teléfono"); }
    
        // Chequeo de la base de datos y si el usario o el email ya existe
        $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) { // si el usuario existe
            if ($user['username'] === $username) {
                array_push($errors, "Este usuario ya esta en uso");
            }
            if ($user['email'] === $email) {
                array_push($errors, "Este email ya fué registrado");
            }
        }
    
        // Registro de usuario si no existe errores
        if (count($errors) == 0) {
            $password = md5($password_1);
    
            $query = "INSERT INTO users (username, email, password, first_name, last_name, phone) 
                    VALUES('$username', '$email', '$password', '$name', '$last_name', '$phone')";
            mysqli_query($db, $query);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Has iniciado sesión con éxito";
            header('location: login.php');
        }
    }
?>