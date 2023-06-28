<?php
require("connection.php");
require("functions.php");
$user = returnUser();
$startTime = $_POST['startTime'];
$endTime = $_POST['endTime'];
$name = $_POST['name'];
$descreption = $_POST['description'];
$startingPrice = $_POST['startingPrice'];
$photo = $_POST['photo'];
$category = $_POST['category'];
$userId = $_SESSION['userId'];

if($startTime > $endTime) {
    return header("Location: new_product.php?error=\"Start time is later than end time.\"");
};

$query = "INSERT INTO item (name, descreption, startingPrice, photo, category, startTime, endTime, isApproved, listedBy) VALUES ('$name', '$descreption', '$startingPrice', '$photo', '$category', '$startTime', '$endTime', 0, $userId)";

runQuery($query);
header("Location: index.php");


// echo $result;

?>