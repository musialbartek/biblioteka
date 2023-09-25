<!-- ALERTS CONTROL ---------------------------------------------------------------------------------->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        //ALERTS LOGIN CONTROL ---------------------------------------------------------------------------------------------

        //INCORRECT DATA

        <?php if(isset($_SESSION['incorrectLoginData']) && $_SESSION['incorrectLoginData']): ?>

            afterSubmitAlert('login_form', 'alert-danger', 'Wprowadź wszystkie dane');

            <?php unset($_SESSION['incorrectLoginData']); ?>
        <?php endif; ?>


        //ACCOUNT NOT FOUND

        <?php if(isset($_SESSION['accountNotFound']) && $_SESSION['accountNotFound']): ?>

            afterSubmitAlert('login_form', 'alert-danger', 'Nie istnieje konto o podanym adresie e-mail');

            <?php unset($_SESSION['accountNotFound']); ?>
        <?php endif; ?>


        //PASSWORD INCORRECT

        <?php if(isset($_SESSION['incorrectLoginPassword']) && $_SESSION['incorrectLoginPassword']): ?>

            afterSubmitAlert('login_form', 'alert-danger', 'Hasło nieprawidłowe');

            <?php unset($_SESSION['incorrectLoginPassword']); ?>
        <?php endif; ?>


        //USER BLOCKED

        <?php if(isset($_SESSION['userBlocked']) && $_SESSION['userBlocked']): ?>

            afterSubmitAlert('login_form', 'alert-danger', 'Użytkownik zablokowany');

            <?php unset($_SESSION['userBlocked']); ?>
        <?php endif; ?>




        //ALERTS REGISTER CONTROL ---------------------------------------------------------------------------------------------

        //PASSWORD IS DIFFERENT

        <?php if(isset($_SESSION['incorrectRegisterData']) && $_SESSION['incorrectRegisterData']): ?>


            afterSubmitAlert('register_form', 'alert-danger', 'Wprowadź wszystkie dane');

            <?php unset($_SESSION['incorrectRegisterData']); ?>
        <?php endif; ?>


        //PASSWORD IS DIFFERENT

        <?php if(isset($_SESSION['passwordIsDifferent']) && $_SESSION['passwordIsDifferent']): ?>


            afterSubmitAlert('register_form', 'alert-danger', 'Hasła się różnią');

            <?php unset($_SESSION['passwordIsDifferent']); ?>
        <?php endif; ?>


        //MAIL TAKEN

        <?php if(isset($_SESSION['mailTaken']) && $_SESSION['mailTaken']): ?>


            afterSubmitAlert('register_form', 'alert-danger', 'Ten E-mail jest już zajęty');

            <?php unset($_SESSION['mailTaken']); ?>
        <?php endif; ?>


        //ERROR ADD

        <?php if(isset($_SESSION['errorAdd']) && $_SESSION['errorAdd'] && isset($_SESSION['errorMessage'])): ?>


            afterSubmitAlert('register_form', 'alert-danger', 'Błąd: <?php echo $_SESSION['errorMessage']?>');

            <?php unset($_SESSION['errorAdd']); ?>
            <?php unset($_SESSION['errorMessage']); ?>
        <?php endif; ?>


        //NEW USER ADDED

        <?php if(isset($_SESSION['userAdded']) && $_SESSION['userAdded'] && isset($_SESSION['newUserMail'])): ?>


            afterSubmitAlert('register_form', 'alert-success', 'Dodano użytkownika o e-mailu: <?php echo $_SESSION['newUserMail']?>');

            <?php unset($_SESSION['userBlocked']); ?>
            <?php unset($_SESSION['newUserMail']); ?>
        <?php endif; ?>


        //CHANGE PASSWORD----------------------------------------------------------------------------------

        //INCORRECT DATA

        <?php if(isset($_SESSION['incorrectData']) && $_SESSION['incorrectData']): ?>

            afterSubmitAlert('change_password', 'alert-danger', 'Wprowadź wszystkie dane');

            <?php unset($_SESSION['incorrectData']); ?>
        <?php endif; ?>


        //PASSWORD INCORRECT

        <?php if(isset($_SESSION['incorrectCurrentPassword']) && $_SESSION['incorrectCurrentPassword']): ?>

            afterSubmitAlert('change_password', 'alert-danger', 'Obecne hasło nieprawidłowe');

            <?php unset($_SESSION['incorrectCurrentPassword']); ?>
        <?php endif; ?>


        //PASSWORD CHANGED

        <?php if(isset($_SESSION['passwordChanged']) && $_SESSION['passwordChanged']): ?>

            afterSubmitAlert('change_password', 'alert-success', 'Hasło zostało zmienione');

            <?php unset($_SESSION['passwordChanged']); ?>
        <?php endif; ?>




        //ADMIN LOGIN  ---------------------------------------------------------------------------------------------

        //INCORRECT

        <?php if(isset($_SESSION['incorrectAdminLoginData']) && $_SESSION['incorrectAdminLoginData']): ?>

            afterSubmitAlert('login_admin_form', 'alert-danger', 'Wprowadź wszystkie dane');

            <?php unset($_SESSION['incorrectAdminLoginData']); ?>
            <?php endif; ?>


        //ACCOUNT NOT FOUND

        <?php if(isset($_SESSION['adminNotFound']) && $_SESSION['adminNotFound']): ?>

            afterSubmitAlert('login_admin_form', 'alert-danger', 'Nie istnieje konto admina o podanym adresie e-mail');

            <?php unset($_SESSION['adminNotFound']); ?>
        <?php endif; ?>


        //PASSWORD INCORRECT

        <?php if(isset($_SESSION['incorrectAdminLoginPassword']) && $_SESSION['incorrectAdminLoginPassword']): ?>

            afterSubmitAlert('login_admin_form', 'alert-danger', 'Hasło nieprawidłowe');

            <?php unset($_SESSION['incorrectAdminLoginPassword']); ?>
        <?php endif; ?>


        //USER BLOCKED

        <?php if(isset($_SESSION['adminBlocked']) && $_SESSION['adminBlocked']): ?>

            afterSubmitAlert('login_admin_form', 'alert-danger', 'Admin zablokowany');

            <?php unset($_SESSION['adminBlocked']); ?>
        <?php endif; ?>



        //ADMIN PANEL ---------------------------------------------------------------------------------------------

        //USER NOT SELECTED

        <?php if(isset($_SESSION['usersNotSelected']) && $_SESSION['usersNotSelected']): ?>

            afterSubmitAlert('users_management', 'alert-danger', 'Nie wybrano użytkowników');

            <?php unset($_SESSION['usersNotSelected']); ?>
        <?php endif; ?>


        //OPERATION NOT SELECTED

        <?php if(isset($_SESSION['operationNotSelected']) && $_SESSION['operationNotSelected']): ?>

            afterSubmitAlert('users_management', 'alert-danger', 'Nie wybrano operacji');

            <?php unset($_SESSION['operationNotSelected']); ?>
        <?php endif; ?>


        //NONEXISTENT OPERATION

        <?php if(isset($_SESSION['nonexistentOperation']) && $_SESSION['nonexistentOperation']): ?>

            afterSubmitAlert('users_management', 'alert-danger', 'Nie istniejąca operacja');

            <?php unset($_SESSION['nonexistentOperation']); ?>
        <?php endif; ?>




        //BORROW BOOKS ---------------------------------------------------------------------------------------------

        //USER NOT SELECTED

        <?php if(isset($_SESSION['booksToBorrowNotSelected']) && $_SESSION['booksToBorrowNotSelected']): ?>

            afterSubmitAlert('borrow_book_form', 'alert-danger', 'Nie wybrano książki do wypożyczenia');

            <?php unset($_SESSION['booksToBorrowNotSelected']); ?>
        <?php endif; ?>

    });
</script>