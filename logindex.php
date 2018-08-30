<?php session_start();
if(!$_SESSION['user_id'])
{
$showmenu=false;
include("rajheader.php");
$GLOBALS['xusername']=$_SESSION["favcolor"];
$GLOBALS['xuserid']=$_SESSION["favanimal"];
}
else{
//echo "Welcome !" ;
$GLOBALS['xusername']=$_SESSION["favcolor"];
$GLOBALS['xuserid']=$_SESSION["favanimal"];
include("rajheader.php");
$showmenu=true;
 }
?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<html>
<div class="table-responsive">
<table class='table'>
    <tr>
        <td><span id="liveclock"></span> </td>
        <td style="text-align: center; vertical-align: middle;">
            <img src="cicadminportal.gif" title="CIC AdminPortal">
        </td>
    </tr>
</table>
<hr style="width: 100%; height: 2px">
</div>
<h1>&nbsp;</h1>
 <title>CIC AdminPortal</title>
    <head>
        <style>
<!--
.styling{
background-color:black;
color:lime;
font: bold 18px MS Sans Serif;
padding: 3px;
}
-->
</style>
    </head>
<body onLoad="show5()">


<style>
body {
    background-image: url("http://www.w3schools.com/css/gradient_bg.png");
    background-repeat: repeat-x;
}
</style>
    <div id="hamburgericonmenuwrapper">
    <div id="hamburgerui">
    <ul>
 <?php
if ($showmenu==true) { echo '<li><a href="http://www.ducic.ac.in/log/logout.php"><span class="glyphicon glyphicon-log-out"></span> LogOUT</a></li>'; }
if ($showmenu==false) { echo '<li><a href="http://www.ducic.ac.in/log/menu.php"><span class="glyphicon glyphicon-log-in"></span> LogIN</a></li>'; }
?>
    <li><a href="#"><span id="navtoggler"></span></a></li>
    </ul>
    </div>
<?php
if ($showmenu==true) {
    ?>
    <nav id="fullscreenmenu">
    <ul>
<?php
$othermenu=$GLOBALS['xusername'];
if($othermenu=='SysAdmin')
{
?>
            <li><a href="http://www.ducic.ac.in/log/add_text_news.php">Add News</a></li>
            <li><a href="http://www.ducic.ac.in/log/del_text_news.php">Delete News</a></li>
            <li><a href="http://www.ducic.ac.in/log/add_event.php">Add Events</a></li>
            <li><a href="http://www.ducic.ac.in/log/del_event.php">Delete Events</a></li>
            <li><a href="http://www.ducic.ac.in/log/Project.php">Add Project</a></li>
            <li><a href="http://www.ducic.ac.in/log/add_highlight.php">Add Highlights</a></li>
            <li><a href="http://www.ducic.ac.in/log/del_highlight.php">Delete Highlights</a></li>
            <li><a href="http://www.ducic.ac.in/log/add_downloadfiles.php">Add Downloadable File[s]</a></li>
            <li><a href="http://www.ducic.ac.in/log/del_downloadfiles.php">Delete Downloadable File[s]</a></li>
<?php
            }
?>
            <li><a href="http://www.ducic.ac.in/log/booking1.php">Book Seminar Hall  -1st Floor</a></li>
            <li><a href="http://www.ducic.ac.in/log/booking2.php">Book Committee Room-2nd Floor</a></li>
            <li><a href="http://www.ducic.ac.in/log/booking3.php">Book Committee Room-1st Floor</a></li>
            <li><a href="http://www.ducic.ac.in/log/InternShipPrint.php">InternShip Transection[s]</a></li>
    </ul>
    </nav>
    <?php
}
?>

</div>
    </body>
</html>

<script language="JavaScript">
function show5(){
 if (!document.layers&&!document.all&&!document.getElementById)
 return
 var Digital=new Date()
 var hours=Digital.getHours()
 var minutes=Digital.getMinutes()
 var seconds=Digital.getSeconds()
 var dn="AM"
 if (hours>12){
 dn="PM"
 hours=hours-12
 }
 if (hours==0)
 hours=12
 if (minutes<=9)
 minutes="0"+minutes
 if (seconds<=9)
 seconds="0"+seconds
//change font size here to your desire
myclock="<font size='5' face='Arial' ><b><font size='1'></font></br>"+hours+":"+minutes+":"
 +seconds+" "+dn+"</b></font>"
if (document.layers){
document.layers.liveclock.document.write(myclock)
document.layers.liveclock.document.close()
}
else if (document.all)
liveclock.innerHTML=myclock
else if (document.getElementById)
document.getElementById("liveclock").innerHTML=myclock
setTimeout("show5()",1000)
 }

//-->
</script>