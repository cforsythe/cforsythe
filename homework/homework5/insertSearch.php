<?php


include '../../dbConnection.php';
$conn = getDatabaseConnection();

$sql = "INSERT INTO tc_searches (searched)
        VALUES(:city)";
$namedParameters = array();

$namedParameters[":city"] = $_POST["city"];

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);

echo json_encode("success");

?>