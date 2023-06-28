<?php 
ob_start(); 
require('functions.php');

$user = returnUser();

$itemid = $_GET['id'];
$descreption = $_POST['comments'];
$userid = $user['userId'];

$query = "INSERT INTO poll (reportedBy, reportedItem, descreption) VALUES($userid, $itemid, '$descreption')";
echo $query;
runQuery($query);

header("Location: product_page.php?id=$itemid");


?>