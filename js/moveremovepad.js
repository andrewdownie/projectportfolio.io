//TODO: do I need this file? why is there two of them?
$(document).ready(function() {
    var selectedBlogElement
    //alert('pls')

    $("body").on("click", function(e){
        //alert('wat')
        var target = $(e.target)

        if(IsInPad(target)){
            //alert('in da pad')
            return
        }

        if(target.is("[contenteditable='true']") == false && mrmp_isUpOrDown(target) == false){
            $(".moveremovepad").hide()
        }
        else{
            //selectedBlogElement = target
        }
    });
    $("body").on("click", "p, img", function(e){
            //alert('wat2')
        selectedBlogElement = $(e.target)
        move_moveremovepad(selectedBlogElement)
    });

    $(".moveremovepad #up").click(function(){
        //alert('fart')
        selectedBlogElement.prev().before(selectedBlogElement)
        move_moveremovepad(selectedBlogElement)
    });
    $(".moveremovepad #down").click(function(){
        selectedBlogElement.next().after(selectedBlogElement)
        move_moveremovepad(selectedBlogElement)
    });
    $(".moveremovepad #delete").click(function(e){
        if(selectedBlogElement.is("#blog-title") == false){
            selectedBlogElement.remove()
        }
        else{
            move_moveremovepad(selectedBlogElement)
        }
    });
    /*$('.addpad #title, .addpad #text, .addpad #image').click(function(e){
        move_moveremovepad($(":focus"))
    });*/
});

function move_moveremovepad(targetElement){
    var offset = targetElement.offset()
    var width = targetElement.width()

    $(".moveremovepad").css("top", offset.top - 5)
    $(".moveremovepad").css("left", offset.left + width - 55)
    $(".moveremovepad").show()

    if($(targetElement).is("#blog-title")){
        $(".moveremovepad #delete i").hide()
        $(".moveremovepad #delete-unavailable i").show()
    }
    else{
        $(".moveremovepad #delete i").show()
        $(".moveremovepad #delete-unavailable i").hide()
    }
}

function mrmp_isUpOrDown(target){
    if((target).is(".moveremovepad #up i")){
        return true;
    }
    else if(target.is(".moveremovepad #down i")){
        return true;
    }
    else if(target.is(".moveremovepad #delete-unavailable i")){
        return true;
    }
    return false;
}
