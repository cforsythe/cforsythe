<?php
function generateAnswer(){
        $carcounts;
        for($i = 1; $i <= 4; $i++){
            $selection = $_GET['img' . $i];
            switch($selection){
                case 'electriccar': $selection = 'Tesla';
                                    break;
                case 'hybrid':      $selection = 'BMW I8';
                                    break;
                case 'truck':       $selection = 'Dodge Truck';
                                    break;
                case 'supercar':    $selection = 'McLaren P1';
                                    break;
            }
            if(isset($carcounts[$selection])){
                $carcounts[$selection] += 1;
            }
            else{
                $carcounts[$selection] = 1;
            }
                 
        }
        $mostcommon = max($carcounts);
        $carname = array_search($mostcommon, $carcounts);
        echo "<p id='welcome'>Hello ${_GET['name']} it looks like a $carname would fit you best<p>";
        echo "<img id='vehicle' src='img/cars/$carname.jpg'";
        echo "</br>";
}
function getMessage(){
    for($i = 1; $i <= 4; $i++){
        if(!isset($_GET['img' . $i]) && !isset($_GET['name'])){
            echo "<h3>Choose the image that you like best in the four categories</h3>";
            return;
        }
        if(!isset($_GET['img' . $i]) || empty($_GET['name'])){
            echo "<h1 id='error'>Error: Please make sure you select an answer for all questions</h1>";
            return;
        }
    }
generateAnswer();
}
?>