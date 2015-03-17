
$(document).on("change", "input:radio", function () {
    //submit 
});

$(document).on("hover", ".currentRate", function () {
    $(this).next().removeClass("rated");

});

$(document).on("blur", ".currentRate", function () {
    $(this).next().addClass("rated");
});

$(document).ready(mainReadyFns);

function mainReadyFns()
{
    var path = "getUser.php";
    if(typeof getUserPath != 'undefined')
        path = getUserPath;
    Helper.getUser(path).then(function(data){
        if(data.success)
        {
            $('#logIn').addClass('hide');
            $('#logOut').removeClass('hide');
            $('.privateComponent').show();
        }
        else
        {
            $('#logIn').removeClass('hide');
            $('#logOut').removeClass('hide').addClass('hide');
            $('.privateComponent').hide();
        }
    });
    $('#logIn').click(clearLogInForm);
    $('#logOut').click(logOut);
    $("#logInForm").submit(logIn);
}



function logOut(e)
{
    var url = $(e.target).data('url');
    e.preventDefault();
    $.ajax({
        url: url,
        type: "POST",
        success: logOutSuccess,
        timeout: 4000
    });
}

function clearLogInForm() {
    $('#logInForm')[0].reset();
    $("#logInErrors").text("");
    $("#logInErrors").parent().addClass("hide");
}

function logIn(e) {
    e.preventDefault();
    var postData = {username: $("#userName").val(), password: $("#pwd").val()}
    
    $.ajax({
        type: "POST",
        dataType: "json",
        success: function (result) {
            processLogIn(result);
        },
        timeout: 4000,
        error: errorLogIn,
        url: "login.php",
        data: postData
    });
}

function processLogIn(result) {
    if (result.success) {
        $('#logIn').addClass('hide');
        $('#logOut').removeClass('hide');
        $('.privateComponent').show();
        $('#logInForm .btn-default').trigger('click');
        Helper.alertMsg($('#alerts'), Helper.getAlertTypes()[0], 'Hello&nbsp' + Helper.getCookie('usuario') + ' you have been successfuly logged in.');
    } else {
        $("#logInErrors").text(result.errorMsj);
        $("#logInErrors").parent().removeClass("hide");
    }
}

function errorLogIn(e) {
    alert("System error. Contact you SAdawdaw.");
}

function logOutSuccess()
{
    Helper.setCookie('usuario', '', -1);
    window.location = $("#homeLink").attr("href");
}


