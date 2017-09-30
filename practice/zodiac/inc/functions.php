<?php 

function getYears($startyear, $endyear, $interval){
    echo "<ul>";
    $yearsum = 0;
    $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
    $zodiacnum = 0;
    for($i = $startyear; $i <= $endyear; $i+=$interval){
        $message = "";
        if($i == 1776){
            $message = "<strong>USA INDEPENDENCE!</strong>";
        }
        if(($i % 100) == 0){
            $message = "<strong>Happy New Century!</strong>";
        }
        if($i > 1900){
            $zodiacnum = ($zodiacnum + 1) % 12;
        }
        echo "<li>Year $i $message</li>";
        echo "<img src='img/$zodiac[$zodiacnum].png' width='70' </img>";
        $yearsum += $i;
        }
    echo "</ul>";
    return $yearsum;
}


?>