$(document).ready(function(){
    validate_verify_inputs();

    $("#verify-username, #verify-password").on('input',function(e){
        validate_verify_inputs()
    });

    $("#verify-username, #verify-password").keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            if(validate_verify_inputs()){
                ajaxcall_verify();
            }
        }
    });

    $("#verify #verify-button").click(function(){
        $("#verify #verify-button").blur()
        if(validate_verify_inputs()){
            ajaxcall_verify();
        }
    });

});


//=====
//===== VALIDATE VERIFY INPUTS -------------------------------------------------
//=====
function validate_verify_inputs(){
    if($("#verify-username").val().length > 0 && !validUsername($("#verify-username").val())){
        var length = $("#verify-username").val().length
        var msg = ""

        if(length < 4){
            msg = "Username too short"
        }
        else if(length > 15){
            msg = "Username too long"
        }
        else if($("#verify-password").val().length == 0){
            msg = "Password is blank"
        }

        if(msg != ""){
            $("#verify-button").hide()
            $("#verify-error").text(msg)
            return false
        }
    }

    if( $("#verify-username").val().length == 0 && $("#verify-password").val().length > 0){
        $("#verify-error").text("Username is blank")
        $("#verify-button").hide()
        return false
    }

    if( $("#verify-password").val().length == 0 && $("#verify-username").val().length > 0){
        $("#verify-error").text("Password is blank")
        $("#verify-button").hide()
        return false
    }

    $("#verify-error").text("")
    $("#verify-button").show()
    return true
}

//=====
//===== VERIFY AJAX CALL -------------------------------------------------------
//=====
function ajaxcall_verify(){
    //TODO: basic validation

    $("#verify-loading").show();

    $.ajax({
        url: '/ajax_api',
        type: "POST",
        data: {
            "function": "verify-account",
            "username": $("#verify-username").val(),
            "password": $("#verify-password").val(),
            "verify_code": get_url_vars()['code']
        },
        success: function(data) {

            //TODO: none of these conditions make sense for verifying
            if(data === "verify-success"){
                $("#verify-error").hide();

                alert("Your account is ready! You will now be able to login.")
                window.location = "/login"
            }
            else if(data === "verify-expired"){
                $("#verify-error").text("Validation expired: you will have to signup again")
                $("#verify-button").hide()
                $("#verify-password").val("")
            }
            else if(data === "verify-error"){
                $("#verify-error").text("Verification Error: you may have to signup again")
                $("#verify-button").hide()
                $("#verify-password").val("")
            }
            else{
                alert("Unexpected response error\n\nThe wizard isn't happy about this either\n     (∩｀╭╮´)⊃━☆ﾟ.*･｡ﾟ")
            }
        },
        error: function(xhr, desc, err) {
            alert('No response from server >:( ')
        },
        complete: function(){
            $("#verify-loading").hide();
        }
    }); // end ajax call
}
