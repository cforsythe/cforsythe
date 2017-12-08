<?php
include '../finalDbConnection.php';
$conn = getDatabaseConnection();
session_start();

$namedParameters = array();
$sql = "SELECT * from `coins`
        NATURAL JOIN `cointypes`
        NATURAL JOIN `algorithm`
        WHERE 1";
if(isset($_POST['hash'])){
    if($_POST['hash'] != "Select One"){
        $sql .= " AND alg = :algorithm";
        $namedParameters[":algorithm"] = $_POST['hash'];
    }
}
if(isset($_POST['search'])){
    $sql .= " AND name LIKE :search";
    $namedParameters[':search'] = "%" . $_POST['search'] . "%";
}
if(isset($_POST['sort'])){
    if($_POST['sort'] == 'Ascending'){
        $sql .= " ORDER BY price ASC";
    }
    else{
        $sql .= " ORDER BY price DESC";
    }
}
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(!isset($_SESSION['username'])){
    foreach($record as $coin){
        echo "<div id=coin>";
        echo "<div id='coinwrapper'>";
        echo "<div id='coininfo'><h3 id='coinname'>" . $coin['name'] . "</h3><br>";
        echo "<img id='coinpic' src='" . $coin['image'] . "' </img></div>";
        echo "<div id='pricewrapper'><div id='pricediv'><span id='bold'> Price: </span> $"  . number_format($coin['price'], 2) . "<br>";
        echo "<span id='bold'> Market Cap: </span> $" . number_format($coin['market_cap']). "<br>";
        echo "<span id='bold'> Max Coins: </span>" . number_format($coin['max_coins']) . "<br>";
        echo "<span id='bold'> In Circulation: </span>" . number_format($coin['in_circulation']) . "<br>";
        echo "<span id='bold'> Coin Type: </span>" . $coin['cointype'] . "<br>";
        echo "<span id='bold'> Hash Algorithm: </span>" . $coin['alg'] . "<br>";
        echo "<a target='_blank' href='" . $coin['website'] . "'>Website</a>"; 
        echo "</div></div></div></div>";
    }
}
else{
    foreach($record as $coin){
        echo "<div id=coin>";
        echo "<div id='coinwrapper'>";
        echo "<div id='coininfo'><h3 id='coinname'>" . $coin['name'] . "</h3><br>";
        echo "<img id='coinpic' src='" . $coin['image'] . "' </img><br>";
        echo "<button type='button' class='btn btn-success padding' data-toggle='modal' data-target='#myModal' data-whatever='" . $coin['name'] . "'>Update</button>";
        echo "<button type='button' class='btn btn-danger padding' id='delete' data-id='" . $coin['id'] . "'data-name='" . $coin['name'] . "'>Delete " . $coin['name'] . "</button></div>"; 
        echo "<div id='pricewrapper'><div id='pricedivAdmin'><span id='bold'> Price: </span> $"  . number_format($coin['price'], 2) . "<br>";
        echo "<span id='bold'> Market Cap: </span> $" . number_format($coin['market_cap']). "<br>";
        echo "<span id='bold'> Max Coins: </span>" . number_format($coin['max_coins']) . "<br>";
        echo "<span id='bold'> In Circulation: </span>" . number_format($coin['in_circulation']) . "<br>";
        echo "<span id='bold'> Coin Type: </span>" . $coin['cointype'] . "<br>";
        echo "<span id='bold'> Hash Algorithm: </span>" . $coin['alg'] . "<br>";
        echo "<a target='_blank' href='" . $coin['website'] . "'>Website</a>"; 
        echo "</div></div></div></div>";
    }
}
?>