$(document).ready(function(){
    load_project_ajax()

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
//===== NOT OWNER --------------------------------------------------------------
//=====
function notOwner(){//actually put this into the functions folder, and reuse it
    //check if the person browsing this page is the owner,
    //if not redirect them to the page they came from
}

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
        save_field_info("name")
    });

    $("#edit-project #save-image").click(function(){
        $("#edit-project #save-image").blur()
        save_field_info("image")
    });

    $("#edit-project #save-spec").click(function(){
        $("#edit-project #save-spec").blur()
        save_field_info("spec")
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
            //alert(data)
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
//===== LOAD PROJECT AJAX ------------------------------------------------------
//=====
function load_project_ajax(){
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

            var json = jQuery.parseJSON( data )[0]

            if(data == "project-not-found"){
                alert("project not found... :(")
            }
            else{
                add_project_to_page(json)
                load_project_counts_ajax(json.project)
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
//===== LOAD PROJECT COUNTS AJAX ------------------------------------------------------
//=====
function load_project_counts_ajax(project){
    //alert(project)

    $("#all-projects #loading-projects").show()
    $.ajax({
        url: '/ajax_api',
        type: "GET",
        data: {
            "function": "load-project-counts",
            "project_id": project
        },
        success: function(data) {
            //alert(data)

            var json = jQuery.parseJSON( data )

            if(data == "project-not-found"){
                alert("project not found... :(")
            }
            else{
                add_project_counts_to_page(json)
            }
        },
        error: function(xhr, desc, err) {
            alert('No response from server >:( ')
        },
        complete: function(){
            $("#edit-project #member-loading").hide()
        }
    });
}


//=====
//===== SAVE FIELD INFO --------------------------------------------------------
//=====
function save_field_info(fieldToSave){
    var resourceName = get_resource_name()
    var urlParts = resourceName.split("/")

    $("#all-projects #loading-projects").show()
    $.ajax({
        url: '/ajax_api',
        type: "POST",
        data: {
            "function": "save-project-" + fieldToSave,
            "project_id": parseInt($("#edit-project #project-id").text()),
            "new_value": $("#edit-project #text-" + fieldToSave).val()
        },
        success: function(data) {
            alert(data)
            var json = jQuery.parseJSON(data)

            if(json.result == "save-project-success"){
                if(json.url_name != ""){
                    window.location = "/user/" + urlParts[4] + "/projects/" + json.url_name + "/edit"
                }
            }
            else if(json.result == "save-project-failure"){
                alert("save-project-failure")
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
function add_project_to_page(json){

    $("#edit-project #project-name").text(json.name)
    $("#edit-project #text-name").val(json.name)
    $("#edit-project #text-image").val(json.img_link)
    $("#edit-project #project-img").attr("src", json.img_link)
    $("#edit-project #text-spec").val(json.spec_link)

    $("#edit-project #project-id").text(json.project)

    $("#edit-project #modified").text("Modified: " + time_stampify(json.modified))
    $("#edit-project #created").text("Created: " + time_stampify(json.created))
}


//=====
//===== ADD PROJECT COUNTS TO --------------------------------------------------
//=====
function add_project_counts_to_page(json){

    $("#edit-project #member-count").text(json.member_count)
    $("#edit-project #blog-count").text(json.blog_count)
    $("#edit-project #build-count").text(json.build_count)
    $("#edit-project #goal-count").text(json.goal_count)

    $("#edit-project .loading-counts").hide()
}
