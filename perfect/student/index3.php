<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';
?>
<!DOCTYPE html>
<html>
   
<head>
        
        <title>PS | My Tests</title>
        
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
        <link href="../assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css">
        <link href="../assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
		<link href="../assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
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
				print' <img width="60" src="../assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
				}else{
				echo '<img src="data:image/jpeg;base64,'.base64_encode($myavatar).'" width="60" alt="'.$myfname.'"/>';	
				}
						
				?>
				<span><?php echo "$myfname"; ?> <?php echo "$mylname"; ?></span></div>
                
            </nav>
            
        </div>
        <main class="page-content content-wrap">
            
         
            <div class="page-inner">
                <div class="text-right">
                    
                </div>
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
                            <a href="profile.php" target="_blank"><button class="btn btn-info"> Profile</button></a>
                            <a href="results.php" target="_blank"><button class="btn btn-warning"> Learning</button></a>
                            <a href="logout.php"><button class="btn btn-danger">Logout <i class="fa fa-power-off"></i> </button></a>
                        </div>
                        
                        </div>


</div>
          </div>                            <div class="col-md-6">

                                <div class=" panel-white">
                                    <div class="panel-body">
										   <?php
										   include '../database/config.php';
										   $sql = "SELECT * FROM tbl_examinations WHERE category = '$mycategory' ORDER BY exam_name";
                                           $result = $conn->query($sql);

                                           if ($result->num_rows > 0) {
									
     
                                           while($row = $result->fetch_assoc()) {
											   $status = $row['status'];
											   if ($status == "Active") {
											   $st = '<p class="" style="text-decoration:none">ACTIVE</p>';
											   $stl = '<a class="" style="text-decoration:none"  href="take-assessment.php?id='.$row['exam_id'].'"><button class="btn btn-success">Take Assessment</button></a>';
											   }else{
											   $st = '<p class="text-danger">INACTIVE</p>'; 
                                               $stl = '<p class="text-danger"><button class="btn btn-default">Take Assessment</button></a></p>';											   
											   }
                                          print '
                                          
                                          <div class=col-md-6 style="border:1px;border-style:solid;height:180px">
                                          <p style="font-size:18px;color:orange;font-weight:800">'.$row['exam_name'].'</p>
                                          <p style="display:none">'.$row['subject'].'</p>
                                          <p>'.$row['date'].'</p>
                                          <p>'.$st.'</p>
										  <p>'.$stl.'</p>
                                          </div>
										       <tr>
                                               
          
                                            </tr>';
                                           }
										   
										   print '
									   </tbody>
                                       </table>  ';
                                            } else {
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
                            <div class="col-md-6" style="margin-top:-10px">
                           <div class=" panel-white">
                                <div class="panel-body">
                                    <div class="table-responsive">  
                                    <h2 style="font-weight:700">Assessment Process:</h2>
                                    <p>1. Click on <span class="text-success">Take Assessment</span> button</p>
                                    <p>2. On the Assessment Information Page read the instructions carefully and then click on <span class="text-success">Begin Assessment</span> button</p>
                                    <p>3. Do Not Move out of the Test Page or Reload on the assessment page, if done so the test will terminate</p>
                                    <p>4. Click on <span class="text-success">Submit</span> button on last question to complete the test</p>
                                    <p>5. On completing the test click on <span class="text-success">Proceed</span> and then <span class="text-success">Return to Dashboard</span> button.</p>
                                    <p>6. Repeat steps 1-5 for all provided tests.</p>
                                    <p>Click to View Video Walkthrough <button id="myBtn" class=" btn-info">View <i class="fa fa-eye  "></i></button></p>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        </div>


                    </div>
                </div>
                
            </div>
                                    <!-- Trigger/Open The Modal -->


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Support</h2>
    </div>
    <div class="modal-body">
      <h3>For Any Assisstance</h3>
      <p>Contact @ +91-9860430568</p>
      <p>View Video Walkthrough</p>
      <!--<iframe id="cartoonVideo" width="560" height="315" src="//www.youtube.com/embed/YE7VzlLtp-4" frameborder="0" allowfullscreen></iframe>-->
      <video width="600" controls>
  <source src="demo_vid.mp4" type="video/mp4">
  <source src="demo_vid.ogg" type="video/ogg">
  Your browser does not support HTML5 video.
</video>
    </div>
    
    </div>
  </div>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

      
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
        <script src="../assets/plugins/jquery-mockjax-master/jquery.mockjax.js"></script>
        <script src="../assets/plugins/moment/moment.js"></script>
        <script src="../assets/plugins/datatables/js/jquery.datatables.min.js"></script>
        <script src="../assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js"></script>
        <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="../assets/js/modern.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>
		<script src="../assets/plugins/select2/js/select2.min.js"></script>
		

		<script>
function myFunction() {
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
    </body>

</html>