$(document).ready(function(){
    if(read_cookie("LOGGED_IN") !== "True"){
        $("#browse-projects #create-new").hide()
        $("#browse-projects .editButton").hide()
    }

    $("#create-new").click(function(){
        ajax_create_project();
    });
    $("button").click(function(){
        //window.location = "/projects/edit-project";
    });


});

//=====
//===== CREATE PROJECT AJAX CALL -----------------------------------------------
//=====
function ajax_create_project(){
    $.ajax({
        url: '/ajax_api',
        type: "POST",
        data: {
            "function": "create-project"
        },
        success: function(data) {
            alert(data)

            if(data === "create-project-success"){
                //$("#signup-emails-dont-match").hide();
                //window.location = "/verification"
                alert("created a project")
            }
            else{
                alert("Unexpect response error\n\nThe wizard isn't happy about this either\n     (∩｀╭╮´)⊃━☆ﾟ.*･｡ﾟ")
            }
        },
        error: function(xhr, desc, err) {
            alert('No response from server >:( ')
        },
        complete: function(){

        }
    });
}
