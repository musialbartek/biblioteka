<?php
    require_once('partials/_head.php');
    require_once('partials/_body.php');
    require_once('controllers/borrow.php');
    if(!isset( $_SESSION['logged_in'])){
        header('Location:index.php');
    }

    if(isset($_GET['selected_books'])) {
        $selectedBooksID = $_GET['selected_books'];
        require('partials/_connect.php');
        $selectedBookS = $connect->query("SELECT * FROM books INNER JOIN authors ON books.author_id=authors.author_id WHERE book_id IN({$selectedBooksID})");
        mysqli_close($connect);

        $rows = $selectedBookS->fetch_all(MYSQLI_ASSOC);
    }
?>
<div class="row mb-4">
    <div class="col-md-4 offset-md-4">
        <div class="bg-white card shadow p-3">
            <h1 class="h2 mb-0 text-center">Wypożycz</h1>
        </div>
    </div>
</div>
<div class="text-center basket_view pt-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <?php if(isset($_GET['selected_books'])):?>
                <form id="borrow_book_form" name="borrow_book_form" method="post" class="text-center">

                    <div class="row align-items-center gx-5 gy-3 mb-4 bg-light rounded pb-3">
                        <?php foreach ($rows as $k => $v):?>
                            <div class="col-md-1">
                                <a href="<?php echo $v['book_picture']?>" data-fancybox data-caption="<?php echo $v['book_name']?>">
                                    <img src="<?php echo $v['book_picture']?>" class="img-fit" alt="<?php echo $v['book_name']?>" />
                                </a>
                            </div>
                            <div class="col-md-8">
                                <h4 class="text-start">
                                    <p>
                                        <?php echo $v['book_name']?>
                                    </p>
                                </h4>
                                <h6 class="text-start">
                                    <p>
                                        <?php echo $v['author_name']?>
                                    </p>
                                </h6>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex justify-content-end">
                                    <div class="bg-dark rounded p-3 d-inline-flex">
                                        <div class="form-check d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" name="books[]" value="<?php echo $v['book_id']?>" id="id_<?php echo $v['book_id']?>" checked>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                    <div class="d-inline-flex p-3 rounded bg-light">
                        <button type="submit" name="borrow_submit" class="btn btn-danger">Potwierdź</button>
                    </div>

                </form>
                <?php require_once('partials/_alert.php'); ?>
            <?php endif?>
        </div>
    </div>
</div>

<?php
    require_once('partials/_bodyEnd.php');
    require_once('partials/_headEnd.php');
?>
