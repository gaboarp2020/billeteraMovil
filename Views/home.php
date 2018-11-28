<?php 
    include ('../Controllers/server.php');

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../index.php');
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: ../index.php");
    }
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
    <title>Home</title>
</head>

<body>

    <div class="container">
        <header>
            <div class="header">
                <div class="logo-area">
                    <img class="logo" src="../Images/DEV.Wallet003.png" alt="Logo">
                    <span>Dev · Wallet</span>
                </div>
                
                <div class="menu-area">
                    <ul class="menu">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Enviar</a></li>
                        <li><a href="#">Historial</a></li>
                        <li><a href="#">Depositar Fondos</a></li>
                    </ul>
                    <div class="user-info">
                        <?php  if (isset($_SESSION['username'])) : ?>
                            <p>Bienvenido <strong><?php echo $_SESSION['username']; ?></strong></p>
                            <p> <a href="../index.php?logout='1'" style="color: red;">Cerrar sesión</a> </p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <section id="home">
                <div class="home-tap">
                    <h1><span>Bienvenido</span>, esta es tu billetera digital</h1>
                    <p>Este es un resumen de tu billetera</p>
                </div>
                <div class="enviar-tap">

                </div>
                <div class="historial-tab">

                </div>
                <div class="depositar-tab">
                    
                </div>
            </section>
        </main>

        <footer>
            <p>Dev · Wallet &copy; 2018</p>
        </footer>
    </div>

</body>

</html>