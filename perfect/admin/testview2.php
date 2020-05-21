<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';
include '../database/config.php';
?>
<?php
                                            $cid = $_GET['eid'];
                       $sql = "SELECT * FROM tbl_examinations WHERE category='$cid' ORDER BY exam_name ASC";
                                           $result = $conn->query($sql);
                                           if ($result->num_rows > 0) {
                                           while($row = $result->fetch_assoc()) {
                                          $nameofexam = $row['exam_name'];
                                           }
                       
                      
                                            } else {
                        print '
                        <div class="alert alert-info" role="alert">
                                        Nothing was found in database.
                                    </div>';
    
                                           }

                                        $sql = "SELECT * FROM tbl_categories WHERE name='$cid'";
                                           $result = $conn->query($sql);
                                           if ($result->num_rows > 0) {
                                           while($row = $result->fetch_assoc()) {
                                                $cname = $row['name'];
                                                $catid = $row['category_id'];
                                           }
                       
                      
                                            } else {
                        print '
                        <div class="alert alert-info" role="alert">
                                        Nothing was found in database.
                                    </div>';
    
                                           }
                       
                       ?>

<!DOCTYPE html>
<html>
<head>
        
        <title>Perfect Skills | Sections    <?php echo $cid;  ?></title>
        
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

                    <div class="row" >
                         <div class="container-full" style="padding-bottom:60px">
                        <div class="col-md-12">
                        <div class="col-md-5">
                            <div class="col-md-5 text-left" style="margin-top:0px">
                                <img src="../ps_logo.png" width="90%">
                            </div>
                            <div class="col-md-6 text-left" style="">
                            
                            </div>
                        </div>
                        
                            <div class="col-md-7 text-right ">
                                <h3>Test Name : <b><?php echo $cid;  ?></b></h3>
                            </div>
                        
                            
                        </div>
                        </div>
                        <div class="container-full" style="border-top:2px solid #0379BE;" >
                            
                                <div class="panel " >
                                    <div class="panel-body" >
                                        <div role="tabpanel" >
                                            <div class="text-right" role="tablist" >
                                          <a href="index.php"><button class="btn btn-info">Dashboard</button></a>
                                          <!--<a href="#tab6" role="tab" data-toggle="tab"><button class="btn btn-info">Invite Candidates</button></a>-->
                                                <?php
                                                print'
                                                <a href="stats.php?eid='.$cname.'"><button class="btn btn-info">Analytics</button></a> ';
                                                ?>
                                                
                                                <a href="logout.php"><button class="btn btn-danger">Logout <i class="fa fa-power-off"></i> </button></a>              
                                            </div>
                                            
                                            <div class="tab-content">
                                
                                                <div role="tabpanel" class="tab-pane active fade in" id="tab5" >
                                                     <div class="table-responsive">
                                                         

                       <?php
                                                         
                                            $cid = $_GET['eid'];
                       $sql = "SELECT * FROM tbl_examinations WHERE category='$cid' ORDER BY exam_name ASC";
                                           $result = $conn->query($sql);

                                           if ($result->num_rows > 0) {
                    print '
                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Section Name</th>
                        <th>Duration</th>
                                                <th>Questions</th>
                                                <th>Deadline</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Section Name</th>
                        <th>Duration</th>
                                                <th>Questions</th>
                                                <th>Deadline</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';
     
                                           while($row = $result->fetch_assoc()) {
                         $status = $row['status'];
                         if ($status == "Active") {
                         $st = '<p class="text-success">ACTIVE</p>';
                         $stl = '<a href="pages/make_ex_in.php?id='.$row['exam_id'].'" class="btn btn-success">Make Inactive</a>';
                         }else{
                         $st = '<p class="text-danger">INACTIVE</p>'; 
                                               $stl = '<a href="pages/make_ex_ac.php?id='.$row['exam_id'].'" class="btn btn-danger">Make Active</a>';                        
                         }
                         
$nameexam = $row['exam_id'];
$quest = 0;
$sql3 = "SELECT * FROM tbl_questions WHERE exam_id = '$nameexam'";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {

    while($row3 = $result3->fetch_assoc()) {
    $quest++;
    }
    
} else {
$quest = $nameexam;
}
                                          print '
                           <tr>
                                                <td>'.$row['exam_name'].'</td>
                        <td>'.$row['duration'].'</td>
                                                <td>'.$quest.'</td>
                        <td>'.$row['date'].'</td>
                                                <td><a href="report/report.php?eid='.$row['exam_id'].'" target="_blank"><button class="btn btn-success">Section Stats</button></a>
                                                &nbsp;
                                                <a href="allques.php?eid='.$row['exam_id'].'" target="_blank"><button class="btn btn-success">Questions</button></a>
                                                &nbsp;
                                                '.$stl.'
                                                &nbsp;
                                                <a href="edit-exam.php?eid='.$row['exam_id'].'" target="_blank"><button class="btn btn-info">Edit Exam</button></a>
                                                
                                                
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



<!-- The Modal -->

                                                       
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
    
    <script>
function myFunction() {
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>
    </body>

</html>