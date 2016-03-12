$(document).ready(function() {
    var focusElement

    //TODO: change "#addpad-title" to "#addpad #title"
    $('#addpad #title').click(function(e){
        $(this).blur()
        if(typeof(focusElement) === 'undefined'){ return; }
        focusElement.after("<p contenteditable='true' class='title'> title </p>").next("p").focus()
    });

    $('#addpad #text').click(function(e){
        $(this).blur()
        if(typeof(focusElement) === 'undefined'){ return; }
        focusElement.after("<p contenteditable='true'> text </p>").next("p").focus()
    });

    $('#addpad #image').click(function(e){
        $(this).blur()
        if(typeof(focusElement) === 'undefined'){ return; }
        focusElement.after("<img contenteditable='true' style='width: 100%; min-width: 100%;' src='https://picjumbo.imgix.net/HNCK0852.jpg?q=40&w=1650&sharp=30' alt='Image, pls'> </img>").next("img").focus()

    });


    $('body').on('click', function(e){
        if($(e.target).is("img[contenteditable=true]")){
            focusElement = $(":focus")
            $("#addpad table tr#enabled").show()
            $("#addpad table tr#disabled").hide()

        }
        else if($(e.target).is("p[contenteditable=true]")){
            focusElement = $(":focus")
            $("#addpad table tr#enabled").show()
            $("#addpad table tr#disabled").hide()
        }
        else{
            focusElement = null
            $("#addpad table tr#disabled").show()
            $("#addpad table tr#enabled").hide()
        }


    });

});
