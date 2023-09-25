<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">

            <div class="d-flex w-100 align-items-center justify-content-between">
                <div>
                    <a href="index.php">
                        <i class="bi bi-house"></i>
                    </a>
                </div>
                <div>
                    Biblioteka
                </div>
                <div class="d-flex align-items-center">
                    <?php if(!isset($_SESSION['logged_in'])):?>
                        <form method="post" action="login.php">
                            <input class="btn btn-success" type="submit" name="logout-btn" value="Zaloguj się">
                        </form>
                    <?php else:?>
                        <a id="submit_basket" href="#" type="submit" name="" class="me-5 mb-1">
                            <i class="bi bi-bag-check"></i>
                        </a>
                        <?php if(isset($_SESSION['user_mail'])):?>
                            <a href="user_profile.php" class="login-icon me-4">
                                <?php echo $_SESSION['user_mail'][0];?>
                            </a>
                        <?php elseif(isset($_SESSION['admin_mail'])):?>
                            <a href="admin.php" class="login-icon me-4">
                                <?php echo $_SESSION['admin_mail'][0];?>
                            </a>
                        <?php else:?>
                            <a href="user_profile.php" class="me-4">
                                <i class="bi bi-person"></i>
                            </a>
                        <?php endif?>
                        <a href="logout.php">
                            <i class="bi bi-box-arrow-right"></i>
                        </a>
                    <?php endif?>
                </div>
            </div>
        </div>
    </nav>
</header>