<?php
session_start();

if (!isset($_SESSION['username'])) { //validates that admin has indeed logged in
    
    header("Location: index.php");
    
}
include("../../dbConnection.php");
$conn = getDatabaseConnection();
function getUserInfo($userId){
    global $conn;
    $sql = "SELECT firstName, lastName 
            FROM tc_user
            WHERE userId=$userId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch();
    
    return $record;
}

if(isset($_GET['userId'])){
    $userInfo = getUserInfo($_GET['userId']);
    $_SESSION['userId'] = $_GET['userId'];
}
function printUserName(){
    global $userInfo;
    echo $userInfo['firstName'] . " " . $userInfo['lastName'];
}
function removeUser($userId){
    global $conn;
    $sql = "DELETE FROM tc_user
            WHERE userId=$userId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
if(isset($_GET['removeUserForm'])){
    if($_GET['remove'] == 'yes'){
        removeUser($_SESSION['userId']);
    }
    header("Location: admin.php");
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title> Remove User </title>
        <link rel='stylesheet' href='css/remove.css'>
    </head>
    <body>
        <h1 id='removeuser'>Are you sure you would like to remove <?=printUserName()?> from users?</h1>
        <form>
            Yes: <input type='radio' name='remove' value='yes'/>
            No: <input type='radio' name='remove' value='no'/>
            </br>
            <input type='submit' name='removeUserForm' value='Continue'/>
        </form>
    </body>
</html>