<?php
    require_once('partials/_head.php');
    require_once('partials/_body.php');
    require_once('controllers/login.php');
?>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="bg-white card shadow p-5">
            <div class="row gx-5">
                <div class="col-md-6 border-end">
                    <div class="m-md-5">
                        <form id="login_form" name="login" action="" method="post">
                            <h2 class="mb-4">Zaloguj się</h2>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="login_mail" placeholder="Adres e-mail">
                                <label for="floatingInput">Adres e-mail</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" name="login_password" placeholder="Hasło">
                                <label for="floatingPassword">Hasło</label>
                            </div>
                            <button type="submit" name="login_submit" class="btn btn-success mt-3">Zaloguj się</button>
                        </form>
                        <?php require('partials/_alert.php'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="m-md-5">
                        <form id="register_form" name="register" action="" method="post">
                            <h2 class="mb-4">Utwórz konto</h2>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="register_mail" placeholder="Adres e-mail">
                                <label for="floatingInput">Adres e-mail</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="register_password" placeholder="Hasło">
                                <label for="floatingPassword">Hasło</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" name="register_password_rep" placeholder="Powtórz hasło">
                                <label for="floatingPassword">Powtórz hasło</label>
                            </div>
                            <button type="submit" name="register_submit" class="btn btn-success mt-3">Utwórz konto</button>
                        </form>
                        <?php require('partials/_alert.php'); ?>
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
