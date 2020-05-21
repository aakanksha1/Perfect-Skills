<?php 

if (isset($_GET['sid'])) {
	include '../database/config.php';
	$student_id = mysqli_real_escape_string($conn, $_GET['sid']);
	$sql = "SELECT * FROM tbl_users WHERE user_id = '$student_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
	$sdfname = $row['first_name'];
	$sdlname = $row['last_name'];
	$sdgender = $row['gender'];
	$sddob = $row['dob'];
	$sdaddress = $row['address'];
	$sdemail = $row['email'];
	$sdphone = $row['phone'];
	$sddepartment = $row['department'];
	$sdcategory = $row['category'];
	$sdavatar = $row['avatar'];
	$sdstat = $row['acc_stat'];
	$qrcodetxt = 'ID:'.$student_id.', NAME: '.$sdfname.' '.$sdlname.', GENDER: '.$sdgender.', DEPARTMENT : '.$sddepartment.', CATEGORY : '.$sdcategory.'';

    }
} else {
    header("location:./");
}
	
}else{
	header("location:./");
}
?>
<!DOCTYPE html>
<html>
   
<head>
        
        <title>Report for - <?php echo "$sdfname"; ?> </title>
        
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
		

        <link href="../assets/plugins/summernote-master/summernote.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/bootstrap-colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css"/>

		

        
    </head>
    <body class="page-header-fixed" onload="testing();"">
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
                <div class="profile-menu-list">
                    <a href="profile.php"><i class="fa fa-user"></i><span>Profile</span></a>
                    <a href="logout.php"><i class="fa fa-sign-out"></i><span>Logout</span></a>
                </div>
            </nav>
            <button class="close-button" id="close-button">Close Menu</button>
        </div>
        <form class="search-form" action="search.php" method="GET">
            <div class="input-group">
                <!--<input type="text" name="keyword" class="form-control search-input" placeholder="Search student..." required>-->
                <span class="input-group-btn">
                    <!--<button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i class="fa fa-times"></i></button>-->
                </span>
            </div>
        </form>
        <main class="page-content content-wrap">
            
        
            <div class="page-inner" id="content">
               
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12" style="">
                        <div class="col-md-6 text-center"> 
                        <h2 style="font-weight:800;color:orange">Perfect Skill</h2>
                        </div>
                        <div class="col-md-6 text-center"> 
                        <img src="apt.jpeg" style="width: 40%">
                        </div>
                        </div>
                        <div class="col-md-12">
						<div class="row">
						    <div class="col-md-2" > <button onclick="greetVisitor()">Save Records</button></div>
                            <div class="col-md-8">

                                
                                        <h2><b>Report for - <?php echo "$sdfname"; ?> <?php echo "$sdlname"; ?></b></h2>
                                        <h4><?php echo "$sdemail"; ?></h4>
                                   
                                
									
									 <div class="table-responsive">
									 <?php
									 include '../database/config.php';
									 $sql = "SELECT * FROM tbl_assessment_records WHERE student_id = '$student_id'";
                                     $result = $conn->query($sql);

                                     if ($result->num_rows > 0) {
									print '
									   <table id="resultexample" class="table-bordered display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Sectional Tests</th>
                                                <th>Date</th>
                                                <th>Score</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>';
                                $sno =1;
                                     while($row = $result->fetch_assoc()) {
                                          $val = $val + $row['score'];
                                         $valscore = $row['score'];
                                     print '
									        <tr>
									            <td><b>'.$sno.'<b></td>
                                                <td><b>'.$row['exam_name'].'</b></td>
                                                <td><b>'.$row['date'].'</b></td>
                                                <td><b>'.$row['score'].'%</b></td>
                                                <td><b>'.$row['status'].'</b></td>
                                            </tr>
                                            
                                            
                                    ';
                                            $num = $rowcount=mysqli_num_rows($result);
                                            $sno = $sno + 1;
                                     }
                                     $ag = $val/$num;
                                     $agg = round($ag,2);
                                  
									 print '
									 <script>
                                    function testing(){
                                   var val1 = ' .$agg. ';
                                    
                                    if(val1>=0 && val1<=24)
                    {
                        
                        document.getElementById("aggstatus").style.color = "#D9534F";
                        document.getElementById("aggstatus").innerHTML = "Beginner";
                    }
                    else if(val1>=25 && val1<=49)
                    {
                        
                        document.getElementById("aggstatus").style.color = "#F0AD4E";
                        document.getElementById("aggstatus").innerHTML = "Intermediate";
                    }
                    else if(val1>=50 && val1<=74)
                    {
                        
                        document.getElementById("aggstatus").style.color = "#337AB7";
                        document.getElementById("aggstatus").innerHTML = "Advanced";
                    }
                    else if(val1>=75 && val1<=100)
                    {
                        
                        document.getElementById("aggstatus").style.color = "#5CB85C";
                        document.getElementById("aggstatus").innerHTML = "Proficient";
                    }
                    }
                                    
                                    
                    
                                    </script>
									   </tbody>
                                       </table>  
                                       <center>
                                       <p id="testme" style="font-weight:500;font-size:16px">'.$sdfname.' has scored <b>'.$agg.'%<b></p>
                                       </center>
                                       
                                       <p id="aggval"  style="font-weight:500;font-size:20px"></p>';
                                     } else {
     												print '
												<div class="alert alert-info" role="alert">
                                        Nothing was found in database.
                                    </div>';
                                     }
                                     $conn->close();
									 
									 ?>
<script language="javascript" type="text/javascript">
function greetVisitor()
{
     
    //  alert("Printing!");
     window.print();
}

</script>
   




    
  
                                    </div>
									
                            
  
                            </div>
							<div class="col-md-2"> </div>
							
							
					
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
        <script src="../assets/plugins/jquery-mockjax-master/jquery.mockjax.js"></script>
        <script src="../assets/plugins/moment/moment.js"></script>
        <script src="../assets/plugins/datatables/js/jquery.datatables.min.js"></script>
        <script src="../assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js"></script>
        <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="../assets/js/modern.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>
		<script src="../assets/plugins/select2/js/select2.min.js"></script>
        <script src="../assets/plugins/summernote-master/summernote.min.js"></script>
        <script src="../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
        <script src="../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
        <script src="../assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
        <script src="../assets/js/pages/form-elements.js"></script>
		

		<script>
function myFunction() {
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
    
    </body>

</html>