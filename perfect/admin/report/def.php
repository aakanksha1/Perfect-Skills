<?php 
//include '../includes/check_user.php'; 
//include '../includes/check_reply.php';
session_start();
if (isset($_GET['sid'])) {
include '../../database/config.php';
$exam_id = $_GET['sid'];
    $_SESSION["sid"] = $exam_id;
$sql = "SELECT * FROM tbl_assessment_records WHERE exam_id = '$exam_id'";
$result = $conn->query($sql);
    
if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
    $exam_name = $row['exam_name'];
    $idhere = $row['exam_id'];
       
    }
    
} else {
}
$sql1 = "SELECT * FROM tbl_examinations WHERE exam_id = '$exam_id'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {

    while($row1 = $result1->fetch_assoc()) {
        $exam_name1 = $row1['exam_name'];
        $exam_duration = $row1['duration'];
        $exam_date  =$row1['date'];
    }
} else {
}
$conn->close();
}else{
// header("location:./");	
echo "hey";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- css files -->
<link rel="stylesheet" href="css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
<link rel="stylesheet" href="css/style1.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all"/> <!-- Owl-Carousel-CSS -->
<link rel="stylesheet" href="css/easy-responsive-tabs.css"><!-- tabs-css -->
<link rel="stylesheet" href="css/monthly.css">	<!-- Calender-CSS -->
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" /> <!-- pop-up-box -->
<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=latin-ext,vietnamese" rel="stylesheet">
    
    
    
     <style type="text/css">
        body
        {
            font-family: Arial;
            font-size: 10pt;
        }
        table
        {
            border: 1px solid #ccc;
            border-collapse: collapse;
        }
        table th
        {
            background-color: #F7F7F7;
            color: #333;
            font-weight: bold;
        }
        table th, table td
        {
            padding: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    
    <br />
    <?php
										   include '../../database/config.php';
										   $sql = "SELECT * FROM tbl_assessment_records WHERE exam_id = '$exam_id' ORDER BY score DESC";
                                           $result = $conn->query($sql);
                                           if ($result->num_rows > 0) {
										print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                            <td colspan="6">'.$exam_name.'</td>
                                            
                                            </tr>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Student Name</th>
												<th class="hidden-sm-down">Student ID</th>
												
                                                <th>Score</th>
                                                <th class="hidden-sm-down">Status</th>
												<th class="hidden-sm-down">Date</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        $snumber = 1;
                                           while($row = $result->fetch_assoc()) {
                                          print '
										       <tr>
										        <td>'.$snumber.'</td>
                                                <td>'.$row['student_name'].'</td>
												<td class="hidden-sm-down">'.$row['student_id'].'</td>
                                                
                                                <td class="hidden-sm-down">'.$row['score'].'</span>%</b></td>
												<td class="hidden-sm-down" id="stats">'.$row['status'].'</td>
												<td class="hidden-sm-down">'.$row['date'].'</td>
                                              </tr>
                                              ';
                                              $snumber = $snumber+1;
                                              $sc = $row['score'];
                                               $num = $rowcount=mysqli_num_rows($result);  
                                           }
										   
										   print '
                                           
									   </tbody>
                                       </table>  
                                      
                                       ';
                                            } else {
											print '
												<div class="alert alert-info" role="alert">
                                        Nothing was found in database.
                                    </div>
                                    ';
    
                                           }
                                           
    ?>
    <center><input type="button" id="btnExport" class="btn btn-sucess" value="Download File" /></center>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="table2excel.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $("#btnExport").click(function () {
                $("#example").table2excel({
                    filename: "Table.xls"
                });
            });
        });
    </script>
    
    <script src="js/easy-responsive-tabs.js"></script>
	<script>
		$(document).ready(function () {
		$('#verticalTab').easyResponsiveTabs({
		type: 'vertical',
		width: 'auto',
		fit: true
		});
		});
	</script>
	
</body>
</html>
