<?php // the php tag is just here for syntax highlighting
//=====
//===== An ajax request looks like this ----------------------------------------
//=====
$(document).ready(function(){
    $("#login-button").click(function(){
        $.ajax({
            url: '/restful_api',//notice how the url does not have .php, even though it is going to a php file
            type: "POST",
            data: {
                "meow": "456", //send the value: '456', in the field: 'meow'
                "fart": "fromDaButt"
            },
            success: function(data, status) {
                //    alert('poo to the moon (and back)')
                alert("Data: (" + data + ")")

                if(data == "ok") {
                    alert('data ok')
                    $('#followbtncontainer').html('<p><em>Following!</em></p>');
                    var numfollowers = parseInt($('#followercnt').html()) + 1;
                    $('#followercnt').html(numfollowers);
                }
            },
            error: function(xhr, desc, err) {
                alert('no poo for u')
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        }); // end ajax call



    });
});
?>
//=====
//===== The PHP handling code looks like this ----------------------------------
//=====
//notice that ajax requests in php are handled by calling the entire php file with the url of the request.
//so to choose a function to run, you still need an if statment outside of any function, and then call
//the correct function from that if statement.
<?php
if($_POST['meow'] == "123"){
    echo "first option";
}
else if($_POST['meow'] === "456"){ //in this example 'meow' is sent with a value '456'
    echo "second option";
}
else{
    echo "You didn't send: '123' or '456' in the field: 'meow'";
}
?>
