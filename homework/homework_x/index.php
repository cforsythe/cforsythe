<?php
include 'inc/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'/>
        <link rel='stylesheet' href='css/styles.css'/>
        <title>Mouse Practice</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <header>Mouse Practice</header>
        <div id='gamearea'>
            <img src="img/dot2.png" alt="" id="target" draggable="false"/>
        </div>
        <br>
        <p id="clicks">Targets have been clicked 0 time(s) in this session.</p>
        <p id="speed">You havent clicked any targets.</p>
        <script>
            function clickCount(){
                if(sessionStorage.clickcount) {
                    sessionStorage.clickcount = Number(sessionStorage.clickcount) + 1;
                    getPicture();
                    setRandom();
                }
                else{
                    sessionStorage.clickcount = 1;
                    sessionStorage.firstclick = true;
                    sessionStorage.start = performance.now();
                }
                document.getElementById("clicks").innerHTML = "Targets have been clicked " + sessionStorage.clickcount + " time(s) in this session.";
                if(sessionStorage.firstclick == true){
                    sessionStorage.start = performance.now();
                    sessionStorage.firstclick = false;
                }
                if(sessionStorage.clickcount >= 10){
                    sessionStorage.end = performance.now();
                    sessionStorage.time_taken = Math.abs((sessionStorage.end - sessionStorage.start)/1000);
                    sessionStorage.time_taken = Math.round(sessionStorage.time_taken * 10)/10;
                    document.getElementById("speed").innerHTML = "You clicked 10 targets in " + sessionStorage.time_taken + " seconds";
                    addTime(sessionStorage.time_taken);
                    getAverageTime();
                    sessionStorage.clickcount = 0;
                    sessionStorage.start = performance.now();
                }
            }
            function getPicture(){
                $.ajax({
                    type: "POST",
                    url: 'inc/functions.php',
                    dataType: 'json',
                    data: {functionname: 'getPicture'},
                    success: function (obj) {
                        if(obj != null) {
                            var target = document.getElementById('target');
                            target.src = obj.picture;
                            return;
                        }
                        else {
                            console.log('failure');
                        }
                    },
                    error: function(result){
                        console.log(result);
                        console.log('fail')
                    }
                });
            }
            function getAverageTime(){
                console.log("Getting average time from php");
            }
            function addTime(time){
                if(sessionStorage.averageTime){
                    var times = JSON.parse(sessionStorage.getItem('averageTime'));
                    console.log(times);
                    times.push(time);
                    sessionStorage.setItem('averageTime', JSON.stringify(times));
                }
                else{
                    var timeArray = [];
                    timeArray.push(time);
                    sessionStorage.setItem('averageTime', JSON.stringify(timeArray));
                }
            }
            function setRandom(){
                var gamearea = document.getElementById('gamearea');
                var offsettop = gamearea.offsetTop;
                var maximumheight = 600 + offsettop - 70;
                var top = Math.floor(Math.random() * (maximumheight - offsettop) + offsettop);
                var offsetleft = gamearea.offsetLeft + 40;
                var maximumwidth = offsetleft + gamearea.offsetWidth - 110;
                var left = Math.floor(Math.random() * (maximumwidth - offsetleft) + offsetleft);
                $('#target').last().css({'position':'absolute', 'top':top + 'px', 'left':left + 'px'});
            }
            document.getElementById("target").addEventListener("click", clickCount);
        </script>
    </body>
</html>