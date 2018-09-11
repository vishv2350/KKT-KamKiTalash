     <?php
 // News display
include "../log/config/conn.php";
//   SELECT DISTINCT class FROM student
$sql="SELECT * FROM news GROUP BY  MONTH(date),YEAR(date) ORDER BY (date) DESC;";
//   $sql25 = "SELECT DISTINCT date,title FROM news";
    $result = $conn->query($sql);
   ?>
 <!DOCTYPE html>
 <head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 </head>
<div class="container">
    <h5>Latest News/Notices/Archive @ CIC</h5>
        <div class="panel-group" id="accordion">
   <?php
    while($row = $result->fetch_assoc()) {
     $id = $row["sr"];
     $xpdf = $row["pdf_file"];
             date_default_timezone_set('Asia/Kolkata');
             $xdate = strtotime($row["date"]);
             $DisplayDate=date("j M Y", $xdate);
             $today = date("Y-m-d");
             $ydate = date("Y-m-d", $xdate);
             $btoday = DateTime::createFromFormat('Y-m-d', $today);
             $btoday->modify('-10 day');
             $btoday = $btoday->format('Y-m-d');
       //      echo '<font size=4>' . date("M Y", $xdate) . '</font><br>';
            $xmonth=date("m", $xdate);
            $xyear=date("Y", $xdate);
            $xhref='#'.$xmonth.$xyear;
            $yhref=$xmonth.$xyear;
            $Vdate=date("M Y", $xdate);
//            echo $xmonth."<br>";
//            echo $xyear."<br>";
?>
        <div class="panel panel-default">
            <a data-toggle="collapse" href="<?php echo $xhref; ?>">
                <div class="panel-heading">
                    <h4 class="panel-title">
                       <span style="color: #C200C2"><?php echo $Vdate; ?></span>
                    </h4>
                </div>
            </a>
            <div id="<?php echo $yhref; ?>" class="panel-collapse collapse" data-parent="#accordion">
                <ul class="list-group">
                <?php
                 $sql2="SELECT * FROM news where MONTH(date)=$xmonth and YEAR(date)=$xyear ORDER BY (date) DESC;";
                  $result2 = $conn->query($sql2);
                     while($row = $result2->fetch_assoc()) {
                        if ( !empty($xpdf)) {
                        $xfile = "http://ducic.ac.in/cdn/ducic/NewsEventsCommons/" . $row["pdf_file"];
                                        }
                            else {
                                    $xfile = $row["detail_news"];
                                }
                                $xdate = strtotime($row["date"]);
                                $DisplayDate=date("j M Y", $xdate);
                                ?>
                                      <li class="list-group-item">
                                      <a href='<?php echo $xfile; ?>' target='_blank'><span style="color: #D4D4D4"><?php echo $DisplayDate." - "; ?></span><?php echo $row["title"]; ?></a>
                                      </li>
                                      <?php
                                        }
                  ?>
                                 </ul>
                                 </div>
                                  <!--<div class="panel-footer"><hr></div> -->
                                 </div>
                  <?php
           }
           ?>
                </div>
</div>
