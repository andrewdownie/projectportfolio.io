var _callback

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
        _callback("cancelled", "")
    });
    $("#modalinput #wrapper #ok").click(function() {
        //if(inputboxFocusElement === null){return;}
        $("#modalinput").css("opacity", 0)
        $("#modalinput").css("pointer-events", "none")
        $(this).blur()
    });

    $("#modalinput #wrapper #ok").click(function(){
        _callback("normal", $("#modalinput #wrapper #input").val())
    });

});

//__PARAMETERS:
//callback(status, value): function that is called upon the modalinput being dismissed
//----status: the status of the getModalInput: returns "normal" if value retrieved, or "cancelled" otherwise
//----value: the actual value retrieved from the modal, will be an empty string if the modal was cancelled
function getModalInput(callback){
    $("#modalinput").css("opacity", 1)
    $("#modalinput").css("pointer-events", "auto")
    $("#modalinput #wrapper #input").focus()

    _callback = callback
}
