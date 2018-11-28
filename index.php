<?php 
    include 'Controllers/server.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="Images/DEV.Wallet002.png" type="image/x-icon">
    <link rel="icon" href="Images/DEV.Wallet002.png" type="image/x-icon">
    <link rel="stylesheet" href="Styles/layout.css">
    <link rel="stylesheet" href="Styles/font.css">
    <link rel="stylesheet" href="Styles/main.css">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/bebas" type="text/css">
    <title>Login</title>
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
            <form action="index.php" method="POST">
                <?php include('Controllers/errors.php'); ?>
                <div class="form">
                    <h2>Login</h2>
                    <label id="uname-label" for="username">Usuario</label>
                    <input name="username" id="uname-input" type="text" required>

                    <label id="pass-label" for="password">Clave</label>
                    <input name="password" id="pass-input" type="password" required>

                    <div class="login-buttons">
                        <button class="primary-btn" type="submit" name="login_user">Iniciar Sesión</button>
                        <button class="secundary-btn" type="reset">Cancelar</button>
                        <p>¿No tienes cuenta?  <a href="Views/register.php">Registrarse</a></p>
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