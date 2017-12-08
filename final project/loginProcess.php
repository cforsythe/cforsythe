<?php
session_start();

include '../finalDbConnection.php';
$conn = getDatabaseConnection();

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT *
        FROM users
        WHERE username = :username 
        AND   password = :password";

$namedParameters = array();
$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;        
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);

//print_r($record);

if (empty($record)) {
    $_SESSION['error'] = true;
    header("Location: login.php");
} else {
    $_SESSION['username'] = $record['username'];
    header("Location: admin.php");
}
?>