$(document).ready(function(){

    $("#verify #verify-button").click(function(){
        ajaxcall_verify()
    });


});



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
            "password": $("#verify-password").val()
        },
        success: function(data) {
            alert(data)

            //TODO: none of these conditions make sense for verifying
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
            $("#verify-loading").hide();
        }
    }); // end ajax call
}
