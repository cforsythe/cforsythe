<?php
include '../../dbConnection.php';


$conn = getDatabaseConnection();

function getDeviceTypes(){
    global $conn;
    $sql = "SELECT DISTINCT(deviceType)
            FROM `tc_device` 
            ORDER BY deviceType";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record){
        echo "<option> "  . $record['deviceType'] . "</option>";
    }
}


function displayDevices(){
    global $conn;
    
    $sql = "SELECT * FROM tc_device WHERE 1";
    
    
    if(isset($_GET['submit'])){
        $namedParameters = array();
        if(!empty($_GET['deviceName'])){
            $sql .= " AND deviceName LIKE :deviceName"; 
            $namedParameters[':deviceName'] = "%" . $_GET['deviceName'] . "%";
        }
         
        if(!empty($_GET['deviceType']) && $_GET['deviceType'] != 'Select Category'){
            $sql .= " AND deviceType = :dType";
            $namedParameters[':dType'] =   $_GET['deviceType'];
        }
        if(isset($_GET['available'])){
            $sql .= " AND status LIKE :availability";
            $namedParameters[':availability'] = "%" . "a" . "%";
        }
        if(isset($_GET['orderBy'])){
            if($_GET['orderBy'] == 'name'){
                $sql .= " ORDER BY deviceName ASC";
            }
            else{
                $sql .= " ORDER BY price ASC";
            }
        }
    }
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record){
        echo  $record['deviceName'] . " " . $record['deviceType'] . " " .
              $record['price'] .  "  " . $record['status'] . 
              "<a target='checkoutHistory' href='inc/checkoutHistory.php?deviceId=".$record['deviceId']."'> Checkout History </a> <br />";
    }
}
?>