$(document).ready(function(){
    validate_verify_inputs();

    $("#verify-username, #verify-password").on('input',function(e){
        validate_verify_inputs()
    });

    $("#verify-username, #verify-password").keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            if(validate_verify_inputs() === true){
                ajaxcall_verify();
            }
        }
    });

    $("#verify #verify-button").click(function(){
        $("#verify #verify-button").blur()
        if(validate_verify_inputs() === true){
            ajaxcall_verify();
        }
    });

});


//=====
//===== VALIDATE VERIFY INPUTS -------------------------------------------------
//=====
function validate_verify_inputs(){

    if( $("#verify-username").val().length > 0){
        var valUsername = validUsername($("#verify-username").val())
        if(valUsername !== true){
            $("#verify-error").text(valUsername)
            $("#verify-button").hide()
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

    var valPass = validPassword($("#verify-password").val())
    if($("#verify-username").val().length > 0 && valPass !== true){
        $("#verify-error").text(valPass)
        $("#verify-button").hide()
        return false
    }

    if( $("#verify-username").val().length == 0 || $("#verify-password").val().length == 0){
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
            alert(data)

            //TODO: none of these conditions make sense for verifying
            if(data === "verify-success"){
                $("#verify-error").hide();
                window.location = "/login?verify=success"
            }
            else if(data === "verify-expired"){
                window.location = "/login?verify=expired"
            }
            else if(data === "verify-error"){
                window.location = "/login?verify=failure"
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
