<?php include 'includes/check_user.php';
include 'includes/check_reply.php';
$qrcodetxt = 'ID:'.$myid.', NAME: '.$myfname.' '.$mylname.', GENDER: '.$mygender.', DEPARTMENT : '.$mydepartment.', CATEGORY : '.$mycategory.'';


 ?>
<!DOCTYPE html>
<html>
    
<head>
        
        <title>OES | Student Profile</title>
        
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
        <link href="../assets/css/snack.css" rel="stylesheet" type="text/css"/>
        <script src="../assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        
    </head>
    <body <?php if ($ms == "1") { print 'onload="myFunction()"'; } ?>  class="page-header-fixed">
        <div class="overlay"></div>
        <div class="menu-wrap">
            <nav class="profile-menu">
                <div class="profile">
				<?php 
				if ($myavatar == NULL) {
				print' <img width="60" src="user.png" alt="'.$myfname.'">';
				}else{
				echo '<img src="data:image/jpeg;base64,'.base64_encode($myavatar).'" width="60" alt="'.$myfname.'"/>';	
				}
						
				?>
				<span><?php echo "$myfname"; ?> <?php echo "$mylname"; ?></span></div>
                <div class="profile-menu-list">
                    <a href="profile.php"><i class="fa fa-user"></i><span>Profile</span></a>
                    <a href="logout.php"><i class="fa fa-sign-out"></i><span>Logout</span></a>
                </div>
            </nav>
            <button class="close-button" id="close-button">Close Menu</button>
        </div>

        <main class="page-content content-wrap">
          
    
            <div class="page-inner">
                
                <div id="main-wrapper">
                      <div class="row">
                          <div class="row">
						    
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
                            <!--<h3>Greetings from Affluent Global Services !!!</h3>-->
                            
                            <a href="index.php" target="_blank"><button class="btn btn-info"> Dashboard</button></a>
                            <a href="results.php" target="_blank"><button class="btn btn-warning"> Learning</button></a>
                            <a href="logout.php"><button class="btn btn-danger">Logout <i class="fa fa-power-off"></i> </button></a>
                        </div>
                        
                        </div>


</div>
          </div>       
                        <div class="col-md-12">
						<div class="row">
                            <div class="col-md-5">

                                <div class="panel panel-white">
                                    <div class="panel-body">
									<div class="col-md-6 text-center">
                                <?php 
						        if ($myavatar == NULL) {
						        print' <img width="150" class="img-responsive" src="user.png" alt="'.$myfname.'">';
						        }else{
						        echo '<img width="150" src="data:image/jpeg;base64,'.base64_encode($myavatar).'" class="img-responsive"  alt="'.$myfname.'"/>';	
						        }
						
						        ?></div>
								<div class="col-md-6 text-center">
						        <?php print '<img width="150" src="../assets/qrcode/qr_img.php?d='.$qrcodetxt.'">'; ?>
						        </div>
								
                                    </div>
									<table class="table">
                                        <tbody>
                                            <tr>
                                                
                                                <td>Registration Number</td>
                                                <td><b><?php echo "$myid"; ?></b></td>
                                             
                                            </tr>
                                            <tr>
                                                
                                                <td>Name</td>
                                                <td><b><?php echo ucwords($myfname.$mylname); ?></b></td>
                                                
                                            </tr>
											
											<tr>
                                                
                                                <td>Email Address</td>
                                                <td><b><?php echo "$myemail"; ?></b></td>
                                               
                                            </tr>
											
											<tr>
                                                
                                                <td>Category</td>
                                                <td><b><?php echo "$mycategory"; ?></b></td>
                                               
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>  
  
                            </div>
							
							<div class="col-md-7" style="display:none">

                                <div class="panel panel-white">
                                    <div class="panel-body">
									<h3>Update display picture</h3>
			                    <form action="pages/new_dp.php" method="POST" enctype="multipart/form-data">
								<div class="form-group">
                                <label for="exampleInputEmail1">Select image to upload</label>
                                <input type="file" name="image" accept="image/*" required autocomplete="off">
                                </div>
								<button type="submit" class="btn btn-primary">Upload</button>
								<?php 
						        if ($myavatar == NULL) {
						        
						        }else{
						        print '<a';?> onclick="return confirm('Delete image ?')" <?php print ' class="btn btn-danger" href="pages/drop_dp.php">Delete Image</a>'; 
						        }
						
						        ?>
								</form>
									
                             </div></div></div>
							 
							 
							 	<div class="col-md-7">

                                <div class="panel panel-white">
                                    <div class="panel-body">
									<h3>Assessment Scores</h3>
			                    <div class="table-responsive">
										   <?php
										   include '../database/config.php';
										   $sql = "SELECT * FROM tbl_assessment_records WHERE student_id = '$myid'";
                                           $result = $conn->query($sql);

                                           if ($result->num_rows > 0) {
										print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Test</th>
											
												<th>Score</th>
												<th>Date</th>
                                                <th>Status</th>
												
                            
                                   
                                            </tr>
                                        </thead>
                                        <tbody>';
     
                                           while($row = $result->fetch_assoc()) {

                                          print '
										       <tr>
                                                <td>'.$row['exam_name'].'</td>
												 
												<td>'.$row['score'].'%</td>
                                                <td>'.$row['date'].'</td>
												<td>'.$row['status'].'</td>
                                                
										
          
                                            </tr>';
                                           }
										   
										   print '
									   </tbody>
                                       </table>  ';
                                            } else {
											print '
												<div class="alert alert-info" role="alert">
                                        Oops '.$myfname.'. Seems like you have not appeared for any tests yet . But, feel free to learn from the resources below
                                    </div>';
    
                                           }
                                           $conn->close();
										   
										   ?>


                 

                                    </div>
									
                             </div></div></div>
							
							
                        </div>


                        </div>
                    </div>

                </div>
                
            </div>
        </main>
		<?php if ($ms == "1") {
?> <div class="alert alert-success" id="snackbar"><?php echo "$description"; ?></div> <?php	
}else{
	
}
?>
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
		 
		<script>
function myFunction() {
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
        
    </body>


</html>