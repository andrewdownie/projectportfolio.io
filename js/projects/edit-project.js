$(document).ready(function(){
    $("#project #all-projects").click(function(){
        window.location = "/projects/all-projects"
    });

    $("#project #delete-project").click(function(){
        ajax_delete_project()
    });

    clearTextInputs()
    saveTextInputs()



});


//=====
//===== CLEAR TEXT INPUTS ------------------------------------------------------
//=====
function clearTextInputs(){
    $("#project #clear-name").click(function(){
        $("#text-name").val("")
        $("#text-name").focus()
    });

    $("#project #clear-image").click(function(){
        $("#text-image").val("")
        $("#text-image").focus()
    });

    $("#project #clear-spec").click(function(){
        $("#text-spec").val("")
        $("#text-spec").focus()
    });
}

//=====
//===== SAVE TEXT INPUTS -------------------------------------------------------
//=====
function saveTextInputs(){
    $("#project #save-name").click(function(){
        $("#project #save-name").blur()
        alert('save name')
    });

    $("#project #save-image").click(function(){
        $("#project #save-image").blur()
        alert('save image')
    });

    $("#project #save-spec").click(function(){
        $("#project #save-spec").blur()
        alert('save spec')
    });
}

//=====
//===== DELETE PROJECT AJAX CALL -----------------------------------------------
//=====
function ajax_delete_project(){
    var urlPieces = get_resource_name().split("/")
    var projectUrlName = ""
    if(urlPieces.length < 6){
        alert('invalid-url-name')
        return;
    }

    projectUrlName = urlPieces[6]
    $.ajax({
        url: '/ajax_api',
        type: "POST",
        data: {
            "function": "delete-project",
            "project_url_name": projectUrlName
        },
        success: function(data) {
            alert(data)
            window.location = "/user/" + urlPieces[4] + "/projects"
            return

            if(data === "delete-project-success"){
                //window.location = "/projects/edit-project"
            }
            else if("create-project-failure"){
                alert("create project failure")
            }
            else{
                alert("Unexpected response error\n\nThe wizard isn't happy about this either\n     (∩｀╭╮´)⊃━☆ﾟ.*･｡ﾟ")
            }
        },
        error: function(xhr, desc, err) {
            alert('No response from server >:( ')
        },
        complete: function(){

        }
    });
}
