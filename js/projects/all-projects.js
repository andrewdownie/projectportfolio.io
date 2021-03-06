//TODO:
//get the user name from the url, and then put that name onto the page as the title
$(document).ready(function(){
    load_projects();

    var username = get_username();
    
    $("#all-projects #projects-owner").text(username);

    if(username === false){
        alert("did the url get mangled? ...the url got mangled didn't it"); 
    }

    $("#create-new").click(function(){
        ajax_create_project();
    });

    $("#all-projects").on("click", ".project-thumbnail", function(){
        var project_url_name = $(this).find(".url_name").text();
        window.location.href = "/user/" + username + "/projects/" + project_url_name.trim();
        return false;
    });

    $("#all-projects").on("click", ".editButton", function(){
        var project_url_name = $(this).parent().find(".url_name").text();


        window.location.href = "/user/" + username + "/projects/" + project_url_name.trim() + "/edit";


        return false;
    });

    $("#all-projects #view-user-profile").click(function(){
       window.location.href = "/user/" + username; 

    });

});




//=====
//===== SHOW HIDE EDIT CREATE --------------------------------------------------
//=====
function show_hide_edit_create(){
    var logged_in_user = read_cookie("LOGGED_IN");
    var usernameFromURL = get_username();

    if(logged_in_user !== null){
        if(usernameFromURL == logged_in_user){
            $("#all-projects #create-new").show();
            $("#all-projects .editButton").show();
        }
    }

}

//=====
//===== LOAD PROJECTS ----------------------------------------------------------
//=====
function load_projects(){
    $("#all-projects #loading-projects").show();
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
            $("#all-projects #loading-projects").hide(400);


            if(data === "load-projects-failure"){
                alert("Failed to load projects");
            }
            else if(data === "no-projects"){
                $("#project-cards-row").after("<h2>&nbsp;&nbsp;You don't have any projects.</h2>");
            }
            else{
                var json = jQuery.parseJSON( data );
                addProjects(json);

            }
        },
        error: function(xhr, desc, err) {
            alert('No response from server >:( ');
        },
        complete: function(){
            show_hide_edit_create();
        }
    });
}

function addProjects(parsedJSON){
    for(i = 0; i < parsedJSON.length; i++){
        if(parsedJSON[i] === null){
            continue;
        }
        $("#project-cards-row").after(build_project_card(parsedJSON[i].name, parsedJSON[i].url_name, parsedJSON[i].img_link, parsedJSON[i].created));
    }
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
            //alert(data)]
            var json = jQuery.parseJSON( data );

            if(json.result === "create-project-success"){
                window.location = "projects/" + json.project_url_name + "/edit";
            }
            else if(json.result === "create-project-failure"){
                alert("create project failure");
            }
            else{
                alert("Unexpected response error\n\nThe wizard isn't happy about this either\n     (∩｀╭╮´)⊃━☆ﾟ.*･｡ﾟ");
            }
        },
        error: function(xhr, desc, err) {
            alert('No response from server >:( ');
        },
        complete: function(){

        }
    });
}
