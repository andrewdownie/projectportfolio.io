$(document).ready(function(){
    $("#login-email, #login-password").on('input',function(e){
        if( $("#login-email").val().length > 0  && !validEmail($("#login-email").val()) ){
            $("#login-error").text("Invalid email")
            $("#login-button").hide()
        }
        else if( $("#login-password").val().length > 0  && !validPassword($("#login-password").val()) ){
            $("#login-error").text("Invalid password")
            $("#login-button").hide()
        }
        else{
            $("#login-error").text("")
            $("#login-button").show()
        }
    });


    $("#login-button").click(function(){
        ajaxcall_login();
    });


    $("#signup-email, #signup-confirm-email").on('input',function(e){
        if( $("#signup-email").val().length > 0 && !validEmail( $("#signup-email").val() )){
            $("#signup-error").text("Invalid email")
            $("#signup-button").hide()

        }
        else if($("#signup-email").val() != $("#signup-confirm-email").val()){
            $("#signup-error").text("Emails must match")
            $("#signup-button").hide()

        }
        else{
            $("#signup-error").text("")
            $("#signup-button").show()
        }
    });

    $("#signup-button").click(function(){
        ajaxcall_signup()
    });


});

//=====
//===== ajaxcall_login ---------------------------------------------------------
//=====
function ajaxcall_login(){
    if($("#login-email").val() == "" || $("#login-password").val() == ""){
        return;
    }
    $("#login-loading").show();

    $.ajax({
        url: '/ajax_api',
        type: "POST",
        data: {
            "function": "login",
            "email": $("#login-email").val(),
            "password": $("#login-password").val()
        },
        success: function(data) {
            //alert(data)
            if(data === "login-success"){
                $("#login-invalid-email-password").hide();
                window.location = "/index"
            }
            else if(data === "login-invalid"){
                $("#login-error").val("That email password combo does not exist");
            }
            else{
                alert("Unexpected response error\n\nThe wizard isn't happy about this either\n     (∩｀╭╮´)⊃━☆ﾟ.*･｡ﾟ")
            }
        },
        error: function(xhr, desc, err) {
            alert('No response from server >:( ')
        },
        complete: function(){
            $("#login-loading").hide();
        }
    }); // end ajax call
}


//=====
//===== ajaxcall_signup --------------------------------------------------------
//=====
function ajaxcall_signup(){
    if($("#signup-email").val() == "" || $("#signup-password").val() == ""){
        return;
    }

    $("#signup-loading").show();

    $.ajax({
        url: '/ajax_api',
        type: "POST",
        data: {
            "function": "signup",
            "email": $("#signup-email").val(),
            "password": $("#signup-password").val()
        },
        success: function(data) {
            //alert(data)

            if(data === "signup-success"){
                //$("#signup-emails-dont-match").hide();
                window.location = "/verification-required"
            }
            else if(data === "signup-failure"){
                alert("There was a problem signing you up :( Maybe try again later?")
            }
            else if(data === "signup-exists"){
                alert("An account with that email already exists")
            }
            else{
                alert("Unexpect response error\n\nThe wizard isn't happy about this either\n     (∩｀╭╮´)⊃━☆ﾟ.*･｡ﾟ")
            }
        },
        error: function(xhr, desc, err) {
            alert('No response from server >:( ')
        },
        complete: function(){
            $("#signup-loading").hide();
        }
    }); // end ajax call
}
