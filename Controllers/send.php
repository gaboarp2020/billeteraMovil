<?php
    if (isset($_POST['sendFund'])) {
        $receiver = mysqli_real_escape_string($db, $_POST['fk_receiver']);
        $amount = mysqli_real_escape_string($db, $_POST['amount']);
        $username = $_SESSION['username'];
    
        // Chequeo de la base de datos
        $user_checkBalance_query = "SELECT * FROM users WHERE username='$username' ";
        $receiver_check_query = "SELECT * FROM users WHERE email='$receiver' ";
        $result = mysqli_query($db, $user_checkBalance_query);
        $user = mysqli_fetch_assoc($result);
        $result = mysqli_query($db, $receiver_check_query);
        $receiverEmail = mysqli_fetch_assoc($result);
        
        if ($user) { 
            if ($user['balance'] < $amount) {
                array_push($errors, "No cuenta con suficientes fondos");
            } elseif ($receiverEmail['email'] !== $receiver) {
                array_push($errors, "Este destinatario no está registrado");
            } else {

                floatval($amount);
                $senderId = $user['pk_user'];
                $receiverId = $receiverEmail['pk_user'];
                $senderBalance = $user['balance'];
                $receiverBalance = $receiverEmail['balance'];

                
                $query = "INSERT INTO transactions (fk_sender, fk_receiver, amount,  fk_transaction_type) 
                VALUES('$senderId', '$receiverId', '$amount', 1)";

                if ($db->query($query) === TRUE) {
                    array_push($success, "Transacción realizada con éxito");
                }

                $senderTotal = $senderBalance - $amount;
                $receiverTotal = $receiverBalance + $amount;

                $sql = "UPDATE users
                        SET balance = $senderTotal
                        WHERE username='$username' ";

                mysqli_query($db, $sql);


                $sql = "UPDATE users
                        SET balance = $receiverTotal
                        WHERE email='$receiver' ";

                mysqli_query($db, $sql);
            }
        }
    }

?>