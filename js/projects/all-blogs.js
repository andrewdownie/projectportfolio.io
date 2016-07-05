$(document).ready(function(){
    setPageTitle()
});

//=====
//===== SET THE TITLE OF THE PAGE
//=====
function setPageTitle(){
    var urlPieces = get_resource_name().split("/")

    $("#all-blogs #project-name").text(urlPieces[6])
}
