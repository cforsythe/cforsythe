<?php
include 'inc/functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Technology Center</title>
        <link rel='stylesheet' href='css/styles.css'>
    </head>
    <body>
        <div class='search'>
            <h1>Technology Center: Checkout System</h1>
            
            <form>
                Device: <input type='text' name='deviceName' placeholder='Device Name'/>
                Type:
                <select name='deviceType'>
                    <option>Select Category</option>
                    <?=getDeviceTypes()?>
                </select>
                
                <input type="checkbox" name="available" id="available">
                <label for="available"> Available </label>
                <br>
                Order by:
                <input type="radio" name="orderBy" id="orderByName" value="name"/> 
                <label for="orderByName"> Name </label>
                <input type="radio" name="orderBy" id="orderByPrice" value="price"/> 
                <label for="orderByPrice"> Price </label>
                </br>
                <input type="submit" value="Search!" name="submit" >
            </form>
        </div>
        
         <hr>
        
        <?=displayDevices()?>
        <iframe name="checkoutHistory" width="400" height="400"></iframe>
    </body>
</html>