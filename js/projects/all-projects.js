$(document).ready(function(){
    load_projects()

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
//===== LOAD PROJECTS ----------------------------------------------------------
//=====
function load_projects(){
    $.ajax({
        url: '/ajax_api',
        type: "GET",
        data: {
            "function": "load-projects",
            "username": "dd_dow",
            "amount": 12,
            "start": 1
        },
        success: function(data) {
            //alert(data)
            $("#insert-test").after(build_project_card("name","img_link","modified"))
            //TODO: parse json
            //var obj = jQuery.parseJSON( '{ "name": "John" }' );////////////////////////////////////////
            //alert( obj.name === "John" );

            //$("#insert-test").after(data)

            if(data === "create-project-success"){
                window.location = "/projects/edit-project"
            }
            else{
                //alert("Unexpect response error\n\nThe wizard isn't happy about this either\n     (∩｀╭╮´)⊃━☆ﾟ.*･｡ﾟ")
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
            //alert(data)

            if(data === "create-project-success"){
                window.location = "/projects/edit-project"
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
