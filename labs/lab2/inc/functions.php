<?php
    function play()
        {
        for($i=1;$i<4;$i++)
            {
            ${'randval' . $i} = rand(0,5);
            displaySymbol(${'randval' . $i}, $i);
            }
        displayPoints($randval1, $randval2, $randval3);
        }

    function displaySymbol($randval, $pos)
        {
        switch($randval)
            {
            case 0: $symbol = 'seven';
                    break;
            case 1: $symbol = 'cherry';
                    break;
            case 2: $symbol = 'orange';
                    break;
            case 3: $symbol = 'grapes';
                    break;
            case 4: $symbol = 'bar';
                    break;
            case 5: $symbol = 'lemon';
                    break;
            }
        echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='". ucfirst($symbol) ."' width='70'>";
        }
    function displayPoints($randval1, $randval2, $randval3)
        {
        echo "<div id='output'>";
        if($randval1 == $randval2 && $randval2 == $randval3)
            {
                switch($randval1)
                    {
                        case 0: $totalPoints = 1000;
                                echo "<h1>Jackpot!</h1>";
                                break;
                        case 3: $totalPoints = 900;
                                break;
                        case 4: $totalPoints = 500;
                                break;
                        case 2: $totalPoints = 300;
                                break;
                        case 1: $totalPoints = 500;
                                break;
                        case 5: $totalPoints = 250;
                                break;
                        
                        
                    }
                echo "<h2>You won $totalPoints points!</h2>";
            }
        else 
            {
             echo "<h3>Try again!</h3>";
            }
        echo "</div>";
        }
        ?>