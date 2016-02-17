$(document).ready(function() {
    var inputboxFocusElement = null

    //TODO: do I need this?
    $('body').click(function(){
        temp = $('p[contenteditable=true]:focus')

        if(typeof(temp) !== 'undefined' && temp.length == 1){
            inputboxFocusElement = temp
        }
        else{
            inputboxFocusElement = null
        }
    });



    $("#modalinput #wrapper #close").click(function() {
        //if(inputboxFocusElement === null){return;}
        $("#modalinput").css("opacity", 0)
        $("#modalinput").css("pointer-events", "none")
        $(this).blur()
    });
    $("#modalinput #wrapper #ok").click(function() {
        //if(inputboxFocusElement === null){return;}
        $("#modalinput").css("opacity", 0)
        $("#modalinput").css("pointer-events", "none")
        $(this).blur()
    });
    $("#modalinput #wrapper #cancel").click(function() {
        //if(inputboxFocusElement === null){return;}
        $("#modalinput").css("opacity", 0)
        $("#modalinput").css("pointer-events", "none")
        $(this).blur()
    });

});

function getModalInput(callback, text){
    $("#modalinput").css("opacity", 1)
    $("#modalinput").css("pointer-events", "auto")
    $("#modalinput #wrapper #input").focus()

    $("#modalinput #wrapper #close").click(function(){
        alert ("mow")
        callback(String(text))
    });

}
