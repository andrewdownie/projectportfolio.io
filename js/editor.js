$(document).ready(function(){
    /*Toggle pads when not in xs mode*/
    $("#editor-tools").click(function(){
        //LinkToggle($("#editor-tools i"), "fa fa-folder", "fa fa-folder-open", $("#editor-pads"))
        ToggleElements($("#editor-tools i"), "fa fa-folder", "fa fa-folder-open", $("#addpad"), $("#stylepad"), $("#blogpad") )
    });

    /*Toggle pads when in xs mode*/
    $("#minimize-pads").click(function() {
        var visible = ToggleElements($("#minimize-pads i"), "fa fa-plus-square-o", "fa fa-minus-square-o", $("#addpad table"), $("#stylepad #content"), $("#blogpad table") )
        if(visible){
            $(".editortools-topspace").css("padding-top", "85px")
        }
        else{
            $(".editortools-topspace").css("padding-top", "20px")
        }
    });


    //Keep track of the current bootstrap screen size, and if the screen size changes, toggle our pads to be shown
    var inXsMode
    if($(this).width() < 768){//initialize inXsMode
        inXsMode = true
    }else{
        inXsMode = false
    }

    window.onresize = function(){
        if($(this).width() < 768 && inXsMode == false){
            //this code will be run when entering xs mode
            WindowSizeChanged()
            $(".editortools-topspace").css("padding-top", "85px")
            inXsMode = true
        }
        else if($(this).width() >= 768 && inXsMode == true){
            //this code will be run when leaving xs mode
            WindowSizeChanged()
            $(".editortools-topspace").css("padding-top", "20px")
            inXsMode = false
        }
    };
    function WindowSizeChanged(){
        ShowElements($("#editor-tools i"), "fa fa-folder-open", $("#addpad"), $("#stylepad"), $("#blogpad") )
        ShowElements($("#minimize-pads i"), "fa fa-minus-square-o", $("#addpad table"), $("#stylepad #content"), $("#blogpad table") )
    }

});
