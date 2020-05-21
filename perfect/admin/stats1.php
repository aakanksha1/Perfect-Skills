<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';


?>
<!DOCTYPE html>
<html>
<head>
        
        <title>Skill Evaluate | Analytics</title>
        
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
    <body <?php if ($ms == "1") { print 'onload="myFunction()"'; } ?>  class="page-header-fixed">
        <div class="overlay"></div>

        <main class="page-content content-wrap">
            
       
            <div class="page-inner">
                <div id="main-wrapper">
                    <div class="row">
                          <div class="container-full" style="padding-bottom:60px">
                    <div class="col-md-12">
                        <div class="col-md-5">
                            <div class="col-md-5 text-left" style="margin-top:0px">
                                <img src="../ps_logo.png" width="90%">
                            </div>
                            <div class="col-md-6 text-left" style="border-left: 6px solid green;">
                            <!--<img src="apt.jpeg" style="width: 50%">-->
                            </div>
                        </div>
                        
                            <div class="col-md-7 text-right ">
                                <a href="index.php"><button class="btn btn-info">Dashboard</button></a>
                            </div>
                        
                        </div>
                        </div>
                        
                            <div class="container-full" style="border-top:2px solid #0379BE;" >
                                <div class="panel panel-white">
                                    <div class="panel-body" >
                                        <div role="tabpanel" >
                                            <ul class="nav nav-tabs" role="tablist" >
                                           
                                                <li role="presentation" class="active"><a href="#tab5" role="tab" data-toggle="tab">Appeared Candidates</a></li>
                                                <li role="presentation" class=""><a href="#tab6" role="tab" data-toggle="tab">Invited Candidates</a></li>
                                                
                                                
                                            </ul>
                                            
                                            <div class="tab-content">
                                                
                                                <div role="tabpanel" class="tab-pane active fade in" id="tab5" >
                                           <div class="table-responsive">
                       <?php
                                               $catid = $_GET['eid'];
                       include '../database/config.php';
                       $sql = "SELECT * FROM tbl_assessment_records ORDER BY exam_name asc ";
                                           $result = $conn->query($sql);                

                                           if ($result->num_rows > 0) {
                    print '
                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Candidate Name</th>
                                                <th>Section Name</th>
                                                <th>Section Status</th>
                                                <th>Date Appeared</th>
                                                <th>Level</th>
                                                <th>Score</th>
                                                <th>Performance</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S.No</th>
                        <th>Candidate Name</th>
                                                <th>Test Name</th>
                                                <th>Test Status</th>
                                                <th>Date Appeared</th>
                                                <th>Level</th>
                                                <th>Score</th>
                                                <th>Performance</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';
                                    $n = 1;
                                           while($row = $result->fetch_assoc()) {
                                               $sid = $row['student_name'];
                                          print '
                           <tr>
                           <td>'.$n.'</td>
                                               <td>'.$row['student_name'].'</td>
                                               <td>'.$row['exam_name'].'</td>
                                               <td>APPEARED</td>
                                                <td>'.$row['date'].'</td>
                        <td id="stscore1">'.$row['status'].'</td>
                                                <td id="stscore1">'.$row['score'].'</td>
                                                <td><a href="report/candidate_rep.php?sid='.$row['student_id'].'" target="_blank"><button class="btn btn-info">View</button></a></td>
                                                
                                                
                                            
          
                                            </tr>';
                                            $n++;
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


                 
<!--                <button onclick="statusdisplay1()">Try it</button>-->
<!--                <p id="ststatus1">asd</p>-->

                                    </div>
                                                       
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab6">
                                         
                                                    
                                                    <div class="table-responsive">
                       <?php
                       include '../database/config.php';
                       $sql = "SELECT * FROM tbl_users WHERE role = 'student' ORDER BY category";
                                           $result = $conn->query($sql);

                                           if ($result->num_rows > 0) {
                    print '
                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Test</th>
                                                <th>Status</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Test</th>
                                                <th>Status</th>
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>';
                                            $i = 1;
                                           while($row = $result->fetch_assoc()) {
                         
                         $status = $row['acc_stat'];
                         if ($status == "1") {
                         $st = '<p class="text-success">INVITED</p>';
                         $stl = '<a href="pages/make_sd_in.php?id='.$row['user_id'].'">Make Inactive</a>';
                         }else{
                         $st = '<p class="text-danger">INACTIVE</p>'; 
                                               $stl = '<a href="pages/make_sd_ac.php?id='.$row['user_id'].'">Make Active</a>';                         
                         }
$nameofcd = $row['user_id'];
$quest = 0;
$sql3 = "SELECT * FROM tbl_assessment_records WHERE student_id = '$nameofcd'";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {

    $cdstat = "<p style='color:green'>Appeared</p>";
    
} else {
$cdstat = "<p style='color:red'>Invited - Not Appeared</p>";
}

                                          print '
                           <tr>
                           <td>'.$i.'</td>
                                                <td>'.$row['first_name'].' '.$row['last_name'].'</td>
                                                <td>'.$row['email'].'</td>
                                                <td>'.$row['category'].'</td>
                                                <td>'.$cdstat.'</td>
                                                
                                                
          
                                            </tr>';
                                            $i++;
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
