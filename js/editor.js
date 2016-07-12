$(document).ready(function(){
    /*Toggle pads when not in xs mode*/
    $("#editor-tools").click(function(){
        //LinkToggle($("#editor-tools i"), "fa fa-folder", "fa fa-folder-open", $("#editor-pads"))
        toggle_elements($("#editor-tools i"), "fa fa-folder", "fa fa-folder-open", $("#addpad"), $("#stylepad"), $("#blogpad") )
        $("#moveremovepad").hide()
    });

    /*Toggle pads when in xs mode*/
    $("#minimize-pads").click(function() {
        var visible = toggle_elements($("#minimize-pads i"), "fa fa-plus-square-o", "fa fa-minus-square-o", $("#addpad #content"), $("#stylepad #content"), $("#blogpad table") )
        if(visible){
            $(".editortools-topspace").css("padding-top", "90px")

        }
        else{
            $(".editortools-topspace").css("padding-top", "30px")
        }
        $("#moveremovepad").hide()

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
            $(".editortools-topspace").css("padding-top", "90px")
            inXsMode = true
        }
        else if($(this).width() >= 768 && inXsMode == true){
            //this code will be run when leaving xs mode
            WindowSizeChanged()
            $(".editortools-topspace").css("padding-top", "30px")
            inXsMode = false
        }
    };
    function WindowSizeChanged(){
        ShowElements($("#editor-tools i"), "fa fa-folder-open", $("#addpad"), $("#stylepad"), $("#blogpad") )
        ShowElements($("#minimize-pads i"), "fa fa-minus-square-o", $("#addpad #content"), $("#stylepad #content"), $("#blogpad table") )
    }

});
