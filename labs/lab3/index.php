<!--7/03/2018 -->
<?php
    $backgroundImage = "img/sea.jpg";
    //API call goes here
    $layoutHorizontal = "horizontal";   
    if(empty($_GET['keyword']))
    {
        include './api/pixabayAPI.php';
        $keyword = $_GET['category'];
        $layoutHorizontal = $_GET['layout'];
        echo $layoutHorizontal;
        $imageURLs = getImageURLs($keyword, $layoutHorizontal);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
    elseif(empty($_GET['category']))
    {
        include './api/pixabayAPI.php';
        $keyword = $_GET['keyword'];
        $layoutHorizontal = $_GET['layout'];
        echo $layoutHorizontal;
        $imageURLs = getImageURLs($keyword, $layoutHorizontal);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];        
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <meta charset="utf-8">
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            @import url("css/styles.css");
            body
            {
               background-image: url(<?=$backgroundImage?>);
            }
        </style>
    </head>
    
    <body>
        <br>
        <?php
        //API Call Goes here
            if(!isset($imageURLs)){ // form has not been submitted
                echo "<h2><Must type a keyword to display a slide show of random images</h2>";
            }
            else // form was submitted. Display Carousel Here
            {
            //print_r($imageURLs); //checking that $imageURLs is not null
        ?>

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php
                         for($i = 0; $i <7; $i++)
                         {
                            echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                            echo ($i==0)? "class='active'" : "";
                            echo "></li>";
                        }
                    ?>
                </ol>
                <!-- Wrapper for Images -->
            <div class="carousel-inner" role="listbox">
                  <?php
                     for($i = 0; $i < 7; $i++)
                     {
                        do
                        {
                            $randomIndex = rand(0, count($imageURLs));
                        }
                        while(!isset($imageURLs[$randomIndex]));
         
                        echo '<div class="item ';
                        echo ($i== 0)? "active" : "";
                        echo '">';
                        echo '<img src="' .$imageURLs[$randomIndex]. '">';
                        echo '</div>';
                        unset($imageURLs[$randomIndex]);
                     }
                  ?>
            </div>
            <!-- Controls Here -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <?php
            } //endElse
        ?>
        <br>
        
        <div id="layout" align="center">
        <!-- HTML form goes here -->
        <form>
            <input type="text" name="keyword" placeholder="keyword" value="<?=$_GET['keyword']?>"/>
            </br>
            <input type="radio" id="lhorizontal" name="layout" value="horizontal">
            <label for="Horizontal"></label><label for="lhorizontal">
                Horizontal
                </label>
            </br>
            <input type="radio" id="lvertical" name="layout" value="vertical">
            <label for="Vertical"></label><label for="lvertical">
                Vertical
                </label>
            </br>
            <select name="category">
                <option value ="">Select One</option>
                <option value="ocean">Sea</option>
                <option value="forest">Trees</option>
                <option value ="Tiger"> Tiger</option>
                <option value ="Sky"> Sky </option>
                <option value ="Buildings"> Buildings</option>
            </select>
            </br>
            <input type="submit" value="Search" />
            
        </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>