<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';
?>
<!DOCTYPE html>
<html>
    
<head>
        
        <title>PS | Learnings</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Learning Arena by Perfect Skills" />
        <meta name="keywords" content="Learning Arena Perfect Skills" />
        <meta name="author" content="Pratik" />
        
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
                            <div class="col-md-6 text-left" style="">
                                
                            </div>
                        </div>
                        
                            <div class="col-md-7 text-right ">
                            <a href="index.php" target="_blank"><button class="btn btn-info"> Dashboard</button></a>
                            <a href="profile.php" target="_blank"><button class="btn btn-warning"> Profile</button></a>
                            <a href="logout.php"><button class="btn btn-danger">Logout <i class="fa fa-power-off"></i> </button></a>
                            </div>
                        
                        </div>
                </div>
                <div id="main-wrapper">
                    <div class="row col-md-12" style="margin-top:10px">
                        
                           
                        
                        <div class="col-md-12" style="margin-top:-10px">
                           <div class=" panel-white">
                                <div class="panel-body">
                                    <div class="table-responsive">  
                                    <h2 style="font-weight:700">Learning Resources:</h2>
										   <?php
										   include '../database/config.php';
										   $sql = "SELECT DISTINCT tag,exam_id FROM tbl_questions ";
                                           $result = $conn->query($sql);

                                           if ($result->num_rows > 0) {
                                           while($row = $result->fetch_assoc()) {
											   $status = $row['status'];
											   if ($status == "Active") {
											   $st = '<p class="" style="text-decoration:none">ACTIVE</p>';
											   $stl = '<a class="" style="text-decoration:none"  href="test_sections.php?id='.row['name'].'" target="_blank"><button class="btn btn-success">Take Assessment</button></a>';
											   }else{
											   $st = '<p class="text-danger">INACTIVE</p>'; 
                                               $stl = '<p class="text-danger"><button class="btn btn-default">Take Assessment</button></a></p>';											   
											   }
$os = " ";
$exam = $row['exam_id'];
$sql1 = "SELECT * FROM tbl_examinations where exam_id='$exam' ";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
while($row1 = $result1->fetch_assoc()) {
    $os = $row1['exam_name'];
}
}
else{
    $os=" ";
}
											   
                                               $rowis = $row['name'];
                                               $tagis = $row['tag'];
                                          print '
                                          
                                          <div class="col-md-3 text-center" style="border:1px;border-style:solid;border-radius:10px;height:180px;padding-right:1px;">
                                          
                                          <p style="font-size:18px;color:orange;font-weight:800;padding-top:20px">'.$row['tag'].'</p>
                                          <p style="font-size:18px;color:black;font-weight:800;padding-top:20px">Learn from :</p>
                                        
                                        <a href="https://www.youtube.com/results?search_query='.$os.' '.$row['tag'].'" target="_blank"><button class="btn btn-success">Youtube <i class="fa fa-book"></i></button></a>
                                        
                                        <a href="https://www.udemy.com/courses/search/?q='.$os.' '.$row['tag'].'&p=1&price=price-free" target="_blank"><button class="btn btn-success">Udemy <i class="fa fa-book"></i></button></a>
                                          
                                          </div>
										       <tr>
                                               
          
                                            </tr>';
                                           }
										   
										   print '
									   </tbody>
                                       </table>  ';
                                            } else {1
											print '
												<div class="alert alert-info" role="alert">
                                        Nothing was found in database.
                                    </div>';
    
                                           }
                                           $conn->close();
										   
										   ?>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-md-6" >
                <!--<div id="my_camera"></div>-->
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
						
<!--<script language="JavaScript">-->
<!--    Webcam.set({-->
<!--        width: 380,-->
<!--        height: 250,-->
<!--        image_format: 'jpeg',-->
<!--        jpeg_quality: 90-->
<!--    });-->
  
<!--    Webcam.attach( '#my_camera' );-->
  
<!--    function take_snapshot() {-->
<!--        Webcam.snap( function(data_uri) {-->
<!--            $(".image-tag").val(data_uri);-->
<!--            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';-->
<!--        } );-->
<!--    }-->
<!--</script>					-->
						
					
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