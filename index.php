<?php
    require_once('partials/_head.php');
    require_once('partials/_body.php');
    require_once('partials/_connect.php');

    $booksList = $connect->query('SELECT * FROM books INNER JOIN authors ON books.author_id=authors.author_id');
?>
<div class="books_list">

    <?php if($booksList->num_rows > 0):?>
        <h1 class="text-center my-5">
            Książki do wypożyczenia
        </h1>
        <div class="card-group">
            <div class="row gy-5">
                <?php while ($row = mysqli_fetch_assoc($booksList)):?>
                    <div class="col-xl-3 col-md-6">
                        <div class="card h-100">
                            <a href="<?php echo 'bookView.php?book_id='.$row["book_id"]?>">
                                <img src="<?php echo $row['book_picture']?>" class="img-fit mt-3" alt="<?php echo $row['book_name']?>" />
                            </a>
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <div class="mb-3">
                                        <h4 class="card-title">
                                            <a href="<?php echo 'bookView.php?book_id='.$row["book_id"]?>">
                                                <?php echo $row['book_name']?>
                                            </a>
                                        </h4>
                                        <h6>
                                            <?php echo $row['author_name']?>
                                        </h6>
                                    </div>
                                    <p class="card-text">
                                        <?php if(strlen($row['book_description'])>200):?>
                                            <?php
                                                $cutDesc = wordwrap($row['book_description'], 200);
                                                $cutDesc = substr($cutDesc, 0, strpos($cutDesc, "\n"));
                                            ?>
                                            <?php echo $cutDesc?>...
                                        <?php else:?>
                                            <?php echo $row['book_description']?>
                                        <?php endif?>
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <div>
                                        <p>
                                            Na stanie:
                                            <?php echo $row['book_quantity']?>
                                        </p>
                                    </div>
                                    <?php if(!isset($_SESSION['logged_in'])||isset($_SESSION['adminLogged'])):?>
                                        <?php if(isset($_SESSION['adminLogged'])):?>
                                           <?php session_destroy();?>
                                        <?php endif?>
                                        <a href="<?php echo 'login.php'?>" class="btn btn-outline-primary <?php if($row['book_quantity']<=0):?>disabled<?php endif?>" id="<?php echo $row['book_id']?>">
                                            <?php if($row['book_quantity']>0):?>
                                                Wypożycz
                                            <?php else:?>
                                                Niedostępna
                                            <?php endif?>
                                        </a>
                                    <?php else:?>
                                        <input type="checkbox" name="books_choose[]" class="btn btn-check btn-outline-primary book-borrow <?php if($row['book_quantity']<=0):?>disabled<?php endif?>" id="<?php echo $row['book_id']?>">
                                        <label class="btn btn-outline-primary <?php if($row['book_quantity']<=0):?>disabled<?php endif?>" for="<?php echo $row['book_id']?>">
                                            <?php if($row['book_quantity']>0):?>
                                                Wypożycz
                                            <?php else:?>
                                                Niedostępna
                                            <?php endif?>
                                        </label>
                                    <?php endif?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;?>
            </div>
        </div>
    <?php else:?>
        <h2>
            Brak dostępnych książek
        </h2>
    <?php endif?>

</div>

<?php
    mysqli_close($connect);
    require_once('partials/_bodyEnd.php');
    require_once('partials/_headEnd.php');
?>
