$(document).ready(function(){
    load_projects()

    $("#create-new").click(function(){
        ajax_create_project()
    });

    $("#all-projects #project-cards-row").on("click", ".thumbnail", function(){
        alert('ma butt')
        //window.location = "/projects/edit-project";
    });



});

function show_hide_edit_create(){
    var logged_in_user = read_cookie("LOGGED_IN")
    var resourceName = get_resource_name()
    var urlParts = resourceName.split("/")

    if(logged_in_user != null){
        if(urlParts[3] == "user" && urlParts[4] == logged_in_user){
            $("#all-projects #create-new").show()
            $("#all-projects .editButton").show()
        }
    }

}

//=====
//===== LOAD PROJECTS ----------------------------------------------------------
//=====
function load_projects(){
    $("#all-projects #loading-projects").show()
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
            $("#all-projects #loading-projects").hide()

            var obj = jQuery.parseJSON( data );
            for(i = 0; i < obj.length; i++){
                if(obj[i] == null){
                    continue
                }
                $("#project-cards-row").after(build_project_card(obj[i].name, obj[i].img_link, obj[i].created))
            }


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
            show_hide_edit_create()
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
