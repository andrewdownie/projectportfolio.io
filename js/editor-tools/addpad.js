$(document).ready(function() {
    var focusElement

    //TODO: change "#addpad-title" to "#addpad #title"
    $('#addpad #title').mousedown(function(e){
        $(this).blur()
        if(typeof(focusElement) === 'undefined'){ return; }
        focusElement.after("<p contenteditable='true' class='title'> title </p>").next("p").focus()
        return false;
    });

    $('#addpad #text').mousedown(function(e){
        $(this).blur()
        if(typeof(focusElement) === 'undefined'){ return; }
        focusElement.after("<p contenteditable='true'> text </p>").next("p").focus()
        return false;
    });

    $('#addpad #image').mousedown(function(e){
        $(this).blur()
        if(typeof(focusElement) === 'undefined'){ return; }
        focusElement.after("<img contenteditable='true' style='width: 100%; min-width: 100%;' src='https://picjumbo.imgix.net/HNCK0852.jpg?q=40&w=1650&sharp=30' alt='Image, pls'> </img>").next("img").focus()

        return false;
    });

    $('body').on('mousedown', function(e){


        if($(e.target).is("img[contenteditable=true]")){
            focusElement = $(e.target)
            EnableAddpad()

        }
        else if($(e.target).is("p[contenteditable=true]")){
            focusElement = $(e.target)
            EnableAddpad()
        }
        else{
            focusElement = null
            DisableAddpad()
        }


    });

});
function EnableAddpad(){
    $("#addpad table tr#enabled").show()
    $("#addpad table tr#disabled").hide()
}
function DisableAddpad(){
    $("#addpad table tr#disabled").show()
    $("#addpad table tr#enabled").hide()
}
