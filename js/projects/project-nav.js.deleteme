$(document).ready(function(){
    project_set_myprojects_href()
    project_nav_setup()

});

function project_set_myprojects_href(){
    var username = read_cookie("LOGGED_IN")

    if(username == null){
        $("#project-nav #my-projects").hide()
    }else{
        $("#project-nav #my-projects a").attr('href','/user/'+username+'/projects')
    }

}

function project_nav_setup(){
    var resourceName = get_resource_name()
    var urlParts = resourceName.split("/")

    if(urlParts[3] == "projects"){
        pnav_projects_url(urlParts[4])
    }
    else if(urlParts[3] == "user"){
        pnav_username_url(urlParts[4])
    }
}

function pnav_projects_url(mostActiveOrRecent){
    if(mostActiveOrRecent === "most-active"){
        $("#project-nav #most-active").addClass("active")
    }
    else if(mostActiveOrRecent === "recent"){
        $("#project-nav #recent").addClass("active")
    }
}

function pnav_username_url(username){
    var logged_in_user = read_cookie("LOGGED_IN")

    if(logged_in_user != null && logged_in_user == username){
        $("#project-nav #my-projects").addClass("active")
    }
    else{
        $("#project-nav #users-projects").show()
        $("#project-nav #username").text(username)
    }
}
