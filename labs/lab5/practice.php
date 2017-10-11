<?php
$host = 'localhost';
$dbname = 'tcp';
$username = 'root';
$password = 'mypass';
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function usersWithAnA(){
    $sql = "SELECT firstName, lastName, email FROM tc_user WHERE firstName LIKE 'A%'";
    global $dbConn;
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    // print_r($records);
    
    foreach ($records as $record){
        echo $record['firstName'] . " " . $record['lastName'] . " " . $record['email'] . "<br/>";
    }
}
function getDevicesInRange($first, $last){
    $sql = "SELECT deviceName, price FROM tc_device WHERE price BETWEEN $first and $last";
    global $dbConn;
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    foreach($records as $record){
        echo $record['deviceName'] . " " . $record['price']. "<br/>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <h3>Users who have an A at beginning of name.</h3>
        <?=usersWithAnA()?>
        
        <h3>Devices between $300 and $1000</h3>
        <?=getDevicesInRange(300, 1000)?>
    </body>
</html>