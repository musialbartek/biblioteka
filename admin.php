<?php
    require_once('partials/_head.php');
    require_once('partials/_body.php');
    require_once('controllers/admin.php');

    if (!isset($_SESSION['adminLogged'])){
        header('Location:loginAdmin.php');
    }

    require('partials/_connect.php');

    $users = $connect->query("SELECT * FROM users");
//    $usersDistinct = $connect->query("SELECT DISTINCT users.user_id, users.user_mail, users.user_status, FROM users LEFT JOIN users_books ON users.user_id=users_books.user_id LEFT JOIN books ON users_books.book_id=books.book_id");
    mysqli_close($connect);

    $rows = $users->fetch_all(MYSQLI_ASSOC);

?>

    <div class="h-100 text-center">
        <div class="row mb-4">
            <div class="col-md-4 offset-md-4">
                <div class="bg-white card shadow p-3">
                    <h1 class="h2 mb-0 text-center">Panel admina</h1>
                </div>
            </div>
        </div>
        <div class="users-table">
            <form id="users_management" name="users_management" method="post">
                <table class="table table-hover table-light">
                    <thead>
                        <tr>
                            <th scope="col">Lp.</th>
                            <th scope="col">ID</th>
                            <th scope="col">Adres e-mail</th>
                            <th scope="col">Status</th>
                            <th scope="col">Wybierz</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rows as $k => $v):?>
                        <tr>
                            <td scope="row">
                              <?php echo $k+1?>
                            </td>
                            <td>
                                <?php echo $v['user_id']?>
                            </td>
                            <td>
                              <?php echo $v['user_mail']?>
                            </td>
                            <td>
                                <?php if($v['user_status']==1):?>
                                    Aktywny
                                <?php else:?>
                                    Zablokowany
                                <?php endif?>
                            </td>
                            <td>
                                <div class="form-check d-flex justify-content-center">
                                    <input class="form-check-input" type="checkbox" name="users[]" value="<?php echo $v['user_id']?>" id="id_<?php echo $v['user_id']?>">
                                </div>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    <div class="d-inline-flex p-2 rounded bg-light">
                        <div class="me-3">
                            <input type="radio" class="btn-check" name="users_operations" id="block-user" value="block_user" autocomplete="off">
                            <label class="btn btn-outline-danger" for="block-user">Zablokuj użytkownika</label>
                        </div>
                        <div class="me-3">
                            <input type="radio" class="btn-check" name="users_operations" id="unlock-user" value="unlock_user" autocomplete="off">
                            <label class="btn btn-outline-danger" for="unlock-user">Odblokuj użytkownika</label>
                        </div>
                        <div>
                            <input type="radio" class="btn-check" name="users_operations" id="delete-user" value="delete_user" autocomplete="off">
                            <label class="btn btn-outline-danger" for="delete-user">Usuń użytkownika</label>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex p-3 mt-4 rounded bg-light">
                    <button type="submit" name="users_operation_submit" class="btn btn-danger">Potwierdź</button>
                </div>
            </form>
            <?php require_once('partials/_alert.php'); ?>
        </div>
    </div>

<?php
    require_once('partials/_bodyEnd.php');
    require_once('partials/_headEnd.php');
?>
