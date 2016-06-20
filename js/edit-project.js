$(document).ready(function(){
    $("#project #all-projects").click(function(){
        window.location = "/projects/browse-projects"
    });


    ///
    /// CLEAR TEXT INPUTS
    ///
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


    ///
    /// SAVE TEXT INPUTS
    ///
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
});
