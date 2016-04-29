var _callback;
var _target;

$(document).ready(function() {
    var inputboxFocusElement = null


    //TODO: do I need this?
    $('body').click(function() {
        temp = $('p[contenteditable=true]:focus')

        if (typeof(temp) !== 'undefined' && temp.length == 1) {
            inputboxFocusElement = temp
        } else {
            inputboxFocusElement = null
        }
    });



    $("#modalinput #wrapper #close").click(function() {
        $("#waiting-for-modal").contents().unwrap()

        console.log("meow")
        $("#modalinput").css("opacity", 0)
        $("#modalinput").css("pointer-events", "none")
        $(this).blur()
    });
    $("#modalinput #wrapper #ok").click(function() {
        //if(inputboxFocusElement === null){return;}
        $("#modalinput").css("opacity", 0)
        $("#modalinput").css("pointer-events", "none")
        $(this).blur()

        if ($("#modalinput #wrapper #input").val() != "") {

            if($("#waiting-for-modal").is("span")){
                $("#waiting-for-modal").attr("href", $("#modalinput #wrapper #input").val())
            }
            else if($("#waiting-for-modal").is("img")){
                $("#waiting-for-modal").attr("src", $("#modalinput #wrapper #input").val())
            }




            $("#waiting-for-modal").attr("id", "")
            $("#modalinput #wrapper #input").val("")
        } else {
            $("#waiting-for-modal").contents().unwrap()
        }

    });

});
function modalSetTextLink(){
    linkText("#", "waiting-for-modal")
    ShowModal("Set link")
}

function modalSetImgLink(targetImg){
    targetImg.attr("id", "waiting-for-modal")
    ShowModal("Set image link")
}

function ShowModal(modalTitle){
    $("#modalinput").css("opacity", 1)
    $("#modalinput").css("pointer-events", "auto")
    $("#modalinput #wrapper #input").focus()

    $("#modalinput #wrapper #title").html(modalTitle)
}
