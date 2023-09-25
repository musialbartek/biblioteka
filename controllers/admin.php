<?php


//USERS OPERATION -------------------------------------------------------------
if (isset($_POST['users_operation_submit'])) {
    if (isset($_POST['users'])) {
        if (isset($_POST['users_operations'])) {
            $selectedUsers = $_POST['users'];
            $selectedOperation= $_POST['users_operations'];

            $totalUsers = count($selectedUsers);
            $userIdList = '';
            foreach ($selectedUsers as $k => $userId) {

                $userIdList .= $userId;
                if ($k < $totalUsers - 1) {
                    $userIdList .= ',';
                }
            }
            require('partials/_connect.php');

            if($selectedOperation=='block_user'){
                $blockUsers = $connect->query("UPDATE users SET user_status=0 WHERE BINARY user_id IN({$userIdList})");
                header('Location:admin.php');
            }elseif($selectedOperation=='unlock_user'){
                $unlockUsers = $connect->query("UPDATE users SET user_status=1 WHERE BINARY user_id IN({$userIdList})");
                header('Location:admin.php');
            }elseif ($selectedOperation=='delete_user'){
                $deleteUser=$connect->query("DELETE FROM users WHERE BINARY user_id IN({$userIdList})");
                header('Location:admin.php');
            }else{
                $_SESSION['nonexistentOperation'] = true;
            }
            mysqli_close($connect);
        }else{
            $_SESSION['operationNotSelected'] = true;
        }
    }else{
        $_SESSION['usersNotSelected'] = true;
    }
}

?>

<?php
    require_once('controllers/alert.php');
?>