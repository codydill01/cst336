<!DOCTYPE html>
<html>
    <head>
        <title> Computer Shop </title>
        <style>
            @import url("css/styles.css");
        </style>
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1> Summary </h1>
        </header>
        
         <?php
            if (empty($_GET['nametext']) || (empty($_GET['phonenumber']))   
                || (empty($_GET['category'])))  
                { 
                echo "<h2> Don't forget to provide information for each section! </h2>";
                } 
            else if ((!isset($_GET['pc'])) && (!isset($_GET['pc']))) 
                {
                echo "<h2> Please select a PC. </h2>";
                } 
            else 
                {  
                  
         ?>       
                  <h3>Hello there - <?php echo $_GET["nametext"]; ?></h3>
                  <h3>Your Phone Number is: <?php echo $_GET["phonenumber"]; ?></h3>
                  <h4><?php 
                  $choice = $_GET["pc"]; 
                  if ($choice == "selection1") 
                  {
                      if(isset($_GET["category"]))
                      {
                          $cat = $_GET["category"];
                      }                      
                      echo "You selected the Gaming PC and the $cat year warranty policy. \n";
                      echo "Lets go play some Call of Duty to celebrate! \n" ;
 
                  } 
                else if ($choice == "selection2") 
                  {
                      if(isset($_GET["category"]))
                      {
                          $cat = $_GET["category"];
                      }                           
                     echo "You selected the Work PC and the $cat year warranty policy. \n 
                     Better get back to the office before the boss finds out!" ;
                  }
                else if ($choice == "selection3")
                  {
                      if(isset($_GET["category"]))
                      {
                          $cat = $_GET["category"];
                      } 
                      echo "You selected the Video Editing PC and the $cat year warranty policy. \n
                      I can't wait to see those 4k movies you will be producing!";
                  }
                else if ($choice == "selection4")
                  {
                      if(isset($_GET["category"]))
                      {
                          $cat = $_GET["category"];
                      }
                      echo "You selected the Casual PC and the $cat year warranty policy. \n
                      Enjoy watching some netflix and hulu!";
                      
                  }
                else if ($choice == "selection5")
                  {
                      if(isset($_GET["category"]))
                      {
                          $cat = $_GET["category"];
                      } 
                      echo "You selected the School PC and the $cat year warranty policy. \n
                      Hard work will pay off once you receive those degrees!";
                  }
                else if ($choice == "selection6")
                  {
                      if(isset($_GET["category"]))
                      {
                          $cat = $_GET["category"];
                      } 
                      echo "You selected the Parent PC and the $cat year warranty policy. \n
                      Have fun looking on Facebook to reconnect with old high school friends!";
                  }
                  ?> 
                  Enjoy your new PC!</h4>
        <?php 
            }
        ?>
        
        <br/> <br />
        
        <div id="main">   
          <form action="functions.php" method="get">
            <label for =="name">Name:</label> 
            <input id="name" type="text" name="nametext" value="<?=$_GET['nametext']?>"/>
            <br>
            <label for =="phone">Phone Number:</label>
            <input id="phone" type="text" name="phonenumber" value="<?=$_GET['phonenumber']?>"/>
             
            
            <fieldset>
                <legend>Choose a PC</legend>
                <?php   
                    if ($_GET["pc"] == "selection1") 
                    { ?>
                        <input id = "gaming" type = "radio" name="pc" value="selection1" checked>
                        <label for = "gaming">Gaming PC</label><br>
                    <?php } 
                    else 
                        { ?>
                        <input id = "gaming" type = "radio" name="pc" value="selection1">
                        <label for = "gaming">Gaming PC</label><br>
                    <?php 
                        }
                    if ($_GET["activity"] == "selection2") 
                        { ?>
                        <input id = "work" type = "radio" name="pc" value="selection2" checked>
                        <label for = "work">Work PC </label><br>
                    <?php
                        }
                    else 
                        { ?>
                        <input id = "work" type = "radio" name="pc" value="selection2">
                        <label for = "work"> Work PC </label><br>
                    <?php 
                        }
                    if ($_GET["activity"] == "selection3") 
                        { ?>
                        <input id = "videoediting" type ="radio" name ="pc" value ="selection3" checked>
                        <label for ="videoediting"> Video Editing PC </label><br>
                    <?php 
                        } 
                    else 
                        { ?>
                        <input id = "videoediting" type="radio" name = "pc" value ="selection3">
                        <label for = "videoediting"> Video Editing PC</label><br>
                    <?php 
                        }
                    if($_GET["pc"] == "selection4") 
                        { ?>
                        <input id ="casual" type = "radio" name ="pc" value = "selection4" checked>
                        <label for ="casual"> Casual PC </label><br>
                    <?php 
                        } 
                    else 
                        { ?>
                        <input id ="casual" type = "radio" name ="pc" value = "selection4">
                        <label for ="casual"> Casual PC </label><br>
                    <?php 
                        }
                    if($_GET["pc"] == "selection5") 
                        { ?>
                        <input id ="school" type ="radio" name ="pc" value ="selection5" checked>
                        <label for ="school"> School PC</label><br>
                    <?php
                        } 
                    else 
                        { ?>
                        <input id ="school" type ="radio" name = "pc" value = "selection5">
                        <label for ="school"> School PC </label><br>
                    <?php
                        }
                    if($_GET["pc"] == "selection6") 
                        { ?>
                        <input id ="parent" type ="radio" name ="pc" value = "selection6" checked>
                        <label for ="parent"> Parent PC </label><br>
                    <?php 
                        } 
                    else 
                        { ?>
                        <input id ="parent" type = "radio" name ="pc" value ="selection6">
                        <label for ="parent"> Parent PC</label><br>
                    <?php 
                        } ?>
                    
            </fieldset>
            <br/> <br />
            <select name = "category">
                <?php
                if ($_GET["category"] == "") 
                    { ?>
                    <option value="" selected>Select Warranty</option>
                    <option value = "1">One Year </option>
                    <option value = "2">Two Years</option>
                    <option value = "3">Three Years</option>
                    <option value = "4">Four Years</option>
                    <?php 
                    } 
                else if ($_GET["category"] == "1") 
                    { ?>
                    <option value="" >Select One</option>
                    <option value="1" selected>One Year </option>
                    <option value = "2">Two Years</option>
                    <option value = "3">Three Years</option>
                    <option value = "4">Four Years</option>
                    <?php 
                    } 
                else if ($_GET["category"] == "2") 
                    { ?>
                    <option value="" >Select One</option>
                    <option value = "1">One Year </option>
                    <option value="2" selected>Two Years</option>
                    <option value = "3">Three Years</option>
                    <option value = "4">Four Years</option>
                    <?php } 
                else if ($_GET["category"] == "3") 
                    { ?>
                    <option value="" >Select One</option>
                    <option value = "1">One Year </option>
                    <option value = "2">Two Years</option>
                    <option value="3" selected>Three Years</option>
                    <option value = "4">Four Years</option>
                    <?php } 
                else if ($_GET["category"] == "4") 
                    { ?>
                    <option value="" >Select One</option>
                    <option value = "1">One Year </option>
                    <option value = "2">Two Years</option>
                    <option value = "3">Three Years</option>
                    <option value="4" selected>Four Years</option>
                    <?php } ?>
            </select>
            <input type="submit" value="Submit" />
          </form>
        </div>
         <footer>
            Disclaimer: If the PC breaks during the first 24hours bring it back for a full refund.
            <div id="fn2">
            Otherwise enjoy your new PC!      
            </div>
        </footer> 
    </body>
</html>