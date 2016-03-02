$(document).ready(function() {
    var focusElement

    //TODO: change "#addpad-title" to ".addpad #title"
    $('.addpad #title').click(function(e){
        $(this).blur()
        if(typeof(focusElement) === 'undefined'){ return; }
        focusElement.after("<p contenteditable='true' class='title'> title </p>").next("p").focus()
    });

    $('.addpad #text').click(function(e){
        $(this).blur()
        if(typeof(focusElement) === 'undefined'){ return; }
        focusElement.after("<p contenteditable='true'> text </p>").next("p").focus()
    });

    $('.addpad #image').click(function(e){
        $(this).blur()
        if(typeof(focusElement) === 'undefined'){ return; }
        focusElement.after("<img contenteditable='true' style='width: 100%; min-width: 100%;' src='https://picjumbo.imgix.net/HNCK0852.jpg?q=40&w=1650&sharp=30' alt='Image, pls'> </img>").next("img").focus()

    });

    /*Whenever the user clicks, figure out what they clicked. If it was a blog content element,
    save a reference. If not refocus on the last seleted blog element. This way the user can
    keep adding elements to the page, and instead of focusing on the add button they click,
    it will stay focused on the element they selected to add elments after.*/
    $('html').click(function(){
        temp = $('p[contenteditable=true]:focus, img[contenteditable=true]:focus')

        if(typeof(temp) !== 'undefined' && temp.length == 1){
            focusElement = temp
        }
        //else if(typeof(focusElement) !== 'undefined'){
        //    focusElement.focus()
        //}

    });
});
