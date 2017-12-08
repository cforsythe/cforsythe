<?php
session_start();
if($_GET['unset'] == true){
    session_unset();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
        <link rel='stylesheet' href='css/styles.css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    </head>
    <body>
        <div id='loginpage'>
            <h1> Admin Login </h1>
            <div id='small' >
                <form method='POST' action='loginProcess.php'>
                    <input name='username' type='text' id='username' placeholder='Username'>
                    <br>
                    <input name='password' type='password' id='password' placeholder='Password'>
                    <br>
                    <input id='loginbutton' type='submit' value='Login'>
                </form>
                <a id='button' class='width' href='index.php'>Home</a>
                <?php
                    if($_SESSION['error']){
                        echo "<span id='error'>Wrong username or password!</span>";
                    }
                ?>
            </div>
        </div>
    </body>
</html>