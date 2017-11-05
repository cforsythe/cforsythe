<?php
include '../foodDbConnection.php';
$conn = getDatabaseConnection();

function getFoodInfo(){
    global $conn;
    $sql = "SELECT foodName, price, timeName, name, calories FROM food
            NATURAL JOIN restaurant
            NATURAL JOIN time
            WHERE foodName=:food";
            
    $food = $_GET['foodName'];
    $namedParameters = array();
    $namedParameters[':food'] = $food;
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetch();
    
    echo "<html>
            <head>
                <title> Food Information </title>
                <link rel='stylesheet' href='css/styles.css'>
            </head>
            <body>
            <h1>Food Information</h1>
            Food: " . $record['foodName'] . "<br>
            Calories: " . $record['calories'] . "<br>
            Price: " . $record['price'] . "<br>
            Time: " . $record['timeName'] . "<br>
            Restaurant: " . $record['name'] . 
            "</body>
         </html>";
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Food Info </title>
    </head>
    <body>
        <?=getFoodInfo()?>
    </body>
</html>