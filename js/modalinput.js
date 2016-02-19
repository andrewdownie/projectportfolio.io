var _callback, _target

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
        _callback("cancelled", "", null)
    });
    $("#modalinput #wrapper #ok").click(function() {
        //if(inputboxFocusElement === null){return;}
        $("#modalinput").css("opacity", 0)
        $("#modalinput").css("pointer-events", "none")
        $(this).blur()
    });

    $("#modalinput #wrapper #ok").click(function(){
        linkGivenText("taco", _target)//#3 this does not work...

        if($("#modalinput #wrapper #input").val() != ""){
            _callback("normal", $("#modalinput #wrapper #input").val(), _target)
            $("#modalinput #wrapper #input").val("")
        }
        else{
            _callback("cancelled", "", null)
        }


    });

});

//__PARAMETERS:
//modalTitle: the text that appears in the title bar of the modal
//callback(status, value): function that is called upon the modalinput being dismissed
//----status: the status of the getModalInput: returns "normal" if value retrieved, or "cancelled" otherwise
//----value: the actual value retrieved from the modal, will be an empty string if the modal was cancelled
//target: an optional target that will be given to the callback function
function getModalInput(modalTitle, callback, target){
    //linkGivenText("taco", target)//#2 this works...

    $("#modalinput").css("opacity", 1)
    $("#modalinput").css("pointer-events", "auto")
    $("#modalinput #wrapper #input").focus()

    $("#modalinput #wrapper #title").html(modalTitle)

    window._callback = callback
    window._target = target
}
