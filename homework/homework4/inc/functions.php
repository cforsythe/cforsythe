<?php

$response = array();
switch($_POST["functionname"]){
    case 'getPicture':
        $pictures = array("dot", "dot1", "dot2");
        $location = array();
        $picture = $pictures[array_rand($pictures)];
        $response['picture'] = "img/$picture.png";
        echo json_encode($response);
}
?>