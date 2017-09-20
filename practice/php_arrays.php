<?php
function displaySymbol($symbol){
    echo "<img src='../labs/lab2/img/$symbol.png' width='70'/>";
}

$symbols = array("lemon", "orange", "cherry");

$symbols[] = "grapes"; //adds element at the end of the array

array_push($symbols, "seven"); //adds element at the end of the array

for($i = 0; $i < 5;$i++){
    displaySymbol($symbols[$i]);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> PHP Arrays</title>
    </head>
</html>