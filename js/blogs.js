$(document).ready(function(){
    $("#blogs #create-new").click(function(){
        window.location = "/editor";
    });

    $("#blogs #back-to-project").click(function(){
        window.location = "/projects/edit-project";
    });

    $("#blogs .editButton").click(function(){
        window.location = "/editor"
    });
});
