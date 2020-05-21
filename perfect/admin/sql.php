
<!DOCTYPE html>
<html>
<head>
        
        <title>Skill Evaluate | Repository</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Online Examination System" />
        <meta name="keywords" content="Online Examination System" />
        <meta name="author" content="Bwire Charles Mashauri" />

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
    <style>
       
.card {
    text-align: center;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  background-color:whitesmoke;
  border-radius: 5px 5px 0 0;
    border: 8px;
    border-style: solid;
    border-color: white;
    
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.9);
    border: 2px;
    border-style: solid;
    border-color: lightblue;
    background-color: white;
    
    
    
}
.cardcontainer{
    text-align: center;
    }


</style>
    </head>
    <body style="background-color:white">
        <div class="overlay"></div>
       
        
        <main class="page-content content-wrap">
            
       
            <div class="page-inner">
               
                <div id="main-wrapper">
<!--                    border:1px solid #0379BE;-->
                    <div class="row" >
                <div class="container-full" style="padding-bottom:60px">
                    <div class="col-md-12">
                        <div class="col-md-5">
                            <div class="col-md-4 text-center">
                                <h2>Skill Evaluate</h2>
                            </div>
                            <div class="col-md-6 text-left" style="border-left: 6px solid green;">
                            <img src="../ags.png"  width="85%" >
                            </div>
                        </div>
                        
                            <div class="col-md-7 text-right ">
                                <h3>Greetings from Affluent Global Services !!!</h3>
                            </div>
                        
                        </div>
                </div>
                        <div class="container-full" style="border-top:2px solid #0379BE;" >
                            
                                <div class="panel " >
                                    <div class="panel-body" >
                                        <div role="tabpanel" >
                                            <div class="text-right" role="tablist" >
			                                    
                                                
                                            </div>
                                            
                                            <div class="tab-content">
                                                
                                                <div role="tabpanel" class="tab-pane active fade in" id="tab5" >

                                            
                                                
                                              
                                        <div class="col-md-12">
                                            <h2 class="text-center" style="font-weight:800">SQL Questions</h2>
                                               
                                               <?php
										   include '../database/config7.php';
										   $sql = "SELECT * FROM tbl_examinations WHERE exam_id='EX-422565' ORDER BY category";
                                           $result = $conn->query($sql);

                                           if ($result->num_rows > 0) {

     
                                           while($row = $result->fetch_assoc()) {
											   $status = $row['status'];
											   if ($status == "Active") {
											   $st = '<p class="text-success">ACTIVE</p>';
											   $stl = '<a href="pages/make_ex_in.php?id='.$row['exam_id'].'">Make Inactive</a>';
											   }else{
											   $st = '<p class="text-danger">INACTIVE</p>'; 
                                               $stl = '<a href="pages/make_ex_ac.php?id='.$row['exam_id'].'">Make Active</a>';											   
											   }

                                               
                                               print'
                                               <div class="card col-md-3" style="height:150px;padding:20px 20px 20px 20px">
                                               <p style="font-weight:800;font-size:16px;color:#F58733;padding-top:5px;padding-bottom:5px;">'.$row['exam_name'].'</p>
                                               
                                               
                                               <a href="allquessql.php?eid='.$row['exam_id'].'"target="_blank" class="btn btn-default">View Questions</a>
                                               
                                              
                                                    
                                               </div>
                                               
                                               ';
                                        
                                           }
                                               
										   
                                            } else {
											print '
												<div class="alert alert-info" role="alert">
                                        Nothing was found in database.
                                    </div>
                                    
                                    ';
    
                                           }
                                               
                                           $conn->close();
										   
										   ?>
										  
                                                    
                                        </div>
                                                <div class="col-md-12" style="padding-top:20px;display:none">
                                                <h2 class="text-center" style="font-weight:800">Our Repository</h2>
										   <?php
										   include '../database/config4.php';
										   $sql = "SELECT * FROM tbl_examinations ORDER BY category";
                                           $result = $conn->query($sql);

                                           if ($result->num_rows > 0) {

     
                                           while($row = $result->fetch_assoc()) {
											   $status = $row['status'];
											   if ($status == "Active") {
											   $st = '<p class="text-success">ACTIVE</p>';
											   $stl = '<a href="pages/make_ex_in.php?id='.$row['exam_id'].'">Make Inactive</a>';
											   }else{
											   $st = '<p class="text-danger">INACTIVE</p>'; 
                                               $stl = '<a href="pages/make_ex_ac.php?id='.$row['exam_id'].'">Make Active</a>';											   
											   }

                                               
                                               print'
                                               <div class="card col-md-3" style="height:150px;padding:20px 20px 20px 20px">
                                               <p style="font-weight:800;font-size:16px;color:#F58733;padding-top:5px;padding-bottom:5px;">'.$row['exam_name'].'</p>
                                               
                                               
                                               <a href="allques4.php?eid='.$row['exam_id'].'"target="_blank" class="btn btn-default">View Questions</a>
                                               
                                              
                                                    
                                               </div>
                                               
                                               ';
                                        
                                           }
                                               
										   
                                            } else {
											print '
												<div class="alert alert-info" role="alert">
                                        Nothing was found in database.
                                    </div>
                                    
                                    ';
    
                                           }
                                               
                                           $conn->close();
										   
										   ?>


                                                </div>
                                                
                                                
                                                
                                                </div>
                                                
                                                
                                              
                                                

                                            </div>
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