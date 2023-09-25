<?php


//REGISTER -------------------------------------------------------------
if (isset($_POST['register_submit'])) {
    if (!empty($_POST['register_mail']) && !empty($_POST['register_password']) && !empty($_POST['register_password_rep'])) {
        if ($_POST['register_password'] == $_POST['register_password_rep']) {
            $mail = trim($_POST['register_mail']);
            $password = trim($_POST['register_password']);

            //MAIL SANITIZATION
            $mail_correct = filter_var($mail, FILTER_SANITIZE_EMAIL);

            //CHECK IF THERE IS NO USER WITH THE SAME E-MAIL
            require_once('partials/_connect.php');
            $emailCheck = $connect->query("SELECT user_id FROM users WHERE BINARY user_mail='$mail_correct'");
            if ($emailCheck->num_rows < 1) {

                //HASH PASSWORD
                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                //ACCOUNT CREATION DATE
                $created_at = date("Y-m-d H:i:s");

                //ADDING USER
                $addUser = "INSERT INTO users(user_id, user_mail, user_password, user_status) VALUES (NULL,'$mail_correct','$password_hash',1)";
                if ($connect->query($addUser) === TRUE) {
                    $_SESSION['userAdded'] = true;
                    $_SESSION['newUserMail'] = $mail_correct;
                } else {
                    $_SESSION['errorAdd'] = true;
                    $_SESSION['errorMessage'] = $connect->error;
                }
                mysqli_close($connect);
            } else {
                $_SESSION['mailTaken'] = true;
            }
        } else {
            $_SESSION['passwordIsDifferent'] = true;
        }
    } else {
        $_SESSION['incorrectRegisterData'] = true;
    }
}

//LOGIN -------------------------------------------------------------------------------
if (isset($_POST['login_submit'])) {
    if(!empty($_POST['login_mail'])&&!empty($_POST["login_password"])) {
        $mail = trim($_POST['login_mail']);
        $password = trim($_POST['login_password']);

        //MAIL SANITIZATION
        $mail_correct = filter_var($mail, FILTER_SANITIZE_EMAIL);

        //CHECK IF THERE IS USER WITH THAT E-MAIL
        require_once('partials/_connect.php');
        $user = $connect->query("SELECT * FROM users WHERE BINARY user_mail='$mail_correct'");
        if ($user->num_rows==1) {

            //CHECK IF THE PASSWORD IS CORRECT
            $row = mysqli_fetch_assoc($user);
            if(password_verify($password,$row['user_password'])){

                //CHECK USER STATUS
                if($row["user_status"]==1){
                    $_SESSION['logged_in']=true;
                    $_SESSION['user_id']=$row['user_id'];
                    $_SESSION['user_mail']=$row['user_mail'];
                    setcookie('lastActivity', time(), time() + 1800);

                    header('Location:index.php');
                }else{
                    $_SESSION['userBlocked'] = true;
                }

            }else{
                $_SESSION['incorrectLoginPassword'] = true;
            }
            mysqli_close($connect);
        }else{
            $_SESSION['accountNotFound'] = true;
        }

    }else {
        $_SESSION['incorrectLoginData'] = true;
    }
}


?>

<?php
    require_once('controllers/alert.php');
?>