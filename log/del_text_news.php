<?php session_start();
$GLOBALS['xusername']=$_SESSION["favcolor"];
$GLOBALS['xuserid']=$_SESSION["favanimal"];
//echo 'Session ID: '.$_SESSION['user_id'];
//echo '<br>';
//echo 'Session Pass: '.$_SESSION['user_pass'];
include("index.php");
if(!$_SESSION['user_id'])
{
?>
<script>
            alert("Login First...");
			window.location="index.php";
</script>
<?php
}
?>
<?php include"config/conn.php";?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CIC&nbsp;DU CIC Delete Text News </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="">


      <!-- Content Wrapper. Contains page content -->
      <div class="">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            DU CIC Delete Text News
            <small></small>
          </h1>

        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-6">
              <div class="box box-info">
 <?php
$sql = "SELECT * FROM news";
$result =  $conn->query($sql);


?>
       <br/>   <ol>
<?
         while($row = $result->fetch_assoc())

	{?>
<div class="row">
<div class="col-md-5"></div>
	 <div class="col-md-9">
         <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <?php
        $title=$row["title"];
          $file="../cdn/ducic/NewsEventsCommons/".$row["pdf_file"];
          $type=$row["detail_news"];
if (!empty($type))
{
           echo "<a href='".$type."'>".$title."</a><br> Link--> ".$type."</li>";
 }
 else {
           echo "<a href='".$file."'>".$title."</a><br> File--> ".$file."</li>";
 }
         ?>
</div>
<div class="col-md-2"> <a href="?sr=<?php echo $row["sr"]; ?>"
  onclick="return confirm('Are you sure you want Delete?');" class="btn btn-primary" > Delete <a/></div>
</div><hr/>
		<?
    }
    ?>
                <div class="box-body pad">
<?php
if(!empty($_GET['sr']))
	{
		$sr=$_GET["sr"];
		$sql="DELETE FROM `news` WHERE sr='$sr'";
	  $res =  $conn->query($sql);
   		if($res)
		{?>
			<script>
                             alert("news Deleted Successfully");
                              window.location="https://ducic.ac.in/log/del_text_news.php";
                         </script><?
// For Logbook Entry...
$xnewsid=$sr;
echo "DeletedNewsID:".$sr;
include "config/conn_mysql1.php";
$y=$GLOBALS['xuserid'];
$z=$GLOBALS['xusername'];
$xtype='DelNews';
    $sql = "INSERT INTO logbook ( user_id,user_name,timestamp,remarks,news_id,type)
                          VALUES('$y' , '$z' , now(),'$title','$xnewsid','$xtype') ";
    $result =  $conn->query($sql);
if ($result)
{
echo 'Record added in logbook';
}
else { 'Record not added in logbook';}
         // Some data for the message
  $mailTo = "rajneesh2350@yahoo.co.in";
  $mailFrom = "rajneesh2350@gmail.com";
  $mailFromName = "ducic.ac.in NEWS server";
  $mailSubject = "News Deleted :".$title;
  $linkpage1="  File Link:".$xpagelink;
  $mailMessage = "News Deleted...".$sr;
// Send mail
  mail($mailTo, $mailSubject, $mailMessage, "From: $mailFromName <$mailFrom>\r\n");
  }
  else {
    echo 'Error in inserting Record';
  }
}
// Logbook End
?>

                </div>
              </div><!-- /.box -->
            </div><!-- /.col-->
          </div><!-- ./row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
  </body>
</html>