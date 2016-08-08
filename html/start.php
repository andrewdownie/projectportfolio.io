<!-- PAGE SPECIFIC INFO -->
<title>Start</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">

<script src="js/lib/jquery-2.2.0.min.js"></script>
<script>
$(document).ready(function(){
    $("#start-btn").click(function(){
        start();
   });
});

function start(){
    $.ajax({
        url: "/util/start.php",
        type: "POST",
        date: "",
        success: function(data){
            alert(data);
        },
        error: function(data){
            alert('start failure');
        },
        complete: function(data){

        }
    });

}
</script>
</head>

<body>
    <!--<button id="start-btn">Start</button> -->
    <?php
       // $old_path = getcwd();
        chdir('/');
        exec('./start-se.sh', $output);

       

        if($output == ""){
            echo "Output was blank, something is wrong...";
        }
        else{
            $together = implode("", $output);
           // echo $together;
            
            $json = json_decode($together);
            $startingInstances = $json->StartingInstances[0];
            
            $currentState = $startingInstances->CurrentState->Name;
            $previousState = $startingInstances->PreviousState->Name;

            echo "Current state is: " . $currentState;
            echo "<br/>";
            echo "Previous state is: " . $previousState;
            
            echo "<br/><br/>*Note* pending = starting";

        }
        //chdir($old_path);



    ?>
</body>

</html>
