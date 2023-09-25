<?php
    require_once('partials/_head.php');
    require_once('partials/_body.php');
    require_once('partials/_connect.php');
    require_once('controllers/change_password.php');

    if(!isset($_SESSION['adminLogged'])){
        $userBooks = $connect->query("SELECT * FROM users INNER JOIN users_books ON users.user_id=users_books.user_id INNER JOIN books ON users_books.book_id=books.book_id WHERE users.user_id='{$_SESSION['user_id']}'");
        mysqli_close($connect);

        $rows = $userBooks->fetch_all(MYSQLI_ASSOC);
    }else{
        header('Location:index.php');
    }

?>
<div class="row mb-4">
    <div class="col-md-4 offset-md-4">
        <div class="bg-white card shadow p-3">
            <h1 class="h2 mb-0 text-center">Panel użytkownika</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="bg-white card shadow p-5">
            <div class="row gx-5">
                <div class="col-md-6 border-end">
                    <div class="m-md-5">
                        <h2 class="mb-4">
                            Dane użytkownika:

                        </h2>
                        <div class="mb-3">
                            <p>
                                <b>adres e-mail:</b><br>
                                <?php if(!isset($_SESSION['adminLogged'])):?>
                                    <?php echo $_SESSION['user_mail']?>
                                <?php else:?>
                                    <?php echo $_SESSION['admin_mail']?>
                                <?php endif?>
                            </p>
                        </div>
                        <?php if(!isset($_SESSION['adminLogged'])):?>
                            <?php if(sizeof($rows)>0):?>
                                <div class="mb-3">
                                    <p>
                                        <b>Liczba wypożyczonych książek:</b><br>
                                        <?php echo sizeof($rows)?>
                                    </p>
                                </div>
                                <div>
                                    <p>
                                        <b>Posiadane książki:</b>
                                        <ol>
                                        <?php foreach ($rows as $k => $v):?>
                                            <li>
                                                <?php echo $v['book_name']?>
                                            </li>
                                        <?php endforeach;?>
                                        </ol>
                                    <p>
                                </div>
                            <?php endif?>
                        <?php endif?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="m-md-5">
                        <h1 class="h2 mb-4">
                            Zmień hasło
                        </h1>
                        <form id="change_password" name="change_password" action="" method="post">
                            <input type="hidden">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="current_password" placeholder="Obecne hasło">
                                <label for="floatingPassword">Obecne hasło</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" name="new_password" placeholder="Nowe hasło">
                                <label for="floatingPassword">Nowe hasło</label>
                            </div>
                            <button type="submit" name="change_password_submit" class="btn btn-success mt-3">Potwierdź</button>
                        </form>
                        <?php require_once('partials/_alert.php'); ?>
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
