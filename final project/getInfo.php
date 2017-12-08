<?php


include '../finalDbConnection.php';
$conn = getDatabaseConnection();

$namedParameters = array();


$sql = "SELECT * FROM coins
        NATURAL JOIN algorithm
        NATURAL JOIN cointypes
        WHERE name=:coin";

$namedParameters[':coin'] = $_POST['coin'];

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($record);

?>