<?php


include '../finalDbConnection.php';
$conn = getDatabaseConnection();

$namedParameters = array();

$sql = "DELETE FROM coins
        WHERE id=:id";
        
$namedParameters[":id"] = $_POST['id'];

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);

echo "success";

?>

