<?php
    require_once('partials/_head.php');
    require_once('partials/_body.php');
    require_once('partials/_connect.php');

    $bookID=$_GET['book_id'];

    if(!isset($_SESSION['adminLogged'])){
        $bookInfo = mysqli_fetch_assoc($connect->query("SELECT * FROM books INNER JOIN authors ON books.author_id=authors.author_id INNER JOIN publishers ON books.publisher_id=publishers.publisher_id WHERE book_id='$bookID'"));
        mysqli_close($connect);
    }else{
        header('Location:index.php');
    }
?>
<div class="book_view">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="row gx-5 gy-3 bg-light rounded pb-3">
                <div class="col-md-4">
                    <a href="<?php echo $bookInfo['book_picture']?>" data-fancybox data-caption="<?php echo $bookInfo['book_name']?>">
                        <img src="<?php echo $bookInfo['book_picture']?>" class="img-fit" alt="<?php echo $bookInfo['book_name']?>" />
                    </a>
                </div>
                <div class="col-md-8">
                    <h1>
                        <?php echo $bookInfo['book_name']?>
                    </h1>
                    <h5>
                        <?php echo $bookInfo['author_name']?>
                    </h5>
                    <?php echo $bookInfo['book_description']?>
                    <div class="d-flex flex-column justify-content-end align-items-end mt-5">
                        <div class="text-end">
                            <h4>Szczegóły:</h4>
                            Data publikacji wydania: <?php echo $bookInfo['publication_year']?><br>
                            Autor: <?php echo $bookInfo['author_name']?><br>
                            Wydawca: <?php echo $bookInfo['publisher_name']?><br>
                            <b>Ilość na stanie: <?php echo $bookInfo['book_quantity']?></b>
                        </div>
                        <div class="mt-4">
                            <input type="checkbox" name="books_choose[]" class="btn btn-check btn-outline-primary book-borrow <?php if($bookInfo['book_quantity']<=0):?>disabled<?php endif?>" id="<?php echo $bookInfo['book_id']?>">
                            <label class="btn btn-outline-primary <?php if($bookInfo['book_quantity']<=0):?>disabled<?php endif?>" for="<?php echo $bookInfo['book_id']?>">
                                <?php if($bookInfo['book_quantity']>0):?>
                                    Wypożycz
                                <?php else:?>
                                    Niedostępna
                                <?php endif?>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    require_once('partials/_bodyEnd.php');
    require_once('partials/_headEnd.php');
?>