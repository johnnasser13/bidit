<?php
require("functions.php");

$d = getCurrentDate();

if(hasBegun("2023-04-20")) echo "Yes.";
else echo "No.";

echo $d;

?>