
//MARGIN FROM TOP
$(document).ready(function (){
    $('.scroll-margin').css('height',$('header').outerHeight());
    $('.scroll-margin_first').css('height',($('header').outerHeight()+20)/16+'rem');
})

//ADD SCROLL CLASS TO NAVBAR
$(document).ready(function (){
    $(window).scroll(function() {
        if ($(window).scrollTop() > 0) {
            $('.navbar').addClass('scroll');
        } else {
            $('.navbar').removeClass('scroll');
        }
    })
})

//BORROW BOCK
$(document).ready(function (){
    let borrowList = [];
    $('input.book-borrow ').click(function (){
        $(this).toggleClass('active');
        if($(this).hasClass("active")){
            borrowList.push($(this).attr('id'));
            $(this).siblings('label').text('Zrezygnuj');
            $('#submit_basket').addClass('active');
        }else{
            var index = borrowList.indexOf($(this).attr('id'));
            if(index > -1){
                borrowList.splice(index, 1);
                $(this).siblings('label').text('Wypożycz');
            }
        }
        if(borrowList.length<1){
            $('#submit_basket').removeClass('active');
        }
    })

    $("#submit_basket").click(function() {
        var url = "basket.php?selected_books=" + borrowList.join(",");
        window.location.href = url;
    });
})

//USE FANCYBOX
$(document).ready(function() {
    Fancybox.bind("[data-fancybox]", {});
});

//ALERT FUNCTION
function afterSubmitAlert(form, type, message){
    $('#'+form).siblings('.alert').text(message);
    $('#'+form).siblings('.alert').removeClass('alert-danger');
    $('#'+form).siblings('.alert').removeClass('alert-success');
    $('#'+form).siblings('.alert').addClass(type);
    $('#'+form).siblings('.alert').css('display','block');
}

//REGISTER VALIDATION
$(document).ready(function () {
    if ($('div[name="register"]').length > 0) {
        $('form[name="register"]').on("submit", function (e) {
            var mail = $(this).find('input[name="register_mail"]');
            var pass = $(this).find('input[name="register_password"]');
            var passRep = $(this).find('input[name="register_password_rep"]');

            var upperCase = new RegExp('[A-Z]');
            var lowerCase = new RegExp('[a-z]');
            var numbers = new RegExp('[0-9]');

            if ($.trim(mail.val()) === "" || $.trim(pass.val()) === "" || $.trim(passRep.val()) === "") {

                e.preventDefault();
                afterSubmitAlert('register_form', 'alert-danger', 'Uzupełnij wszystkie dane');
            } else if ($.trim(pass.val()) !== $.trim(passRep.val())) {

                e.preventDefault();
                afterSubmitAlert('register_form', 'alert-danger', 'Hasła się różnią');
            } else if (!$.trim(pass.val()).match(upperCase) || !$.trim(pass.val()).match(lowerCase) || !$.trim(pass.val()).match(numbers) || !$.trim(pass.val()).lenght >= 8) {
                e.preventDefault();
                afterSubmitAlert('register_form', 'alert-danger', 'Hasło musi zawierać małe i duże litery i składać się przynajmniej z 8 znaków');
            }
        });
    }
});


//LOGIN VALIDATION
$(document).ready(function () {
    if ($('div[name="login"]').length > 0) {
        $('form[name="login"]').on("submit", function (e) {
            var mail = $(this).find('input[name="login_mail"]');
            var pass = $(this).find('input[name="login_password"]');


            if ($.trim(mail.val()) === "" || $.trim(pass.val()) === "") {
                e.preventDefault();
                afterSubmitAlert('login_form', 'alert-danger', 'Uzupełnij wszystkie dane');
            }
        });
    }
});

//CHANGE PASSWORD VALIDATION
$(document).ready(function () {
    if ($('div[name="change_password"]').length > 0) {
        $('form[name="change_password"]').on("submit", function (e) {
            var pass = $(this).find('input[name="current_password"]');
            var passRep = $(this).find('input[name="new_password"]');

            var upperCase = new RegExp('[A-Z]');
            var lowerCase = new RegExp('[a-z]');
            var numbers = new RegExp('[0-9]');

            if ($.trim(pass.val()) === "" || $.trim(passRep.val()) === "") {

                e.preventDefault();
                afterSubmitAlert('change_password', 'alert-danger', 'Uzupełnij wszystkie dane');
            } else if (!$.trim(passRep.val()).match(upperCase) || !$.trim(passRep.val()).match(lowerCase) || !$.trim(passRep.val()).match(numbers) || !$.trim(passRep.val()).lenght >= 8) {
                e.preventDefault();
                afterSubmitAlert('change_password', 'alert-danger', 'Hasło musi zawierać małe i duże litery i składać się przynajmniej z 8 znaków');
            }
        });
    }
});

//ADMIN LOGIN VALIDATION
$(document).ready(function () {
    if ($('div[name="login_admin_form"]').length > 0) {
        $('form[name="login_admin_form"]').on("submit", function (e) {
            var mail = $(this).find('input[name="login_mail"]');
            var pass = $(this).find('input[name="login_password"]');


            if ($.trim(mail.val()) === "" || $.trim(pass.val()) === "") {
                e.preventDefault();
                afterSubmitAlert('login_admin_form', 'alert-danger', 'Uzupełnij wszystkie dane');
            }
        });
    }
});

//ADMIN USERS OPERATIONS
$(document).ready(function () {
    if ($('div[name="users_management"]').length > 0) {
        $('form[name="users_management"]').on("submit", function (e) {
            if ($("input[name='users[]']:checked").length === 0) {
                e.preventDefault();
                afterSubmitAlert('users_management', 'alert-danger', 'Nie wybrano użytkowników');
            } else if ($("input[name='users_operations']:checked").length === 0) {
                e.preventDefault();
                afterSubmitAlert('users_management', 'alert-danger', 'Nie wybrano operacji');
            } else if ($("input[name='users_operations']").val() !== 'block_user' && $("input[name='unlock_user']").val() && $("input[name='delete_user']").val()) {
                e.preventDefault();
                afterSubmitAlert('users_management', 'alert-danger', 'Nie istniejąca operacja');
            }
        });
    }
});

//ADMIN USERS OPERATIONS
$(document).ready(function () {
    if ($('div[name="borrow_book_form"]').length > 0) {
        $('form[name="borrow_book_form"]').on("submit", function (e) {
            if ($("input[name='books[]']:checked").length === 0) {
                e.preventDefault();
                afterSubmitAlert('borrow_book_form', 'alert-danger', 'Nie wybrano książki do wypożyczenia');
            }
        });
    }
});