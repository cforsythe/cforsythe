<!DOCTYPE html>
<?php
$backgroundImage = 'img/sea.jpg';
if(isset($_GET['keyword']) && $_GET['keyword'] != ""){
    echo "<h2>You typed \"${_GET['keyword']}\" last</h2>";
}
else{
    echo "<h2>Type keyword to display random images from Pixabay.com</h2>";
}
if(isset($_GET['keyword'])){
    include 'api/pixabayAPI.php';
    $imageURLs = getImageURLS($_GET['keyword']);
    $backgroundImage = $imageURLs[array_rand($imageURLs)];
}
for($i = 0; $i < 5; $i++){
    echo "<img src='" . $imageURLs[$i] . "' width='200'>";
}
?>
<html>
    <head>
        <title>Image Carousel</title>
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'/>
        <style>
            @import url('css/styles.css');
            
            body{ 
                background-image: url('<?=$backgroundImage ?>');
            }
        </style>
    </head>
    <body>
        
        <form>
            <input type='text' name='keyword' placeholder='Keyword'>
            <input type='submit' value='Submit'>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>