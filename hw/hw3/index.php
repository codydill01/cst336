<!-- 6-7-2018  -->
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
            <h1> Computer Shop </h1>
            <hr>
        </header>
        
        <div id="main">
            
            <form action="functions.php" method="get">
                <label for =="name">
                Name:
                </label>
                <br>
                <input id="name" type="text" name="nametext" value="<?=$_GET['nametext']?>" />
                <br>
                <label for =="phone"> 
                Phone Number
                </label><br>
                <input id="phone" type="text" name ="phonenumber" value ="<?=$_GET['phonenumber']?>" />
                
                
                <fieldset>
                    <p class = test>Select your new build</p>
                    <input id="gaming" type="radio" name="pc" value="selection1">
                    <label for ="gaming"> Gaming PC</label>
                    <br>
                    <input id = "work" type= "radio" name="pc" value="selection2">
                    <label for ="work"> Work PC </label>
                    <br>
                    <input id ="videoediting" type="radio" name="pc" value="selection3">
                    <label for ="videoediting"> Video Editing PC </label>
                    <br>
                    <input id = "casual" type ="radio" name ="pc" value ="selection4">
                    <label for ="casual"> Casual PC </label>
                    <br>
                    <input id = "school" type ="radio" name = "pc" value ="selection5">
                    <label for ="school"> School PC </label>
                    <br>
                    <input id = "parent" type ="radio" name ="pc" value ="selection6">
                    <label for ="parent"> Parent PC </label>
                    <br>
                </fieldset>
                <br/>
                
                <select name ="category"> 
                    <option value = ""> Select Warranty</option>
                    <option value = "1"> One Year </option>
                    <option value = "2"> Two Years </option>
                    <option value = "3"> Three Years </option>
                    <option value = "4"> Four Years </option>
                </select>
                <input type ="submit" value ="Submit" />
            </form>
        </div>
        <hr>
        <footer>
            
            Disclaimer: If the PC breaks during the first 24hours bring it back for a full refund.
            
            <div id="fn">
            Otherwise enjoy your new PC!      
            </div>
           
            
        </footer>        
    </body>    
    
</html>