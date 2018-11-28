
<?php
    include '../Controllers/server.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../Images/DEV.Wallet002.png" type="image/x-icon">
    <link rel="icon" href="../Images/DEV.Wallet002.png" type="image/x-icon">
    <link rel="stylesheet" href="../Styles/layout.css">
    <link rel="stylesheet" href="../Styles/font.css">
    <link rel="stylesheet" href="../Styles/main.css">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/bebas" type="text/css">
    <title>Registro</title>
</head>

<body>

    <header>
        <div class="header">
            <div class="logo-area">
                <img class="logo" src="../Images/DEV.Wallet003.png" alt="Logo">
                <span>Dev · Wallet</span>
            </div>
            <div class="user-info"></div>
        </div>
    </header>

    <main>
        <div class="container">
            <form action="register.php" method="POST">
                <?php include('../Controllers/errors.php'); ?>
                <div class="form">
                    <h2>Registro</h2>
                    <h3>Cuenta</h3>
                    <label>Username</label>
                    <input type="text" name="username" value="" required>
                    <label>Email</label>
                    <input type="email" name="email" value="" required>
                    <label>Password</label>
                    <input type="password" name="password_1" required>
                    <label>Confirm password</label>
                    <input type="password" name="password_2" required>

                    <h3>Datos Personales</h3>
                    <label>Nombre</label>
                    <input type="text" name="name" value="" required>
                    <label>Apellido</label>
                    <input type="text" name="last_name" value="" required>
                    <label>Teléfono</label>
                    <input type="text" name="phone" value="" required>

                    <div class="register-buttons">
                        <button type="submit" class="primary-btn" name="reg_user">Registrarse</button>
                        <button class="secundary-btn" type="reset">Cancelar</button>
                        <p>¿Ya tienes cuenta?  <a href="../index.php">Iniciar sesión</a></p>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <p>Dev · Wallet &copy; 2018</p>
    </footer>

</body>

</html>
