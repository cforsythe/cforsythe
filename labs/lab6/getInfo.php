<?php
session_start();

if (!isset($_SESSION['username'])) { //validates that admin has indeed logged in
    
    header("Location: index.php");
    
}

 include("../../dbConnection.php");
 $conn = getDatabaseConnection();

function getDepartmentInfo(){
    global $conn;        
    $sql = "SELECT departmentId, deptName
            FROM tc_department 
            ORDER BY deptName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    return $records;
    
}
function getUserInfo($userId){
    global $conn;
    $sql = "SELECT * FROM tc_user
            WHERE userId=$userId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch();
    
    return $record;
}
function findDeptName($depts, $deptId){
    foreach($depts as $department){
        if($department['departmentId'] == $deptId){
            return $department['deptName'];
        }
    }
}

if (isset($_GET['userId'])) {
    
    $userInfo = getUserInfo($_GET['userId']);
}
function printUserInfo(){
    global $userInfo;
    $depts = getDepartmentInfo();
    echo "Name: " . $userInfo['firstName'] . " " . $userInfo['lastName'];
    echo "</br>";
    echo "Email: " . $userInfo['email'];
    echo "</br>";
    echo "University Id: " . $userInfo['universityId'];
    echo "</br>";
    echo "Phone: " . $userInfo["phone"];
    echo "</br>";
    echo "Gender: " . $userInfo["gender"];
    echo "</br>";
    echo "Role: " . $userInfo['role'];
    echo "</br>";
    echo "Department: " . findDeptName($depts, $userInfo['deptId']);
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title> Admin: User Info </title>
    </head>
    <body>
        <h1> Admin Section </h1>
        <h2> Showing User Info </h2>
        <?=printUserInfo()?>
    </body>
    
    
</html>