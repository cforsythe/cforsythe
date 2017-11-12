<?php
include 'inc/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'/>
        <link rel='stylesheet' href='css/styles.css'/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <title>Mouse Practice</title>
    </head>
    <body>
        <header>Mouse Practice</header>
        <div id='gamearea'>
            <img src="img/dot2.png" alt="" id="target" draggable="false"/>
        </div>
        <br>
        <h3 id='highscore'></h3>
        <p id="clicks">Targets have been clicked 0 time(s) in this session.</p>
        <p id="speed">You havent clicked any targets.</p>
        <p id="average"></p>
        <button id='reset' class='btn-success'>Reset Stats</button>
        <script>
            function reset(){
                sessionStorage.clear();
                location.reload();
            }
            function printStats(){
                if(sessionStorage.avg){
                    var avg = sessionStorage.avg
                    document.getElementById("average").innerHTML = "Your average time to click 10 targets is " + avg + " seconds";
                }
                else{
                    document.getElementById("average").innerHTML = "You have not yet set an average";
                }
                if(sessionStorage.highScore){
                    highScore = sessionStorage.highScore;
                    document.getElementById("highscore").innerHTML = "Your high score for 10 targets is " + highScore + " seconds";
                }
                else{
                    document.getElementById("highscore").innerHTML = "You have not yet set a high score.";
                }
            }
            printStats();
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
                if(sessionStorage.clickcount % 10 == 0){
                    sessionStorage.end = performance.now();
                    sessionStorage.time_taken = Math.abs((sessionStorage.end - sessionStorage.start)/1000);
                    sessionStorage.time_taken = Math.round(sessionStorage.time_taken * 10)/10;
                    document.getElementById("speed").innerHTML = "You clicked 10 targets in " + sessionStorage.time_taken + " seconds";
                    addTime(sessionStorage.time_taken);
                    getAverageTime();
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
                var times = JSON.parse(sessionStorage.getItem('averageTime'));
                var avg = 0;
                var highScore = parseInt(times[0]);
                for(var i = 0; i < times.length; i++){
                    var time = parseInt(times[i]);
                    avg = avg + time;
                    if(highScore > time){
                        highScore = time;
                    }
                }
                avg = avg/times.length;
                sessionStorage.avg = Math.round(avg * 10)/10;
                sessionStorage.highScore = highScore;
                printStats();
            }
            function addTime(time){
                if(sessionStorage.averageTime){
                    var times = JSON.parse(sessionStorage.getItem('averageTime'));
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
            document.getElementById("reset").addEventListener("click", reset);
        </script>
    </body>
</html>