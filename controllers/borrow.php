<?php


//USERS OPERATION -------------------------------------------------------------
if (isset($_POST['borrow_submit'])) {
    if (isset($_POST['books'])) {

        $selectedBooks = $_POST['books'];

        require('partials/_connect.php');

        foreach ($selectedBooks as $k => $bookId) {

            $borrowBook= $connect->query("INSERT INTO users_books VALUES(NULL,'{$_SESSION['user_id']}',$bookId)");
            $booksListDecrease = $connect->query("UPDATE books INNER JOIN users_books ON books.book_id=users_books.book_id SET books.book_quantity = books.book_quantity-1 WHERE books.book_id IN ($bookId)");
        }
        mysqli_close($connect);
        header('Location:user_profile.php');

    }else{
        $_SESSION['booksToBorrowNotSelected'] = true;
    }
}

?>

<?php
    require_once('controllers/alert.php');
?>