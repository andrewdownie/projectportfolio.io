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



    $(".modalinput #close").click(function() {
        //if(inputboxFocusElement === null){return;}
        $(".modalinput").hide()
        $(this).blur()
    });
    $(".modalinput #ok").click(function() {
        //if(inputboxFocusElement === null){return;}
        $(".modalinput").hide()
        $(this).blur()
    });
    $(".modalinput #cancel").click(function() {
        //if(inputboxFocusElement === null){return;}
        $(".modalinput").hide()
        $(this).blur()
    });

});

function getModalInput(callback, text){
    $(".modalinput").show()

    $(".modalinput #close").click(function(){
        alert ("mow")
        callback(String(text))
    });

}
