<?php
include './inc/functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title> R.P.S.L.S </title>
        <style>
            @import url("css/styles.css");
        </style>
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower:700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script:700" rel="stylesheet">
    </head>
    <body>
        <p><div id= "abrev">R.P.S.L.S.</div><br /> <div id= "extend">Rock Paper Sciccors Lizard Spock</div></p>
        
        <p id= "player1">Player 1</p>
        <p id= "player2">Player 2</p>
        <form>
            <input type= "submit" value= "R.P.S.L.S!"/>
        </form>
        
        <div id= "main">
            <?php
                play();
            ?>
        </div>
    
    </body>
</html>