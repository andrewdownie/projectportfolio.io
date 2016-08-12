$(document).ready(function() {
    var focusElement
    DisableAddpad()

    $('#addpad #title').mousedown(function(e){
        $(this).blur()
        if(typeof(focusElement) === 'undefined'){ return; }
        focusElement = GetNearestEditable(focusElement).after("<p contenteditable='true' class='title'> title  </p>").next("p").focus()
        move_moveremovepad(focusElement)

        $("#stylepad #setImage-disabled").show()
        $("#stylepad #setImage").hide()
        $("#stylepad .show-styling").show()
        $("#stylepad .hide-styling").hide()
        return false;
    });

    $('#addpad #text').mousedown(function(e){
        $(this).blur()
        if(typeof(focusElement) === 'undefined'){ return; }
        focusElement = GetNearestEditable(focusElement).after("<p contenteditable='true' class='text'> text </p>").next("p").focus()
        move_moveremovepad(focusElement)

        $("#stylepad #setImage-disabled").show()
        $("#stylepad #setImage").hide()
        $("#stylepad .show-styling").show()
        $("#stylepad .hide-styling").hide()
        return false;
    });

    $('#addpad #image').mousedown(function(e){
        $(this).blur()
        if(typeof(focusElement) === 'undefined'){ return; }
        focusElement = GetNearestEditable(focusElement).after("<img contenteditable='true' style='width: 100%; min-width: 100%;' src='https://picjumbo.imgix.net/HNCK0852.jpg?q=40&w=1650&sharp=30' alt='Image, pls'> </img>").next("img").focus()
        move_moveremovepad(focusElement)

        //set the active style button to be the button relevant to when an image is selected
        $("#stylepad #setImage-disabled").hide()
        $("#stylepad #setImage").show()
        $("#stylepad .show-styling").hide()
        $("#stylepad .hide-styling").show()
        return false;
    });

    $('body').on('mousedown', function(e){

        if($(e.target).is("img[contenteditable=true]")){
            focusElement = $(e.target)
            EnableAddpad()

        }
        else if(IsEditableParagraph( $(e.target) )){
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
    $("#addpad #clickable").show()
    $("#addpad #unclickable").hide()
}
function DisableAddpad(){
    $("#addpad #unclickable").show()
    $("#addpad #clickable").hide()
}
