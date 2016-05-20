$(document).ready(function(){
    $("#login-button").click(function(){
        ajaxcall_login();
    });


    //check if emails match

    $("#signup-button").click(function(){
        ajaxcall_signup();
    });


});

//=====
//===== ajaxcall_login ---------------------------------------------------------
//=====
function ajaxcall_login(){
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
            alert(data)
            if(data === "login-success"){
                $("#login-invalid-email-password").hide();
                window.location = "/index"
            }
            else if(data === "login-invalid"){
                $("#login-invalid-email-password").show();
            }
            else{
                alert("Something went wrong\n\nThe wizard isn't happy about this either\n     (∩｀╭╮´)⊃━☆ﾟ.*･｡ﾟ")
            }
        },
        error: function(xhr, desc, err) {
            alert('No response from server :( ')
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
    $("#signup-loading").show();

    $.ajax({
        url: '/ajax_api',
        type: "POST",
        data: {
            "function": "signup",
            "email": $("#login-email").val(),
            "password": $("#login-password").val()
        },
        success: function(data) {
            alert(data)
            if(data === "login-success"){
                $("#login-invalid-email-password").hide();
                window.location = "/index"
            }
            else if(data === "login-invalid"){
                $("#login-invalid-email-password").show();
            }
            else{
                alert("Something went wrong\n\nThe wizard isn't happy about this either\n     (∩｀╭╮´)⊃━☆ﾟ.*･｡ﾟ")
            }
        },
        error: function(xhr, desc, err) {
            alert('No response from server :( ')
        },
        complete: function(){
            $("#signup-loading").hide();
        }
    }); // end ajax call
}
