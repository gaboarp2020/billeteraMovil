<?php 
    include ('../Controllers/server.php');

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: ../Views/login.php');
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: ../Views/login.php");
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
                        <li class="nav-item"><a href="#seccion-1">Home</a></li>
                        <li class="nav-item"><a href="#seccion-2">Enviar</a></li>
                        <li class="nav-item"><a href="#seccion-3">Historial</a></li>
                        <li class="nav-item"><a href="#seccion-4">Depositar Fondos</a></li>
                    </ul>
                    <div class="user-info">
                        <?php  if (isset($_SESSION['username'])) : ?>
                            <p>Bienvenido <strong><?php echo $_SESSION['username']; ?></strong></p>
                            <p> <a href="login.php?logout='1'" style="color: red;">Cerrar sesión</a> </p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <section id="home">
                <?php include('../Controllers/errors.php'); ?>
                <?php include('../Controllers/success.php'); ?>
                <div class="box">
                    <div id="seccion-1" class="tabs-contents-item d-none">
                        <h1><span>Bienvenido</span>, esta es tu billetera digital</h1>
                        <p>Este es un resumen de tu billetera</p>
                        <table>
                            <tr>
                                <td>
                                    Saldo
                                </td>
                                <td>
                                    Ultima transacción
                                </td>
                                <td>
                                    Transacciones
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php

                                        $username = $_SESSION['username'];

                                        $sql = "SELECT balance FROM users WHERE username = '$username' ";

                                        $result = $db->query($sql);
                                        // echo $username;
                                        while ($row = $result->fetch_assoc()) {
                                            echo $row['balance']." Bs";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php

                                        $sql = "SELECT transactions.date
                                                FROM users
                                                INNER JOIN transactions ON users.pk_user=transactions.fk_sender
                                                WHERE users.username = '$username'
                                                ORDER BY transactions.pk_transaction DESC LIMIT 1";

                                        $result = $db->query($sql);
                                        // echo $username;
                                        while ($row = $result->fetch_assoc()) {
                                            echo $row['date'];
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php

                                        $sql = "SELECT transactions.pk_transaction
                                                FROM users
                                                INNER JOIN transactions ON users.pk_user=transactions.fk_sender
                                                WHERE users.username = '$username' 
                                                ORDER BY transactions.pk_transaction DESC LIMIT 1";

                                        $result = $db->query($sql);
                                        // echo $username;
                                        while ($row = $result->fetch_assoc()) {
                                            echo $row['pk_transaction'];
                                        }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div id="seccion-2" class="tabs-contents-item d-none">
                        <h1><span>Enviar saldo</span></h1>
                        <p>Introduzca el E-mail del destinatario y la cantidad a transferir</p>
                        <table>
                            <tr>
                                <td>Saldo:</td>
                                <td>
                                    <?php
                                        $username = $_SESSION['username'];

                                        $sql = "SELECT balance FROM users WHERE username = '$username' ";

                                        $result = $db->query($sql);
                                        // echo $username;
                                        while ($row = $result->fetch_assoc()) {
                                            echo $row['balance']." Bs";
                                        }
                                    ?>
                                </td>
                            </tr>
                        </table>
                        <form id="sendForm" action="home.php" method="POST">
                            <label>Destinatario (E-mail)</label>
                            <input type="text" name="fk_receiver" value="" required>
                            <label>Cantidad a enviar</label>
                            <input type="text" name="amount" value="" required>
                            <div class="send-buttoms">
                                <button type="submit" class="primary-btn" name="sendFund">Enviar</button>
                            </div>
                        </form>
                    </div>
                    <div id="seccion-3" class="tabs-contents-item d-none">
                        <h1><span>Historial de transacciones</span></h1>
                        <p>Ultima transacción realizada</p>
                        <table>
                            <tr>
                                <td>
                                    Destinatario (E-mail):
                                </td>
                                <td>
                                    Cantidad:
                                </td>
                                <td>
                                    Fecha:
                                </td>
                            </tr>
                            <?php
                                for($i=0;$i<1;$i++) {
                                    echo'<tr>';
                                    echo'<td>';
                                        $sql = "SELECT users.email from users join transactions on 
                                        users.pk_user = transactions.fk_receiver 
                                        where transactions.fk_sender = 
                                            (SELECT users.pk_user 
                                            from users 
                                            where    
                                            users.username 
                                            LIKE '$username')
                                            ORDER BY users.pk_user DESC LIMIT 1";
                                        $result = $db->query($sql);
                                        // var_dump($result);
                                        // echo $username;
                                        while ($row = $result->fetch_array()) {
                                            echo $row[$i];
                                        }
                                        
                                    echo'</td>';
                                    echo'<td>';
                                        $sql = "SELECT transactions.amount
                                                FROM users
                                                INNER JOIN transactions ON users.pk_user=transactions.fk_sender
                                                WHERE users.username = '$username' 
                                                ORDER BY transactions.pk_transaction DESC LIMIT 1";

                                        $result = $db->query($sql);
                                        // echo $username;
                                        while ($row = $result->fetch_array()) {
                                            echo $row[$i];
                                        }
                                    echo'</td>';
                                    echo'<td>';
                                        $sql = "SELECT transactions.date
                                                FROM users
                                                INNER JOIN transactions ON users.pk_user=transactions.fk_sender
                                                WHERE users.username = '$username' 
                                                ORDER BY transactions.pk_transaction DESC LIMIT 1";

                                        $result = $db->query($sql);
                                        // echo $username;
                                        while ($row = $result->fetch_array()) {
                                            echo $row[$i];
                                        }
                                    echo'</td>';
                                echo'</tr>';
                                }
                            ?>
                        </table>
                    </div>
                    <div id="seccion-4" class="tabs-contents-item d-none">
                        <h1><span>Depositar Fondos</span></h1>
                        <p>Para depositar fondos, ingrese los datos de la tarjeta de crédito e introduzca el monto a recargar</p>
                        <table>
                            <tr>
                                <td>Saldo:</td>
                                <td>
                                    <?php
                                        $username = $_SESSION['username'];

                                        $sql = "SELECT balance FROM users WHERE username = '$username' ";

                                        $result = $db->query($sql);
                                        // echo $username;
                                        while ($row = $result->fetch_assoc()) {
                                            echo $row['balance']." Bs";
                                        }
                                    ?>
                                </td>
                            </tr>
                        </table>
                        <form id="sendForm" action="home.php" method="POST">
                            <label>Número de tarjeta de crédito</label>
                            <input type="text" name="tdc" value="">
                            <label>Cantidad a depositar</label>
                            <input type="text" name="deposit" value="" required>
                            <div class="deposit-buttoms">
                                <button type="submit" class="primary-btn" name="depositFund">Enviar</button>
                            </div>
                        </form>
                    </div>
                        
                    </div>
                </div>
            </section>
        </main>

        <footer>
            <p>Dev · Wallet &copy; 2018</p>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

    <!-- Optional JavaScript -->
    <script src="../Scripts/script.js"></script>

</body>

</html>