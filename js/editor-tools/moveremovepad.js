var selectedBlogElement

$(document).ready(function() {



    $("body").click(function(e){
        var target = $(e.target)
        if(IsInPad(target)){
            return
        }

        if(target.is("p") || target.is("img")){
            selectedBlogElement = $(e.target)
            move_moveremovepad(selectedBlogElement)
        }

        if(target.is("[contenteditable='true']") == false && mrmp_isUpOrDown(target) == false){
            if(IsEditableParagraph(target) == false){
                $("#moveremovepad").hide()
            }

        }
        else{
            //selectedBlogElement = target
        }
    });
    /*$("body").on("click", "p, img", function(e){
        selectedBlogElement = $(e.target)
        move_moveremovepad(selectedBlogElement)
    });*/

    $("#moveremovepad #up").click(function(){
        selectedBlogElement.prev().before(selectedBlogElement)
        move_moveremovepad(selectedBlogElement)
    });
    $("#moveremovepad #down").click(function(){
        selectedBlogElement.next().after(selectedBlogElement)
        move_moveremovepad(selectedBlogElement)
    });
    $("#moveremovepad #delete").click(function(e){
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
    var editableTarget = GetNearestEditable(targetElement)
    selectedBlogElement = targetElement


    var offset = editableTarget.offset()
    var width = editableTarget.width()

    $("#moveremovepad").css("top", offset.top - 5)
    $("#moveremovepad").css("left", offset.left + width - 55)
    $("#moveremovepad").show()

    if($(editableTarget).is("#blog-title")){
        $("#moveremovepad #delete i").hide()
        $("#moveremovepad #delete-unavailable i").show()
    }
    else{
        $("#moveremovepad #delete i").show()
        $("#moveremovepad #delete-unavailable i").hide()
    }
}

function mrmp_isUpOrDown(target){
    if((target).is("#moveremovepad #up i")){
        return true;
    }
    else if(target.is("#moveremovepad #down i")){
        return true;
    }
    else if(target.is("#moveremovepad #delete-unavailable i")){
        return true;
    }
    return false;
}
