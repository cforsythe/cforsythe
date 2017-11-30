<?php

include '../../dbConnection.php';
$conn = getDatabaseConnection();

$sql = "SELECT * FROM tc_searches
        WHERE searched = :city";
        
$namedParameters = array();

$namedParameters[':city'] = $_POST['city'];

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($record);


?>