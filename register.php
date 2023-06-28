<?php
require("connection.php");

$username = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
// $token = $_POST['token'];
$birthdate = $_POST['birthdate'];
$address = $_POST['address'];
$password = $_POST['password'];

// $query = "INSERT INTO user(name, phone, email, birthday, tokenId, address, password) VALUES ('$username', '$phone', '$email', '$birthdate', '$token', '$address', '$password')";
$query = "INSERT INTO uuser(name, phone, email, birthday, address, password) VALUES ('$username', '$phone', '$email', '$birthdate', '$address', '$password')";

echo $query;

if (mysqli_query($con, $query)) {
    header("Location: login.html");
    exit();
} else {
    echo "Error...";
};


?>