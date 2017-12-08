<?php


include '../finalDbConnection.php';
$conn = getDatabaseConnection();

$sql = "SELECT AVG(market_cap)
        FROM coins";


$stmt = $conn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch();

print_r(number_format($record['0'], 2));

?>
