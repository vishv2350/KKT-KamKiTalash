<?php
function Project_form_submitted() {
$Pid = $Pname = $Pmentor = $Pfile = $Pcategory = "";
date_default_timezone_set('Asia/Kolkata');
$iddate=date("dmY");
echo "आज का दिन :".$iddate."<BR />";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
        $Pname      = test_input($_POST["element_4_1"]); //Name
        $Pmentor    = test_input($_POST["element_4_2"]);
        $Pfile      = test_input($_POST["element_6"]);
        $mobile     = test_input($_POST["element_5"]);
        $Rid=0;
        include ("config/conn.php");
                $sql = "SELECT * FROM kkt WHERE detail_news='$mobile' LIMIT 1";
                $res = $conn->query($sql);
                while($row = $res->fetch_assoc()) {  $Rid=$row["sr"];    }
                if ($Rid>0)
                {
                 echo '<SPAN style="color: #CC0000">आप का मोबाइल डाटा पहले से सेव है </SPAN><BR />';
                 echo '<STRONG>आप का  मोबाइल नंबर '.$mobile.' है</STRONG><BR />';
                 echo 'KKT - काम की तलाश मैं हम आप की सहायता  करंगे - धन्यवाद';
                 echo '<script>alert("आप का मोबाइल नंबर '.$mobile.' है , आप का मोबाइल नंबर पहले से सेव है , नया मोबाइल नंबर सेव करें")</script>';
                    return;
                }
                $sql = "SELECT sr FROM kkt ORDER BY sr DESC LIMIT 1";
                $res = $conn->query($sql);
                while($row = $res->fetch_assoc()) {  $Rid=$row["sr"];    }
                $Rid=$Rid+1;
                $Pid='KKT-'.$iddate."-".$Rid;
//    $Pid        = 'KKT-0001'; // Short_News


    $PC  = array(24);
    for ($x = 1; $x <= 24; $x++)
        {
        $xelement='element_3_'.$x;
        $PC[$x]  = test_input($_POST[$xelement]);
    //    echo "The number is: $x <br>";
        $Pcategory=$Pcategory.':'.$PC[$x];
     //   echo $xelement.'   ->>  '. $PC[$x];
      //  echo "<br />";
        }
        echo  "आप का नाम है :".$Pname;
  //      echo "<br />";
     //   echo  $Pmentor;
   //     echo "<br />";
 //       echo  $Pfile.' Size: ';
        $filesize=($_FILES["fileToUpload"]["size"])/1000/1000 ;
        //echo $filesize." MB";
       // echo "<br />";
     //   echo  $Pcategory;
        echo "<br />";
        $sql = "INSERT INTO kkt ( title,pdf_file,author,short_news,detail_news,`date`,atype)
                VALUES('$Pname','$Pfile','$Pmentor','$Pid','$mobile',now(),'$Pcategory') ";
        include ("config/conn.php");
        $res = $conn->query($sql);
        if ($res) {
        echo 'आप का डाटा सेव हो गया है <BR />';
        echo 'आप का पहचान नंबर '.$Pid.' है <BR />';
        echo 'कृपया पहचान नंबर को किसी सुरक्षित जगह पर लिख लें<BR />';
        echo 'KKT - काम की तलाश मैं हम आप की सहायता  करंगे - धन्यवाद';
        echo '<script>alert("आप का पहचान नंबर '.$Pid.' है ,कृपया पहचान नंबर को किसी सुरक्षित जगह पर लिख लें")</script>';
       //     file_upload();
          }
        else {
        echo 'Error inserting record..Check Following :';
        echo "<br />";
        echo $res;
        echo "<br />";
        echo $sql;
        echo "<br />";
        echo  mysql_error($res);
        echo  mysql_error();
        }

}

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
   // return preg_match('/^[0-9]{10}+$/', $mobile);

}
function file_upload(){
$target_dir = "../cdn/ducic/Projects/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$pdfFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if file already exists
if (file_exists($target_file)) {
    echo "Same Name/File already exists.";
    $uploadOk = 0;
}
// Check file size
$filesize=($_FILES["fileToUpload"]["size"])/1000/1000 ;
if ($filesize>9.30) {
    echo "Your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($pdfFileType != "pdf" ) {
    echo "File is not a PDF file type.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "There was an error uploading your file.";
    }
}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>KKT - काम की तलाश</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body id="main_body"  style="background-color: #99CCFF">

   <!--	<img id="top" src="top.png" alt="">-->
    <?php Project_form_submitted(); ?>
	<div id="form_container">

		<h1><a>KKT - काम की तलाश</a></h1>
