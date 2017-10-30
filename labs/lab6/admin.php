<?php
session_start();

if (!isset($_SESSION['username'])) { //checks whether admin has logged in
    
    header("Location: index.php");
    exit();
    
}

include '../../dbConnection.php';
$conn = getDatabaseConnection();


function displayUsers() {
    global $conn;
    $sql = "SELECT * 
            FROM tc_user
            ORDER BY lastName";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page </title>
        <link rel='stylesheet' href='css/styles.css'>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class='jumbotron'>
            <div id='logout'>
                <a href='index.php'>LOGOUT</a>
            </div>
            <h1> TCP ADMIN PAGE </h1>
            <h2> Welcome <?=$_SESSION['adminFullName']?>! </h2>
        </div>
        <hr>
        
        <form action="addUser.php">
            
            <input type="submit" value="Add new User" />
            
        </form>
        
        <br /><br />
        
        <?php
        $users =displayUsers();
        foreach($users as $user) {
            $info = $user['userId'] . '  ' . $user['firstName'] . "  " . $user['lastName'];
            echo "<a id='showinfo' href='getInfo.php?userId=" . $user['userId'] . "'>$info</a>";
            echo "[<a id='edit' href='updateUser.php?userId=" . $user['userId'] . "'>Edit</a>]";
            echo "[<a id='remove' href='removeUser.php?userId=" . $user['userId'] . "'>Remove</a>]"; 
            echo "</br>";
            
        }
        
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>     
</html>