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
else{
//echo   $_SESSION["favcolor"];
//echo  $_SESSION["favanimal"];
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CIC Portal</title>
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
  <body>
<style>
body {
    background-image: url("http://www.w3schools.com/css/gradient_bg.png");
    background-repeat: repeat-x;
}
</style>
    <div class="">


      <!-- Content Wrapper. Contains page content -->
      <div class="">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Text News
            <small></small>
          </h1>

        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-6">
              <div class="box box-info">
                <div class="box-header">

                  <!-- tools box -->
                  <div class="pull-right box-tools">

                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad">

<?php include "config/conn.php";?>
<form action="" method="post" enctype="multipart/form-data">
  <?php echo "$errorMsg";?>
News Title:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="title" type="text" size="100"/>
<br />
<br />
News Type:&nbsp;&nbsp;&nbsp;
<select name="atype" size="1">
<option value="Result">Result</option>
<option value="Notice">Notice</option>
<option value="News" selected="selected">News</option>
</select>
<br /><br />
Link Address:<input name="xpagelink" type="text" size="130"/>
<br /><br />

<table>
    <tr>
        <td>
Upload PDF File only :&nbsp;&nbsp;</td>
        <td><input type="file" name="xpdf" /> </td>
    </tr>
</table>

<br />
News Type :
<input type="submit" name="submit" value="Submit" />
</form>


<?php include "config/conn.php";?>
<?php
function string_limit_words($string, $word_limit) {
  $words = explode(' ', $string);
  return implode(' ', array_slice($words, 0, $word_limit));
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title =  test_input($_POST["title"]);
  $xpdf =basename($_FILES["xpdf"]["name"]);
  $xpagelink = test_input($_POST['xpagelink']);
  $xtype = test_input($_POST['atype']);

//$author=mysqli_real_escape_string($bd,$_POST['author']);
//$short_news=mysqli_real_escape_string($bd,$_POST['short_news']);
//$detail_news=mysqli_real_escape_string($bd,$_POST['detail_news']);

  $file_name = $_FILES['xpdf']['name'];
  $file_tmp = $_FILES['xpdf']['tmp_name'];
  $file_type = $_FILES['xpdf']['type'];
  $file_ext = 'pdf';
  $expensions = array("pdf");

  echo '<br /><br /><br />';
  echo 'News Title Inserted    :' . $title;
  echo '<br/>';
  echo 'News PDF File Uploaded :' . $file_name;
  echo '<br/>';
  echo 'News Page Link Inserted:' . $xpagelink;
  echo '<br/>';
  echo 'News Type              :' . $xtype;
  echo '<br/>';

  $sql = "INSERT INTO news ( title   , pdf_file     ,  detail_news,  atype,`date`)
                     VALUES('$title' , '$file_name' , '$xpagelink', '$xtype',  now()) ";
  include ("config/conn.php");
       $result = $conn->query($sql);

        if ($result) {
        echo 'Record inserted Successfully..';
           // file_upload();
          }
        else {
        echo 'Error inserting record..Check Following :';
        echo "<br />";
        echo $result;
        echo "<br />";
        echo $sql;
        echo "<br />";
        echo  mysql_error($res);
        echo  mysql_error();
        }

  if (!empty ($file_name)) {
    //echo "Have a good day!";
    move_uploaded_file($file_tmp, "../cdn/ducic/NewsEventsCommons/" . $file_name);
  }
  if (empty ($xpdf)) {
    echo "No File Uploaded";
    $file_name = '';
  }
  include "config/conn.php";
  $res = mysql_query($sql);

  if ($res) {
    echo 'Record inserted Successfully..';

// For Logbook Entry...
$sql = "SELECT sr FROM news ORDER BY sr DESC LIMIT 1;";
$result = $conn->query($sql);
     while($row = $result->fetch_assoc())
{
$xnewsid=$row['sr'];
}
echo "NewsID:".$xnewsid;
include "config/conn.php";
$y=$GLOBALS['xuserid'];
$z=$GLOBALS['xusername'];
$xtype='AddNews';
    $sql = "INSERT INTO logbook ( user_id,user_name,timestamp,remarks,news_id,type)
                          VALUES('$y' , '$z' , now(),'$title','$xnewsid','$xtype') ";
    $result = $conn->query($sql);
if ($result)
{
echo 'Record added in logbook';
 $mailTo = "rajneesh2350@yahoo.co.in";
  $mailFrom = "rajneesh2350@gmail.com";
  $mailFromName = "ducic.ac.in NEWS server";
  $mailSubject = "News Title Posted:".$title;
  $linkpage1="  File Link:".$xpagelink;
  $mailMessage = "PDF File : ../cdn/ducic/NewsEventsCommons/".$file_name.$linkpage1;
// Send mail
  mail($mailTo, $mailSubject, $mailMessage, "From: $mailFromName <$mailFrom>\r\n");
}
else { 'Record not added in logbook';}
         // Some data for the message
  $mailTo = "rajneesh2350@yahoo.co.in";
  $mailFrom = "rajneesh2350@gmail.com";
  $mailFromName = "ducic.ac.in NEWS server";
  $mailSubject = "News Title Posted:".$title;
  $linkpage1="  File Link:".$xpagelink;
  $mailMessage = "PDF File : ../cdn/ducic/NewsEventsCommons/".$file_name.$linkpage1;
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
