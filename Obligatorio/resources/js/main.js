
$(document).on("change", "input:radio", function(){
    //submit 
});

$(document).on("hover",".currentRate", function(){
    $(this).next().removeClass("rated");
    
});

$(document).on("blur",".currentRate", function(){
    $(this).next().addClass("rated");
});

$(document).ready(startDoc);

function startDoc()
{
    var user = getCookie('usuario');
    $(window).load(function(){
      if(user === undefined)
    {
        $('#logIn').removeClass('hide');
        $('#logOut').removeClass('hide').addClass('hide');
    }
    else
    {
        $('#logIn').addClass('hide');
        $('#logOut').removeClass('hide');
    }
    $('#logOut').click(logOut);
   });
}

function logOut(e)
{
    e.preventDefault();
    $.ajax({
        url:"logout.php",
        type:"POST",
        success: logOutSuccess,
        timeout: 4000
    });
}

$(document).on("submit", "#logInForm", logIn);
$(document).on("click","#closeModal", clearLogInForm);

function clearLogInForm(e){
    $(':input','#logInForm')
        .not(':button, :submit, :reset, :hidden')
        .val('')
        .removeAttr('checked')
        .removeAttr('selected');
    $("#logInErrors").text("");
    $("#logInErrors").parent().addClass("hide");
}

function logIn(e){
    e.preventDefault();
    var userName = $("#userName").val();
    var password = $("#pwd").val();
    $.ajax({
        type: "POST",
        dataType: "json",
        success: function(result){ processLogIn(result);},
        timeout: 4000,
        error: errorLogIn,
        url: "Login.php",
        data: {username: userName, password: password}
    });
}

function processLogIn(result){
    if(result.success){
        window.location.replace("adminPage.php");        
    }else{
        $("#logInErrors").text(result.errorMsj);
        $("#logInErrors").parent().removeClass("hide");        
    }
}

function errorLogIn(e){
    alert("System error. Contact you SA.");
}

function logOutSuccess()
{
    setCookie('usuario', '', -1);
    window.location = "index.php";
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return undefined;
}

function checkCookie() {
    var user = getCookie("username");
    if (user != "") {
        alert("Welcome again " + user);
    } else {
        user = prompt("Please enter your name:", "");
        if (user != "" && user != null) {
            setCookie("username", user, 365);
        }
    }
}