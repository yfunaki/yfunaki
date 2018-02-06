<!DOCTYPE html>
<html>
    <head>
        <title> Lab 2: 777 Slot Machine </title>
        <meta charset="utf-8" />
    </head>
    <body>
        <?php
            function displaySymbol($randomValue)
            {
                
                switch($randomValue)
                {
                    case 0: $symbol = "seven";
                            break;
                    case 1: $symbol = "orange";
                            break;
                    case 2: $symbol = "cherry";
                            break;
                    case 3: $symbol = "grapes";
                            break;
                    case 4: $symbol = "bar";
                            break;
                    case 5: $symbol = "lemon";
                            break;
                }
                
                echo " <img src='img/$symbol.png' alt='$symbol' title='". ucfirst($symbol)."'/>";
            }
            
            $randomValue1 = rand(0,5);
            displaySymbol($randomValue1);
            
            $randomValue2 = rand(0,5);
            displaySymbol($randomValue2);
            
            $randomValue3 = rand(0,5);
            displaySymbol($randomValue3);
            
            echo "<br /> <hr> Values: $randomValue1 $randomValue2 $randomValue3";
            
            // for ($x = 0; $x < 3; $x++)
            // {
            //     displaySymbol();
            // }
         
            
            
        ?>
        
    </body>
</html>