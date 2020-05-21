<?php include 'includes/check_user.php';
if (isset($_SESSION['record_id'])) {
$record_id = $_SESSION['record_id'];
include '../database/config.php';

$sql = "SELECT * FROM tbl_assessment_records WHERE record_id = '$record_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
    $exam_name = $row['exam_name'];
	$score = $row['score'];
	$status = $row['status'];
	$next_retake = $row['next_retake'];
	$taking_date = $row['date'];
    }
} else {
    header("location:./");
}
$conn->close();
}else{
	
header("location:./");	
}

 ?>
<!DOCTYPE html>
<html>
    
<head>
        
        <title>OES | Take Assessment</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Online Examination System" />
        <meta name="keywords" content="Online Examination System" />
        <meta name="author" content="Bwire Charles Mashauri" />
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="../assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="../assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/images/icon.png" rel="icon">
        <link href="../assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="../assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        
    </head>
    <body class="page-header-fixed">
        <div class="overlay"></div>
        

        <main class="page-content content-wrap">
           
       
            <div class="page-inner">
                <div class="container-full" style="padding-bottom:60px">
                    <div class="col-md-12">
                        <div class="col-md-5">
                            <div class="col-md-5 text-left" style="margin-top:0px">
                                <img src="../ps_logo.png" width="90%">
                            </div>
                            <div class="col-md-6 text-left" >
                            
                            </div>
                        </div>
                        <?php
                        
if(isset($_POST['submit']))
{
	$answervalue = $_POST['answersheet'];
	$stdrecord = $_SESSION['record_id'];
	$nameofexam = $_SESSION['examname'];
	
	$newname = $stdrecord.$nameofexam;
$myfile = fopen("$newname.txt", "a");
fwrite($myfile, $answervalue);
fclose($myfile);
	
// 	$sql = "INSERT INTO tbl_answers(record_id, exam_name, answer) VALUES ('$stdrecord', '$nameofexam', '$answervalue')";
    

$servername = "localhost";
$username = "u942694520_sgs";
$password = "Ednations@2017";
//$dbname = "u942694520_db";

$dbname = "u942694520_sgs";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO tbl_answers(record_id, exam_name, answer) VALUES ('$stdrecord', '$nameofexam', '$answervalue')";

if ($conn->query($sql) === TRUE) {
    echo "Please Return to Dashboard";
} else {
    echo "Please Return to Dashboard. Thank You";
}
}
?>
                            <div class="col-md-7 text-right ">
                                <h3>Your Test Has been Submitted</h3>
                                <a href="logout.php"><button class="btn btn-danger">Logout <i class="fa fa-power-off"></i> </button></a>
                            </div>
                        </div>
                </div>
                <div id="main-wrapper">
                    <div class="row col-md-12 text-center">
                       <a href="index.php"><button class= "btn btn-success" >Return to Dashboard </button></a>
                       <a href="results.php"><button class= "btn btn-info" >View Results</button></a>
						
	
                    </div>

                </div>
                
            </div>
        </main>

        <div class="cd-overlay"></div>
	
        <script src="../assets/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="../assets/plugins/pace-master/pace.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../assets/plugins/switchery/switchery.min.js"></script>
        <script src="../assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="../assets/plugins/waves/waves.min.js"></script>
        <script src="../assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="../assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../assets/plugins/jquery-counterup/jquery.counterup.min.js"></script>
        <script src="../assets/plugins/toastr/toastr.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="../assets/plugins/curvedlines/curvedLines.js"></script>
        <script src="../assets/plugins/metrojs/MetroJs.min.js"></script>
        <script src="../assets/js/modern.js"></script>

		<script src="../assets/js/canvasjs.min.js"></script>
		 

        
    </body>


</html>