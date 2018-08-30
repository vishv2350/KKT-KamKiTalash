<?php

$mysqli_hostname = "localhost";
$mysqli_user = "ducicaci";
$mysqli_password = "ThisPasswordIsHavingEntropy40";
$mysqli_database = "ducicaci_blitzkreig";

//$servername = "localhost";
//$username = "ducicaci";
//$password = "ThisPasswordIsHavingEntropy40";
//$dbname = "ducicaci_blitzkreig";

$bd = mysqli_connect($mysqli_hostname, $mysqli_user, $mysqli_password,$mysqli_database)
or die("Opps some thing went wrong");
//mysqli_select_db($mysqli_database, $bd) or die("Opps some thing went wrong");
// Check connection
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    else {
//    echo "Connection Done"; 
    }
?>
