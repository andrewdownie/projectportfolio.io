$(document).ready(function(){
    //__VERIFY stuff__//
    var verify =  get_url_vars()['verify']
    if(verify == "success"){
        $("#verify-success").show()
        $("#login-email").focus()
    }
    else if(verify == "failure"){
        $("#verify-failure").show()
        $("#signup-email").focus()
    }
    else if(verify == "expired"){
        $("#verify-expired").show()
        $("#signup-email").focus()
    }

    //__AJAX and input stuff below__//
    validate_login_inputs();
    validate_signup_inputs();


    $("#login-email, #login-password").on('input',function(e){
        validate_login_inputs()
    });

    $("#signup-email, #signup-confirm-email").on('input',function(e){
        validate_signup_inputs()
    });


    $("#login-email, #login-password").keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            if(validate_login_inputs()){
                ajaxcall_login();
            }
        }
    });

    $("#signup-email, #signup-confirm-email").keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            if(validate_signup_inputs()){
                ajaxcall_signup();
            }
        }
    });


    $("#login-button").click(function(){
        $("#login-button").blur()
        if(validate_login_inputs()){
            ajaxcall_login();
        }
    });

    $("#signup-button").click(function(){
        $("#signup-button").blur()
        if(validate_signup_inputs()){
            ajaxcall_signup()
        }
    });

});

//=====
//===== validiate login inputs -------------------------------------------------
//=====
function validate_login_inputs(){
    //return true

    if( $("#login-email").val().length > 0  && !validEmail($("#login-email").val()) ){
        $("#login-error").text("Invalid email")
        $("#login-button").hide()
        return false
    }
    else if( $("#login-email").val().length == 0 && $("#login-password").val().length > 0){
        $("#login-error").text("Email cannot be blank")
        $("#login-button").hide()
        return false
    }
    else if( $("#login-email").val().length > 0 && $("#login-password").val().length == 0){
        $("#login-error").text("Password is blank")
        $("#login-button").hide()
        return false
    }else if( $("#login-email").val().length > 0){
        var valPass = validPassword($("#login-password").val())

        if(valPass !== true){
            $("#login-error").text(valPass)
            return false
        }

    }
    $("#login-error").text("")
    $("#login-button").show()
    return true
}

//=====
//===== validiate signup inputs ------------------------------------------------
//=====
function validate_signup_inputs(){
    //return true

    if( $("#signup-email").val().length > 0 && !validEmail( $("#signup-email").val() )){
        $("#signup-error").text("Invalid email")
        $("#signup-button").hide()
        return false
    }
    else if($("#signup-email").val() != $("#signup-confirm-email").val()){
        $("#signup-error").text("Emails must match")
        $("#signup-button").hide()
        return false
    }

    $("#signup-error").text("")
    $("#signup-button").show()
    return true
}


//=====
//===== LOGIN AJAX CALL --------------------------------------------------------
//=====
function ajaxcall_login(){
    if($("#login-email").val() == ""){
        return
    }
    if($("#login-password").val() == ""){
        $("#login-error").text("Password is blank")
        $("#login-button").hide()
        return
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
                $("#login-error").text("Invalid email/pass combo")
                $("#login-button").hide()
                $("#login-password").val("")
            }
            else if(data === "login-invalid-email"){
                $("#login-error").text("Invalid email")
                $("#login-button").hide()
                $("#login-password").val("")
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
//===== SIGNUP AJAX CALL -------------------------------------------------------
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
                window.location = "/verification"
            }
            else if(data === "signup-failure"){
                alert("There was a problem signing you up :( Maybe try again later?")
            }
            else if(data === "signup-exists"){
                alert("An account with that email already exists")
            }
            else if(data === "login-invalid-email"){
                $("#signup-error").text("Invalid email")
                $("#signup-button").hide()
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
