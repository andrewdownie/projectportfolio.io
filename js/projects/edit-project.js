$(document).ready(function(){
    load_project()

    $("#edit-project #all-projects").click(function(){
        var urlPieces = get_resource_name().split("/")
        window.location = "/user/" + urlPieces[4] + "/projects"
    });

    $("#edit-project #delete-project").click(function(){
        ajax_delete_project()
    });

    clearTextInputs()
    saveTextInputs()



});


//=====
//===== CLEAR TEXT INPUTS ------------------------------------------------------
//=====
function clearTextInputs(){
    $("#edit-project #clear-name").click(function(){
        $("#text-name").val("")
        $("#text-name").focus()
    });

    $("#edit-project #clear-image").click(function(){
        $("#text-image").val("")
        $("#text-image").focus()
    });

    $("#edit-project #clear-spec").click(function(){
        $("#text-spec").val("")
        $("#text-spec").focus()
    });
}

//=====
//===== SAVE TEXT INPUTS -------------------------------------------------------
//=====
function saveTextInputs(){
    $("#edit-project #save-name").click(function(){
        $("#edit-project #save-name").blur()
        alert('save name')
    });

    $("#edit-project #save-image").click(function(){
        $("#edit-project #save-image").blur()
        alert('save image')
    });

    $("#edit-project #save-spec").click(function(){
        $("#edit-project #save-spec").blur()
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


//=====
//===== LOAD PROJECT -----------------------------------------------------------
//=====
function load_project(){
    var resourceName = get_resource_name()
    var urlParts = resourceName.split("/")

    $("#all-projects #loading-projects").show()
    $.ajax({
        url: '/ajax_api',
        type: "GET",
        data: {
            "function": "load-project",
            "username": urlParts[4],
            "projectname": urlParts[6],
            "amount": 12,
            "start": 1
        },
        success: function(data) {
            //alert(data)

            if(data == "project-not-found"){
                alert("project not found... :(")
            }
            else{
                add_project_to_page(data)
            }
        },
        error: function(xhr, desc, err) {
            alert('No response from server >:( ')
        },
        complete: function(){

        }
    });
}



//=====
//===== ADD PROJECT TO PAGE ----------------------------------------------------
//=====
function add_project_to_page(data){
    var json = jQuery.parseJSON( data )[0]

    $("#edit-project #project-name").text(json.name)
    $("#edit-project #text-name").val(json.name)
    $("#edit-project #text-image").val(json.img_link)
    $("#edit-project #text-spec").val(json.spec_link)

    $("#edit-project #modified").text(json.modified)
    $("#edit-project #created").text(json.created)
}
