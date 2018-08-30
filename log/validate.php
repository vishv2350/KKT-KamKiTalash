<?php
session_start();
include('config/conn.php');
$username=$_POST['username'];
$password=$_POST['password'];
$sql = "SELECT * FROM users WHERE username='".$username."'and password= '".$password."'" or die(mysql_error());
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
 			 $_SESSION["user_id"] = true ;
            $_SESSION["favcolor"] = $row["username"];
           $_SESSION["favanimal"] = $row["user_id"];
//echo 'Session ID:'.$_SESSION['user_id'];
//echo 'Session Pass:'.$_SESSION['favcolor'];
//echo 'Session Pass:'.$_SESSION['favanimal'];

 			 ?>
	 <script>
			window.location="index.php";
   </script>
   <?php
   }
 } else {
 $_SESSION['user_id']=false;
	?>
	 <script>
            alert("Incorrect Login/Password...");
 			window.location="index.php";
   </script>
   <?php
}
?>