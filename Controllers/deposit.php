<?php
    if (isset($_POST['depositFund'])) {
        $deposit = mysqli_real_escape_string($db, $_POST['deposit']);
        $username = $_SESSION['username'];

        $user_checkBalance_query = "SELECT * FROM users WHERE username='$username' ";
        $result = mysqli_query($db, $user_checkBalance_query);
        $user = mysqli_fetch_assoc($result);

        $totalDeposit = $deposit + $user['balance'];

        if (is_numeric($deposit)){
            $sql = "UPDATE users
            SET balance = $totalDeposit
            WHERE username='$username' ";

            mysqli_query($db, $sql);
        }
        
    }

?>