<?php
include 'inc/functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Technology Center</title>
    </head>
    <body>
        <h1>Technology Center: Checkout System</h1>
        
        <form>
            Device: <input type='text' name='deviceName' placeholder='Device Name'/>
            Type:
            <select name='deviceType'>
                <?=getDeviceTypes()?>
            </select>
            
        </form>
    </body>
</html>