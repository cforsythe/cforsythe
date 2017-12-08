<?php
include '../finalDbConnection.php';
$conn = getDatabaseConnection();

function getOptions(){
    global $conn;
    $sql = "SELECT * from algorithm";
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetchAll();
    $count = 1;
    foreach($record as $hash){
        echo "<option id='". $count. "' name='" . $count . "'>" . $hash['alg'] . "</option>";
        $count += 1;
    }
}
function getTypeOptions(){
    global $conn;
    $sql = "SELECT * from cointypes";
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetchAll();
    $count = 1;
    foreach($record as $type){
        echo "<option id='" . $count . "' name='" . $count . "'>" . $type['cointype'] . "</option>";
        $count += 1;
    }
}
?>