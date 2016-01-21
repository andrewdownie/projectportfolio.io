<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <script src="/js/lib/jquery-2.2.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $("button").click(function(){
                alert("meow")
            });
            $("a").click(function() {
                alert("you clicked a link")
            });
        });
    </script>
</head>
<body>
    <?php include '/var/www/navbar/navbar.php';?>
    <button type="button">This is a button</button><br/>
    <a href="#">this is a link</a><br/>

    <?php $a = date('l jS \of F Y h:i:s A') ?>

    <?php
    print "Today is: $a";
    print "<br/>";
    print "The above date was added to the page using php.";
    ?>
    |<br/>|<br/>|<br/>|<br/>|<br/>|<br/>|<br/>|<br/>|<br/>|<br/>
    |<br/>|<br/>|<br/>|<br/>|<br/>|<br/>|<br/>|<br/>|<br/>|<br/>
    |<br/>|<br/>|<br/>|<br/>|<br/>|<br/>|<br/>|<br/>|<br/>|<br/>
    |<br/>|<br/>|<br/>|<br/>|<br/>|<br/>|<br/>|<br/>|<br/>|<br/>
    |<br/>|<br/>|<br/>|<br/>|<br/>|<br/>|<br/>|<br/>|<br/>|<br/>
</body>
</html>
