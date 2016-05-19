$(document).ready(function(){
    $("#navbar-logout").click(function(){
        $.ajax({
            url: '/ajax_api',
            type: "POST",
            data: {
                "function": "logout"
            },
            success: function(data) {
                if(data === "logout-success"){
                    window.location = "index"
                }
                else{
                    alert("Something went wrong\n\nThe wizard isn't happy about this either\n     (∩｀╭╮´)⊃━☆ﾟ.*･｡ﾟ")
                }
            },
            error: function(xhr, desc, err) {
                alert('There was an error :( ')
            }
        }); // end ajax call
    });
});
