<?php
   echo "Data Base CONFIG - OPEN Successfully...";
$mysql_hostname = "localhost";
$mysql_user = "ducicaci";
$mysql_password = "ThisPasswordIsHavingEntropy40";
$mysql_database = "ducicaci_blitzkreig";

$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password)
or die("Opps some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Opps some thing went wrong");

   if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    else {
echo "Connection Done";
    }



?>
