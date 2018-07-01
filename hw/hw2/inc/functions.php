<?php

    function play()
    {
        for($i = 1; $i < 3; $i++)
        {
            ${"fig".$i} = rand(0,4);
            displayFigure(${"fig".$i}, $i);
        }
        displayWinner($fig1, $fig2);
    }
    
    function displayFigure($figX, $pos)
    {
        $imgArr = array("rock", "paper", "scissors", "lizard", "spock");
        $fig = $imgArr[$figX];
        
        if($pos == 1)
        {
            $side = "Left";
        }
        
        else
        {
            $side = "Right";
        }
        echo ("<img id= 'pos$pos' src= 'img/figures/$fig$side.png' alt= '$fig'/>");
    }
    
    function displayWinner($fig1, $fig2)
    {
        
        echo "<div id = 'winnerText'>";
        
        if(($fig1==0 && $fig2==0) || ($fig1==1 && $fig2==1) 
        || ($fig1==2 && $fig2==2) || ($fig1==3 && $fig2==3) 
        ||($fig1==4&&$fig2 == 4))
        {
            $result = "Tie";
        }
        else if(($fig1==0 && $fig2==2) || ($fig1==0 && $fig2==3)
        || ($fig1==1 && $fig2==0) || ($fig1==1 && $fig2==4) || ($fig1==2 && $fig2==1) 
        || ($fig1==2 && $fig2==3) || ($fig1==3 && $fig2==1) || ($fig1==3 && $fig2==4)
        || ($fig1==4 && $fig2==0) || ($fig1==4 && $fig2==2))
        {
            $result = "Player 1";
        }
        else
        {
            $result = "Player 2";
        }
        
        if($result == "Tie")
        {
            echo "<p> It's a Tie <p>";
        }
        else
        {
            echo "<p> $result Wins! </p>";
        }
                
        echo "</div>";
        
    }
?> 