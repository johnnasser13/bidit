<?php
session_start();
require("connection.php");

$email = $_POST['email'];
$token = $_POST['token'];
$password = $_POST['password'];

$query = "SELECT * FROM uuser WHERE email = '$email' AND password = '$password' AND tokenId = '$token'";

	if($email=="mariammostafa@gmail.com" && $password=="246810") header("Location: admin_page.php");
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
	if (isset($_POST['remember'])){
                //set up cookie
                setcookie("email", $row['email'], time() + (86400 * 30)); 
                setcookie("password", $row['password'], time() + (86400 * 30)); 
            }
            while($row = mysqli_fetch_assoc($result)) $_SESSION['userId'] = $row['userId'];
    header("Location: index.php");
    exit();
} else {
    echo "Error...";
};

?>