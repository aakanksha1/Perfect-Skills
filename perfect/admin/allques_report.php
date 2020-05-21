
<!DOCTYPE html>
<html>
    
<head>
        
    
        <title>Test: <?php echo $exam_name; ?></title>
        
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
        <link href="../assets/images/icon.png" rel="icon">
        <link href="../assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/snack.css" rel="stylesheet" type="text/css"/>
        <script src="../assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        
    </head>
	<body <?php if ($ms == "1") { print 'onload="myFunction()"'; } ?>   class="page-header-fixed page-horizontal-bar" >
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
                <span class="input-group-btn">
                    
                </span>
            </div>
        </form>
        <main class="page-content content-wrap container">
        
          
            <div class="page-inner">
               
                <div id="main-wrapper">
                    <div class="row">
                         <div class="container-full" style="padding-bottom:60px">
                        <div class="col-md-5">
                            <div class="col-md-6 text-center" style="margin-top:-10px">
                                <h2 style="font-family:cursive;font-weight:800;">Perfect Skills</h2>
                            </div>
                            <div class="col-md-6 text-left" style="border-left: 6px solid green;">
                            <img src="../ags.png"  style="width:80%" >
                            </div>
                        </div>
                        
                            <div class="col-md-7 text-right ">
                                
                            </div>
                        
                </div>
                        <div class="container-full" style="border-top:2px solid #0379BE;" >
                                <div class="panel panel-white">
                                    <div class="panel-body">
                                        <div class="col-md-12 text-center">
                                            
                                        </div>
                                        <div class="tabs-below" role="tabpanel">
                                             
                                        <div class="col-md-12">

                                        <div class="tab-content">
                                        
											<?php 
											include '../database/config.php';
											$rec_id = $_GET['eid'];
											$sql = "SELECT * FROM tbl_answers WHERE record_id = '$rec_id'";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                $rowcount=mysqli_num_rows($result);
                                            $qno = 1;
                                            while($row = $result->fetch_assoc()) {
												$answer = $row['answer'];
												
												echo nl2br($answer);

                                           

                                            }
                                            } else {
                                        // echo "<center><h2>No Records Exist</h2></center>";
                                        $path = "../student/".$rec_id.".txt";
                                        // echo $rec_id;
                                        $myfile = fopen("$path", "r") or die("No Record Exist!");
                                        print nl2br(fread($myfile,filesize("$path")));
                                        fclose($myfile);
                                            }
											
											?>

                                            </div>
                 
											
                                           
                                        </div>
                                           
                                        </div>
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
        <script src="../assets/js/modern.min.js"></script>
        
				<script>
function myFunction() {
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
    </body>

</html>