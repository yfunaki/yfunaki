<?php

    $backgroundImage = "img/sea.jpg";
    
    //print_r($_GET); //displaying all content submitted in the form using the GET method

    
    if(isset($_GET['keyword']) && $_GET['keyword'] != "")
    {
        include 'api/pixabayAPI.php';
        
        // echo "<h3>You searched for: " . $_GET['keyword'] . "</h3>";
        
        $orientation = "horizontal";
        $keyword = $_GET['keyword'];
        
        if(isset($_GET['layout']))
        {
            $orientation = $_GET['layout'];
        }
        
        if(!empty($_GET['category']))
        {
            $keyword = $_GET['category'];
        }
        
        $imageURLs = getImageURLs($keyword, $orientation);
        
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
    
    if($_GET['keyword'] == "")
    {
         echo "<h2> You must type a keyword or select a category </h2>";
    }
    
    function checkCategory($category)
    {
        if($category == $_GET['category'])
        {
            echo " selected";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
    </head>
    
    <style>
        @import url("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
        @import url("css/styles.css");
        body 
        {
            background-image: url("<?=$backgroundImage?>");
            background-size:100%;
            background-repeat: no-repeat;
            text-align: center;
        }
        
        #carouselExampleIndicators
        {
            margin: 0 auto;
            width: 500px;
            margin: 0 auto;
            text-align: center;
        }
        
        #searchTitle
        {
            background-color: #FFFFFF;
        }
        
        #searchEngine
        {
            border-radius: 20px;
        }
        
        #layoutDiv
        {
            display: inline-block; 
            color: black; 
            text-align: left; 
            background-color: white; 
            padding: 5px; 
            border-radius: 10px;
        }
        
        #categoryDiv
        {
            display: block;
            padding: 10px;
        }
        
        #submitDiv
        {
            display: block;
            padding: 10px;
        }
        
        #submitButton
        {
            border-radius: 50px;
        }
        
        footer
        {
            background-color: #FFFFFF;
            color: black;
        }
        
    </style>
    <body>
        <br/><br/>

        <?php
        
        if (!isset($_GET['keyword']))
        {
        
            echo "<h2> You must type a keyword or select a category </h2>";
            
        } 
        
        ?>

        <form method = "GET">
            <input type = "text" id = "searchEngine" size = "20" name = "keyword" placeholder = "Keyword" value = "<?= $_GET['keyword']?>"/>
            
            <div id = "layoutDiv">
            <input type = "radio" name = "layout" value = "horizontal" id = "hlayout"
            <?php
                if($_GET['layout'] == "horizontal")
                {
                    echo "checked";
                }
            ?>
            class = "radioInput">
            <label for = "hlayout" > Horizontal </label>
            </br>
            <input type = "radio" name = "layout" value = "vertical" id = "vlayout" <?= ($_GET['layout'] == "vertical")?"checked":"" ?> class = "radioInput">
            <label for = "vlayout" > Vertical </label>
            </div>
            
            <div id = "categoryDiv">
            <select name = "category" >
                <option value = ""> Select One </option>
                <option <?=checkCategory('California')?>> California </option>
                <option <?=checkCategory('Sunset')?>> Sunset </option>
                <option <?=checkCategory('Otters')?>> Otters </option>
                <option <?=checkCategory('Animal')?>> Animal </option>
                <option <?=checkCategory('Stars')?>> Stars </option>
            </select>
            </div>
            
            <div id = "submitDiv">
            <input type = "submit" id = "submitButton" value = "Submit" />
            </div>
            
        </form>
        
        <?php
        
            if(!isset($_GET['keyword']))
            {
                echo "<h2> Type a keyword to display a slideshow <br /> with random images from Pixabay.com </h2>";
            }
            // else
            // {
            //     for($x = 0; $x < 5; $x++)
            //     {
            //         echo "<img src = '" . $imageURLs[rand(0, count($imageURLs))] . "' width = '200' >"; 
            //     }
            // }
        ?>
        
        <?php
            if(isset($_GET['keyword']) && $_GET['keyword'] != "") {
        
        ?>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="<?=$imageURLs[0]?>" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?=$imageURLs[1]?>" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?=$imageURLs[2]?>" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?=$imageURLs[3]?>" alt="Fourth slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?=$imageURLs[4]?>" alt="Fifth slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?=$imageURLs[5]?>" alt="Fifth slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?=$imageURLs[6]?>" alt="Fifth slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        
        <?php
            } //end of if statement above in php block
        ?>
        
        <br/><br/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        
    </body>
    
    <footer>
        <hr>
            CST 336 Internet Programming 2018&copy; Funaki <br />
            <strong> Disclaimer: </strong> This information on this webpage is used only for academic purposes. <br />
            <img src="img/buddy_verified.png" alt-"Buddy Verified Badge" />
    </footer>
</html>