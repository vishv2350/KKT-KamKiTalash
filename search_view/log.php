<!doctype html>
<html lang="en">
<?php session_start();
$GLOBALS['xusername']=$_SESSION["favcolor"];
$GLOBALS['xuserid']=$_SESSION["favanimal"];
//echo 'Session ID: '.$_SESSION['user_id'];
//echo '<br>';
//echo 'Session Pass: '.$_SESSION['user_pass'];
include("http://www.ducic.ac.in/kkt/log/index.php");
if(!$_SESSION['user_id'])
{
    header("Location: http://www.ducic.ac.in/kkt/log/index.php"); /* Redirect browser */
exit();
?>

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
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/kkt_logo.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>KKT Search</title>

	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/fresh-bootstrap-table.css" rel="stylesheet" />
     
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        
</head>
<body>

<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                                
                <div class="fresh-table full-color-blue">
                <!--    Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange
                        Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange

                    <div class="toolbar"  >
                        <button id="alertBtn" class="btn btn-default">Alert</button>
                    </div>

                -->

                    <table id="fresh-table" class="table">
                        <thead>
                            <th data-field="short_news">KKT-ID</th>
                            <th data-field="detail_news">Mobile</th>
                        	<th data-field="title" data-sortable="true">Name</th>
                            <th data-field="pdf_file" data-sortable="true">Skilled</th>
                        	<th data-field="date" data-sortable="true">Date</th>
                        	<th data-field="fee">Fee Paid</th>
                        	<th data-field="atype" data-sortable="true">Job Type</th>
<!--                       	<th data-field="actions" data-formatter="operateFormatter" data-events="operateEvents">Actions</th>-->
                        </thead>
                        <tbody>
<?php
//$sql = "INSERT INTO kkt ( title,pdf_file,author,short_news,detail_news,`date`,atype)
//                VALUES('$Pname','$Pfile','$Pmentor','$Pid','$mobile',now(),'$Pcategory') ";
include ("config/conn.php");
                $sql = "SELECT * FROM kkt";
                $res = $conn->query($sql);
                while($row = $res->fetch_assoc()) {
//                $Rid=$row["sr"];

                           echo "<tr>";
                           echo "<td>".$row["short_news"]."</td>";
                           echo "<td>".$row["detail_news"]."</td>";
                           echo "<td>".$row["title"]."</td>";
                           echo "<td>".$row["pdf_file"]."&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                           echo "<td>".$row["date"]."</td>";
                           echo "<td>".$row["fee"]."</td>";
                           echo "<td>".$row["atype"]."</td>";
//                           echo "<td></td>";
                           echo "</tr>";
                }
?>
                        </tbody>
                    </table>
                </div>
                
                
            </div>
        </div>
    </div>
</div>

</body>
    <script type="text/javascript" src="assets/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-table.js"></script>

    <script type="text/javascript">
        var $table = $('#fresh-table'),
            $alertBtn = $('#alertBtn'),
            full_screen = false;
            
        $().ready(function(){
            $table.bootstrapTable({
                toolbar: ".toolbar",

                showRefresh: false,
                search: true,
                showToggle: true,
                showColumns: true,
                pagination: false,
                striped: true,
                pageSize: 8,
                pageList: [8,10,25,50,100],
                
                formatShowingRows: function(pageFrom, pageTo, totalRows){
                    //do nothing here, we don't want to show the text "showing x of y from..." 
                },
                formatRecordsPerPage: function(pageNumber){
                    return pageNumber + " rows visible";
                },
                icons: {
                    refresh: 'fa fa-refresh',
                    toggle: 'fa fa-th-list',
                    columns: 'fa fa-columns',
                    detailOpen: 'fa fa-plus-circle',
                    detailClose: 'fa fa-minus-circle'
                }
            });
            
                        
            
            $(window).resize(function () {
                $table.bootstrapTable('resetView');
            });
    
            
            window.operateEvents = {
                'click .like': function (e, value, row, index) {
                    alert('You click like icon, row: ' + JSON.stringify(row));
                    console.log(value, row, index);
                },
                'click .edit': function (e, value, row, index) {
                    alert('You click edit icon, row: ' + JSON.stringify(row));
                    console.log(value, row, index);    
                },
                'click .remove': function (e, value, row, index) {
                    $table.bootstrapTable('remove', {
                        field: 'id',
                        values: [row.id]
                    });
            
                }
            };
            
            $alertBtn.click(function () {
                alert("You pressed on Alert");
            });
            
        });
            
    
        function operateFormatter(value, row, index) {
            return [
                '<a rel="tooltip" title="Like" class="table-action like" href="javascript:void(0)" title="Like">',
                    '<i class="fa fa-heart"></i>',
                '</a>',
                '<a rel="tooltip" title="Edit" class="table-action edit" href="javascript:void(0)" title="Edit">',
                    '<i class="fa fa-edit"></i>',
                '</a>',
                '<a rel="tooltip" title="Remove" class="table-action remove" href="javascript:void(0)" title="Remove">',
                    '<i class="fa fa-remove"></i>',
                '</a>'
            ].join('');
        }
    
            
    </script>
</html>