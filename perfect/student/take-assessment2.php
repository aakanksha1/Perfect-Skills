<?php include 'includes/check_user.php';

if (isset($_GET['id'])) {
include '../database/config.php';	
$exam_id = mysqli_real_escape_string($conn, $_GET['id']);
$record_found = 0;
$sql = "SELECT * FROM tbl_examinations WHERE exam_id = '$exam_id' AND category = '$mycategory'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
	$subject = $row['subject'];
	$exam_name = $row['exam_name'];
	$deadline = $row['date'];
	$duration = $row['duration'];
	$passmark = $row['passmark'];
	$reexam = $row['re_exam'];
	$terms = $row['terms'];
	$status = $row['status'];
	$today_date = date('Y/m/d');
    $next_retake = date('m/d/Y', strtotime($today_date. ' + '.$reexam.' days'));
	$dcv = date_format(date_create_from_format('m/d/Y', $deadline), 'Y/m/d');
	

	if ($status == "Inactive") {
	header("location:./");	
	}
    }
} else {
header("location:./");	
}
$quest = 0;
if($exam_id=='EX-135348')
{
$limit = '20';
}
else
{
$limit = '50';
}
$sql = "SELECT * FROM tbl_questions WHERE exam_id = '$exam_id' LIMIT $limit";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $quest++;
    }
} else {

}


$sql = "SELECT * FROM tbl_assessment_records WHERE student_id = '$myid' AND exam_id = '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $record_found = 1;
	$score = $row['score'];
	$status = $row['status'];
	$take_date = $row['date'];
	$retake_date = $row['next_retake'];
	$today_date = date('Y/m/d');
	$retakeconv = date_format(date_create_from_format('m/d/Y', $retake_date), 'Y/m/d');
    $tc = strtotime($today_date);
	$rc = strtotime($retakeconv);
	$dc = strtotime($dcv);
    $td = ($tc - $rc)/86400;
	$dcc = ($tc - $dc)/86400;
	
    }
} else {
    
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
        
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
                            <div class="col-md-5 text-center" style="">
                                <img src="../ps_logo.png" width="100%">
                            </div>
                            <div class="col-md-6 text-center" style="">
                                
                            </div>
                        </div>
                        
                            <div class="col-md-7 text-right ">
                                <a href="index.php"><button class="btn btn-info"> Dashboard </button></a>
                                <a href="logout.php"><button class="btn btn-danger"> Logout <i class="fa fa-power-off"></i> </button></a>
                            </div>
                        
                        </div>
                </div>
                <div id="main-wrapper">
                    <div class="row col-md-12" style="margin-top:10px">
                        <div class="col-md-6">
                            <div class=" panel-white">
                                
                                <div class="panel-body">
                                    
                                    <div class="table-responsive">  
                                       <table class="table table-bordered">
                                           
                                           <tbody>
                                               <tr>
                                                   
                                                   <td style="color:#0023c2;font-size:14px">Exam Name</td>
                                                   <td style="color:#019f08;font-size:14px"><?php echo "$exam_name"; ?></td>
                                               </tr>
											    
											    <tr>
                                                   
                                                   <td style="color:#0023c2;font-size:14px">Deadline</td>
                                                   <td style="color:#019f08;font-size:14px"><?php echo "$deadline"; ?></td>
                                               </tr>
											   
											    <tr>
                                                   
                                                   <td style="color:#0023c2;font-size:14px">Duration</td>
                                                   <td style="color:#019f08;font-size:14px"><?php echo "$duration"; ?> min.</td>
                                               </tr>
											   
											
											   
											   
											   
											   	<tr>
                                                   
                                                   <td style="color:#0023c2;font-size:14px">No. of Questions</td>
                                                   <td style="color:#019f08;font-size:14px"><?php echo "$quest"; ?></td>
                                               </tr>
                                              
                                              
                                           </tbody>
                                        </table>
                                         <div class="panel-body">
                                    
								<?php
								if ($record_found == "1") {
									
								if ($td >= 0){
									
								if ($dcc > 1){
								print '
								<div class="alert alert-warning" role="alert">
                                The exam is already expired.
                                </div>';
								}else{
								$_SESSION['current_examid'] = $exam_id;
								$_SESSION['student_retake'] = 1;
								print '
                                 

									'; ?>
									<a onclick="return confirm('Are you sure you want to begin ?')" class="btn btn-warning" href="assessment.php">Retake Assessment</a>
									
									<?php	
								}
                                
								}else{
                                print '
								<div class="alert alert-warning" role="alert">
                                You will be able to retake this exam on '.$retake_date.'
                                </div>';
								}								
									
								}else{
								$_SESSION['current_examid'] = $exam_id;
								$_SESSION['student_retake'] = 0;
								print '
                                 

									'; ?>
									<a onclick="return confirm('Are you sure you want to begin ?')" class="btn" href="assessment.php" style="background-color:#FFFFFF;color:black;font-size:16px;margin-top:40px;border:1px;border-style:solid">Begin Assessment</a>
									
									<?php
                  									
									
								}
								
								?>

									
                                </div>
                                        </div>
                                        </div>
                                        </div>
                            
                            
                        </div>
                        <div class="col-md-6" style="margin-top:-10px">
                           <div class=" panel-white">
                                <div class="panel-body">
                                    <div class="table-responsive">  
                                    <h2 style="font-weight:700">Instructions:</h2>
                                    <p>1. This is an Online Test, please use proper and active internet connectivity</p>
                                    <p>2. Do Not Reload the Test Page, if done so the test will terminate</p>
                                    <p>3. Do Not Move out of the Test Page, if done so the test will terminate</p>
                                    <p>4. Questions can be MCQ, Fill in Blanks or Descriptive, read carefully before answering</p>
                                    <p>5. You can skip the questions and visit them later .</p>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-md-6" >
                <div id="my_camera"></div>
                <!--<br/>-->
                <!--<input type=button value="Take Snapshot" onClick="take_snapshot()">-->
                <!--<input type="hidden" name="image" class="image-tag">-->
            </div>
                        </div>
<!--<div class="row" >-->
<!--            <div class="col-md-6">-->
<!--                <div id="my_camera"></div>-->
<!--                <br/>-->
                <!--<input type=button value="Take Snapshot" onClick="take_snapshot()">-->
<!--                <input type="hidden" name="image" class="image-tag">-->
<!--            </div>-->
<!--            <div class="col-md-6">-->
<!--                <div id="results"></div>-->
<!--            </div>-->
<!--            <div class="col-md-12 text-center">-->
<!--                <br/>-->
<!--            </div>-->
<!--        </div>-->
						
<script language="JavaScript">
    Webcam.set({
        width: 380,
        height: 250,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>					
						
					
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