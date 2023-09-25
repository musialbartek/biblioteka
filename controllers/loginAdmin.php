<?php

//LOGIN -------------------------------------------------------------------------------
if (isset($_POST['login_admin_submit'])) {
    if(!empty($_POST['login_mail'])&&!empty($_POST["login_password"])) {
        $mail = trim($_POST['login_mail']);
        $password = trim($_POST['login_password']);

        //MAIL SANITIZATION
        $mail_correct = filter_var($mail, FILTER_SANITIZE_EMAIL);

        //CHECK IF THERE IS USER WITH THAT E-MAIL
        require_once('partials/_connect.php');
        $user = $connect->query("SELECT * FROM admins WHERE BINARY admin_mail='$mail_correct'");
        if ($user->num_rows==1) {

            //CHECK IF THE PASSWORD IS CORRECT
            $row = mysqli_fetch_assoc($user);
            if(password_verify($password,$row['admin_password'])){

                //CHECK USER STATUS
                if($row["admin_status"]==1){
                    $_SESSION['logged_in']=true;
                    $_SESSION['adminLogged']=true;
                    $_SESSION['admin_id']=$row['admin_id'];
                    $_SESSION['admin_mail']=$row['admin_mail'];
                    setcookie('lastActivity', time(), time() + 1800);

                    header('Location:admin.php');
                }else{
                    $_SESSION['adminBlocked'] = true;
                }

            }else{
                $_SESSION['incorrectAdminLoginPassword'] = true;
            }
            mysqli_close($connect);
        }else{
            $_SESSION['adminNotFound'] = true;
        }

    }else {
        $_SESSION['incorrectAdminLoginData'] = true;
    }
}


?>

<?php
    require_once('controllers/alert.php');
?>