<?php
include 'inc/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'/>
        <link rel='stylesheet' href='css/styles.css'/>
        <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
        <title>Rap Name Generator</title>
        <script>
            function reload(){
                location.reload(false);
            }
        </script>
    </head>
    <body>
        <header>R a p  N a m e  G e n e r a t o r</header>
        <div id='generated'>
            <?php
                generate();
             ?> 
        </div>
        
    </body>
</html>