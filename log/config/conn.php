


<?php

$servername = "localhost";
$username = "ducicaci";
$password = "ThisPasswordIsHavingEntropy40";
$dbname = "ducicaci_blitzkreig";




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 
else
{
}
?>
