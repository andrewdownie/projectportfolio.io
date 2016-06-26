$(document).ready(function(){
    setMyProjectsLinkHref()

    hightlightCurrentProjectTab()
});

function setMyProjectsLinkHref(){
    var username = read_cookie("LOGGED_IN")
    $("#project-nav #my-projects a").attr('href','/user/'+username+'/projects')
}


function hightlightCurrentProjectTab(){
    var resourceName = get_resource_name()
    var urlParts = resourceName.split("/")
    var pathPiece1 = urlParts[3]
    var pathPiece2 = urlParts[4]

    if(pathPiece1 === "projects"){
        if(pathPiece2 === "most-active"){
            $("#project-nav #most-active").addClass("active")
        }
        else if(pathPiece2 === "recent"){
            $("#project-nav #recent").addClass("active")
        }
    }
    else if(pathPiece1 === "user"){
        $("#project-nav #my-projects").addClass("active")
    }
}
