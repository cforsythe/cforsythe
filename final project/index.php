<?php
include 'functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Cryptocurrency Log </title>
        <link rel='stylesheet' href='css/styles.css'>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    </head>
    <body>
        <div id='toggles'>
            <div id='login'>
                <a id='button' href='login.php'>Login</a>
            </div>
            Search: 
            <input type='text' id='search'>
            Price: 
            <select id='sort'>
                <option>Descending</option>
                <option>Ascending</option>
            </select>
            Hashing Algorithm: 
            <select id='hashingAlg'>
                <option>Select One</option>
                <?=getOptions()?>
            </select>
            <br>
            <button id='avgPrice' type='button' class='btn btn-info padding'>Avg Price</button>
            <button id='avgMarket' type='button' class='btn btn-info padding'>Avg Market</button>
            <button id='ttlMarket' type='button' class='btn btn-info padding'>Total Market</button>
        </div>
        <div id='main'>
        </div>
        <script>
            function loadItems(){
                $.ajax({
                    type: "POST",
                    url: "generate.php",
                    data: {sort: $("#sort").val(), hash: $("#hashingAlg").val(), search: $("#search").val()},
                    success: function(data){
                        $("#main").append(data);
                    }
                })
            }
            function getAvgPrice(){
                $.ajax({
                    type: "POST",
                    url: "getAvgPrice.php",
                    data: {},
                    success: function(data){
                        alert("Coin Average Price is $" + data);
                    }
                });
            }
            function getAvgMarket(){
                $.ajax({
                    type: "POST",
                    url: "getAvgMarket.php",
                    data: {},
                    success: function(data){
                        alert("Average Market Capacity is $" + data);
                    }
                });
            }
            function getTtlMarket(){
                $.ajax({
                    type: "POST",
                    url: "getTtlMarket.php",
                    data: {},
                    success: function(data){
                        alert("Total Market Capacity is $" + data);
                    }
                });
            }
            loadItems();
            $(document).ready(function(){
                $("#sort").change(function(){
                    console.log("okay");
                    $("#main").empty();
                    loadItems();
                });
                $("#hashingAlg").change(function(){
                    $("#main").empty();
                    loadItems();
                });
                $("#search").change(function() {
                    $("#main").empty();
                    loadItems();
                });
                $("#avgPrice").click(function(){
                    getAvgPrice();
                });
                $("#avgMarket").click(function(){
                    getAvgMarket();
                });
                $("#ttlMarket").click(function(){
                    getTtlMarket();
                });
            })
        </script>
    </body>
</html>