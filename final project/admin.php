<?php
session_start();
include 'functions.php';

if (!isset($_SESSION['username'])) {
    
    header("Location: index.php");
    exit();
    
}
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
                <a id='button' href='login.php?unset="true"'>Logout</a>
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
            <button type='button' class='btn btn-info padding' data-toggle='modal' data-target='#myModal'>Insert</button>
            <button id='avgPrice' type='button' class='btn btn-info padding'>Avg Price</button>
            <button id='avgMarket' type='button' class='btn btn-info padding'>Avg Market</button>
            <button id='ttlMarket' type='button' class='btn btn-info padding'>Total Market</button>
        </div>
        <div id='main'>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Coin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div id='inputs'>
                    <input type="hidden" id='id'>
                    Name: <input type='text' class='modalInput' id='updateName'><br>
                    Price: <input type='text' class='modalInput' id='updatePrice'><br>
                    Market Cap: <input type='text' class='modalInput' id='updateMarket'><br>
                    Website: <input type='text' class='modalInput' id='updateWebsite'><br>
                    Max Coins: <input type='text' class='modalInput' id='updateMax'><br>
                    In Circulation: <input type='text' class='modalInput' id='updateCirculation'><br>
                    Image: <input type='text' class='modalInput' id='updateImage'><br>
                    Algorithm:
                    <select class='modalInput' id='alg'>
                        <?=getOptions()?>
                    </select><br>
                    Type:
                    <select class='modalInput' id='type'>
                        <?=getTypeOptions()?>
                    </select>
                    <span id='error'></span>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id='update' type="button" class="btn btn-primary">Update</button>
                <button id='insert' type="button" class="btn btn-info">Insert</button>
              </div>
            </div>
          </div>
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
                });
            }
            function getInfo(coin, modal){
                $.ajax({
                    type: "POST",
                    url: "getInfo.php",
                    data: {coin: coin},
                    success: function(data){
                        var obj = $.parseJSON(data);
                        modal.find('.modal-body #id').val(obj['id']);
                        modal.find('.modal-body #updateName').val(obj['name']);
                        modal.find('.modal-body #updatePrice').val(obj['price']);
                        modal.find('.modal-body #updateMarket').val(obj['market_cap']);
                        modal.find('.modal-body #updateWebsite').val(obj['website']);
                        modal.find('.modal-body #updateMax').val(obj['max_coins']);
                        modal.find('.modal-body #updateCirculation').val(obj['in_circulation']);
                        modal.find('.modal-body #updateImage').val(obj['image']);
                        modal.find('.modal-body #alg').val(obj['alg']);
                        modal.find('.modal-body #type').val(obj['cointype']);
                        modal.find('.modal-body #error').html("");
                    }
                });
            }
            function clearInfo(modal){
                modal.find('.modal-body #updateName').val("");
                modal.find('.modal-body #updatePrice').val("");
                modal.find('.modal-body #updateMarket').val("");
                modal.find('.modal-body #updateWebsite').val("");
                modal.find('.modal-body #updateMax').val("");
                modal.find('.modal-body #updateCirculation').val("");
                modal.find('.modal-body #updateImage').val("");
                modal.find('.modal-body #error').html("");
            }
            function deleteCoin(id){
                $.ajax({
                    type: "POST",
                    url: "deleteCoin.php",
                    data: {id: id},
                    success: function(){
                        alert("Coin deleted successfully");
                        location.reload();
                    }
                });
            }
            function allFilled(){
                if($("#updateName").val() == "" || $("#updatePrice").val() == "" || $("#updateMarket").val() == "" ||
                    $("#updateWebsite").val() == "" || $("#updateCirculation").val() == "" ||
                    $("#updateImage").val() == ""){
                    return false;
                }
                return true;
            }
            function dbAction(action){
                $.ajax({
                    type: "POST",
                    url: action + "Coin.php",
                    data: {name: $("#updateName").val(), price: $("#updatePrice").val(),
                    market: $("#updateMarket").val(), website: $("#updateWebsite").val(),
                    max: $("#updateMax").val(), circulation: $("#updateCirculation").val(),
                    image: $("#updateImage").val(), alg: $("#alg").children(":selected").attr("id"), 
                    cointype: $("#type").children(":selected").attr("id"), id: $("#id").val()},
                    success: function(){
                        alert(action + " successful");
                        location.reload();
                    }
                });
            }
            loadItems();
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
                $('#myModal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget); 
                    var coin = button.data('whatever');
                    if(coin){
                        var obj = getInfo(coin, $(this));   
                    }
                    else{
                        clearInfo($(this));
                    }
                });
                $(document).on("click","#delete", function(){
                    var coin = $(this).data('name');
                    var id = $(this).data('id');
                    if(confirm("Are you sure you would like to delete " + coin) == true){
                        deleteCoin(id);
                    }
                });
                $(document).on("click", "#insert", function(){
                    if(!allFilled()){
                        $("#error").html("All fields need to be filled");
                        return;
                    }
                    dbAction("insert");
                    $("#myModal").modal("toggle");
                });
                $(document).on("click", "#update", function(){
                    if(!allFilled()){
                        $("#error").html("All fields need to be filled");
                        return;
                    }
                    dbAction("update");
                    $("#myModal").modal("toggle");
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
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>
</html>