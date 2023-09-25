<?php
    require_once('partials/_head.php');
    require_once('partials/_body.php');
    require_once('controllers/loginAdmin.php');
?>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="bg-white card shadow p-5">
            <div class="row gx-5">
                <div class="col-12">
                    <div class="m-md-5">
                        <form id="login_admin_form" name="login_admin_form" action="" method="post">
                            <div class="d-flex flex-column justify-content-center">
                                <h2 class="mb-4 text-center">Zaloguj się</h2>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="login_mail" placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="login_password" placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <button type="submit" name="login_admin_submit" class="btn btn-success mt-3">Zaloguj się</button>
                            </div>
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
