<?php
include 'inc/functions.php';
?>
<html>
    <head>
        <title>Chinese Zodiac Years</title>
    </head>
    <h1>Chinese Zodiac Years</h1>
    <body>
        <?php
            $yearsum = getYears($_GET['start'], $_GET['end'], 1);
            echo "<h3>Year Sum: $yearsum</h3>";
        ?>
        
        
    </body>
    
</html>