<?php
if ($_SERVER["REQUEST_METHOD"] <> "POST")
{
?>
		<form id="form_21150"  class="appnitro" enctype="multipart/form-data" method="post" action=""  style="background-color: 1185cae5">
					<div class="form_description">
			<h2>KKT - काम की तलाश</h2>
			<p>हम आप को केवल काम देने वालों से लिंक करवायेंग, <BR />हम किसी को भी नौकरी दिलवाने की गौरानिटी/वचन नहीं देते !</p>
		</div>
			<ul>

        <li id="li_1" >
		<label class="description" for="element_5">आप का मोबाइल नंबर  </label>
		<div>
			<input id="element_5" name="element_5" class="element number" type="number" maxlength="10" value="" required/>
		</div><p class="guidelines" id="guide_5"><small>अपना  मोबाइल नंबर डालें</small></p>
		</li>
	    <li id="li_2">
		<label class="description" for="element_4">आप का नाम </label>
		<span>
		<input id="element_4_1" name= "element_4_1" class="element text" maxlength="50" value="" required/>
		</span><p class="guidelines" id="guide_4"><small>अपना नाम टाइप करें</small></p>
		</li>
        <li id="li_3" >
		<label class="description" for="element_6">आप ने पहले कभी काम किया है ? </label>
		<span>
			<input id="element_6_1" name="element_6" class="element radio" type="radio" value="Yes" checked="checked"/>
            <label class="choice" for="element_6_1">हाँ, किया है</label>
            <input id="element_6_2" name="element_6" class="element radio" type="radio" value="No" />
            <label class="choice" for="element_6_2">नहीं, किया है</label>

		</span><p class="guidelines" id="guide_6"><small>हाँ या नहीं पर क्लिक करें </small></p>
		</li>

        <li id="li_4" >
		<label class="description" for="element_3">आप क्या-क्या जानते हैं ? </label>
        <span>
<div class="container">
<div class="row">
<div class="col-sm-2">

<input id="element_3_1" name="element_3_1" class="element checkbox" type="checkbox" value="A" checked="checked"/><label class="choice">A. सिलाई</label>
<input id="element_3_2" name="element_3_2" class="element checkbox" type="checkbox" value="B" /><label class="choice">B. कड़ाई</label>
<input id="element_3_3" name="element_3_3" class="element checkbox" type="checkbox" value="C" /><label class="choice">C. बुनाई</label>
<input id="element_3_4" name="element_3_4" class="element checkbox" type="checkbox" value="D" /><label class="choice">D. सिलाई मास्टर</label>
<input id="element_3_5" name="element_3_5" class="element checkbox" type="checkbox" value="E" /><label class="choice">E. मशीन मास्टर</label>
<input id="element_3_6" name="element_3_6" class="element checkbox" type="checkbox" value="F" /><label class="choice">F. कटिंग मास्टर</label>
<input id="element_3_7" name="element_3_7" class="element checkbox" type="checkbox" value="G" /><label class="choice">G. पेट्रनमास्टर</label>
<input id="element_3_8" name="element_3_8" class="element checkbox" type="checkbox" value="H" /><label class="choice">H. लाइन मास्टर </label>
</div>
<div class="col-sm-2">
<input id="element_3_9" name="element_3_9"   class="element checkbox" type="checkbox" value="I" /><label class="choice">I. सिंगर मास्टर </label>
<input id="element_3_10" name="element_3_10" class="element checkbox" type="checkbox" value="J" /><label class="choice">J. ओवर लॉक मास्टर </label>
<input id="element_3_11" name="element_3_11" class="element checkbox" type="checkbox" value="K" /><label class="choice">K. डेनिम वाशिंग मास्टर </label>
<input id="element_3_12" name="element_3_12" class="element checkbox" type="checkbox" value="L" /><label class="choice">L. लेयरमैन</label>
<input id="element_3_13" name="element_3_13" class="element checkbox" type="checkbox" value="M" /><label class="choice">M. ट्रेड कट्टर</label>
<input id="element_3_14" name="element_3_14" class="element checkbox" type="checkbox" value="N" /><label class="choice">N. चेकर</label>
<input id="element_3_15" name="element_3_15" class="element checkbox" type="checkbox" value="O" /><label class="choice">O. पैकिंग मैन</label>
<input id="element_3_16" name="element_3_16" class="element checkbox" type="checkbox" value="P" /><label class="choice">P. गारमेंट हेल्पर</label>
<input id="element_3_17" name="element_3_17" class="element checkbox" type="checkbox" value="Q" /><label class="choice">Q. फ्लैट मैन  </label>

</div>
<div class="col-sm-2">
    <BR /><BR />
<input id="element_3_18" name="element_3_18" class="element checkbox" type="checkbox" value="R" /><label class="choice">R. बेल्ट मशनिस्ट </label>
<input id="element_3_19" name="element_3_19" class="element checkbox" type="checkbox" value="S" /><label class="choice">S. आल्टर मैन</label>
<input id="element_3_20" name="element_3_20" class="element checkbox" type="checkbox" value="T" /><label class="choice">T. लूप कटर मशीन</label>
<input id="element_3_21" name="element_3_21" class="element checkbox" type="checkbox" value="U" /><label class="choice">U. बाटिकमशीन</label>
<input id="element_3_22" name="element_3_22" class="element checkbox" type="checkbox" value="V" /><label class="choice">V. एलेट एंड कार्गो मशीन</label>
<input id="element_3_23" name="element_3_23" class="element checkbox" type="checkbox" value="W" /><label class="choice">W. जैक जोक्कीमशीन</label>
<input id="element_3_24" name="element_3_24" class="element checkbox" type="checkbox" value="X" /><label class="choice">X. अन्य</label>
</div>
</div>
</div>
<p class="guidelines" id="guide_3"><small>जोभी जानते हैं उन सभी पर क्लिक कर दें !</small></p>
</span>
		</li>

					<li class="buttons">
				<input id="saveForm" class="button_text" type="submit" name="submit" value="सेव करें" />
		</li>
			</ul>
		</form>
<?php
}
?>
		<div id="footer">
			<P style="text-align: left">आप के लिए आप के साथ <a href="">KKT - काम की तलाश</a></P>
		</div>
	</div>
  <!--	<img id="bottom" src="bottom.png" alt="">-->
	</body>
</html>