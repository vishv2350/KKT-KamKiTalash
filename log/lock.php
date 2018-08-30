<?php
include('config/conn_mysql1.php');
session_start();
$user_check=$_SESSION['user_id'];
$ses_sql=mysql_query("select * from user where user_id='$user_ud' ");
$row=mysql_fetch_array($ses_sql);
$login_session=$row['user_id'];
if(!isset($login_session))
{
header("Location: index.php");
}
?>