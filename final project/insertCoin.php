<?php


include '../finalDbConnection.php';
$conn = getDatabaseConnection();

$namedParameters = array();

$sql = "INSERT INTO coins (name, price, website, max_coins, market_cap, in_circulation, image, algId, coinTypeId)
        VALUES (:name, :price, :website, :max, :market, :circulation, :image, :alg, :cointype)";
        
$namedParameters[":name"] = $_POST['name'];
$namedParameters[":price"] = $_POST['price'];
$namedParameters[":website"] = $_POST['website'];
$namedParameters[":max"] = $_POST['max'];
$namedParameters[":market"] = $_POST['market'];
$namedParameters[":circulation"] = $_POST['circulation'];
$namedParameters[":image"] = $_POST['image'];
$namedParameters[":alg"] = $_POST['alg'];
$namedParameters[":cointype"] = $_POST['cointype'];

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);

echo "success";

?>
