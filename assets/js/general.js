const baseUrl = function baseUrl() {
    let url = $("body").data('baseurl').toString();
    return url;
}

function openLoginModel() {
    $('#loginModal').modal('show');
    $('#signUpModal').modal('hide');
}

function openSignUpModel() {
    $('#loginModal').modal('hide');
    $('#signUpModal').modal('show');
}

function signUp(e) {
    e.preventDefault(e);

    var userParam =
    {
        user: {
            email: $('#signUpForm').find('input[name="user[email]"]').val(),
            password: $('#signUpForm').find('input[name="user[password]"]').val(),
            repassword: $('#signUpForm').find('input[name="user[repassword]"]').val(),
        }
    }
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: JSON.stringify(userParam),
        contentType: "application/json; charset=utf-8",
        crossDomain: true,
        url: `${baseUrl()}` + 'api/users/register/',
        success: function (data) {
            if (!data.success) {
                notify(data.message, 'danger');
                $(".signUpError").html(data.message);

            } else {
                notify('User Created Sucessfully', 'success');
                $('.modal').modal('hide');
                Cookies.set('loginToken', data.token);
            }
        },
        error: function (data) {
            res = data.responseJSON
            notify(res.message, 'danger');
            $(".signUpError").html(res.message);
        }
    });
}

function login(e) {
    e.preventDefault(e);

    var userParam =
    {
        user: {
            email: $('#loginForm').find('input[name="user[email]"]').val(),
            password: $('#loginForm').find('input[name="user[password]"]').val(),
        }
    }

    $.ajax({
        type: "POST",
        dataType: 'json',
        data: JSON.stringify(userParam),
        contentType: "application/json; charset=utf-8",
        crossDomain: true,
        url: `${baseUrl()}` + 'api/users/login/',
        success: function (data) {
            if (!data.success) {
                notify(data.message, 'danger');
                $(".loginError").html(data.message);
            } else {
                notify(data.message, 'success');
                $('.modal').modal('hide');
                Cookies.set('loginToken', data.token);
            }
        },
        error: function (data) {
            res = data.responseJSON
            notify(res.message, 'danger');
            $(".loginError").html(res.message);
        }
    });
}

function checkUserLogin() {
    let loginStatus = false;
    jwtToken = Cookies.get("loginToken");

    if (jwtToken == null || jwtToken == '') {
        return false;
    }
    param = {
        token: jwtToken
    }
    $.ajax({
        type: "POST",
        dataType: 'json',
        data: JSON.stringify(param),
        contentType: "application/json; charset=utf-8",
        crossDomain: true,
        async: false,
        url: `${baseUrl()}` + 'api/users/validate/',
        success: function (data) {
            loginStatus = true;
        }
    });
    return loginStatus;
}


function toggleMember() {
    let login = checkUserLogin();
    if (login !== true) {
        return openLoginModel();
    }
    return window.location.href = `${baseUrl()}member`;
    // return false; got to dashboard
}



function notify(message = '', type = '') {
    $.notify({
        // options
        message: message
    }, {
        // settings
        type: type
    });
}

