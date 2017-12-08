<?php


include '../finalDbConnection.php';
$conn = getDatabaseConnection();

$namedParameters = array();

$sql = "UPDATE coins SET 
        name=:name, 
        price=:price, 
        website=:website, 
        max_coins=:max, 
        market_cap= :market, 
        in_circulation=:circulation, 
        image=:image, 
        algId=:alg, 
        coinTypeId=:cointype
        WHERE id=:id";
        
$namedParameters[":name"] = $_POST['name'];
$namedParameters[":price"] = $_POST['price'];
$namedParameters[":website"] = $_POST['website'];
$namedParameters[":max"] = $_POST['max'];
$namedParameters[":market"] = $_POST['market'];
$namedParameters[":circulation"] = $_POST['circulation'];
$namedParameters[":image"] = $_POST['image'];
$namedParameters[":alg"] = $_POST['alg'];
$namedParameters[":cointype"] = $_POST['cointype'];
$namedParameters[":id"] = $_POST['id'];

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);

echo "success";

?>
