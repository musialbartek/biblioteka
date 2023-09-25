


<?php

//CHANGE PASSWORD -------------------------------------------------------------------------------
if (isset($_POST['change_password_submit'])) {
    if(!empty($_POST['current_password'])&&!empty($_POST["new_password"])) {

        $password_current = trim($_POST['current_password']);
        $password = trim($_POST['new_password']);
        $user = $connect->query("SELECT * FROM users WHERE BINARY user_mail='{$_SESSION['user_mail']}'");
        $row = mysqli_fetch_assoc($user);

        //CHECK IF THE CURRENT PASSWORD IS CORRECT
        if(password_verify($password_current,$row['user_password'])){

            //HASH PASSWORD
            $password_hash=password_hash($password,PASSWORD_DEFAULT);

            //CHANGE PASSWORD
            $userPassword = $connect->query("UPDATE users SET user_password='$password_hash' WHERE BINARY user_mail='{$_SESSION['user_mail']}'");
            $_SESSION['passwordChanged'] = true;

        }else{
            $_SESSION['incorrectCurrentPassword'] = true;
        }
    }else {
        $_SESSION['incorrectData'] = true;
    }
}


?>

<?php
    require_once('controllers/alert.php');
?>