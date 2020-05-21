<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';
if (isset($_GET['eid'])) {
include '../database/config.php';
$exam_id = mysqli_real_escape_string($conn, $_GET['eid']);
$sql = "SELECT * FROM tbl_examinations WHERE exam_id = '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
     $excate = $row['category'];
   $exsubject = $row['subject'];
   $exname = $row['exam_name'];
   $exdate = $row['date'];
   $exduration = $row['duration'];
   $expassmark = $row['passmark'];
   $exreex = $row['re_exam'];
   $exterms = $row['terms'];
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
        
        <title>OES | Edit Exam</title>
        
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
                        <div class="col-md-5">
                            <div class="col-md-6 text-center" style="">
                                <h2 style=";font-weight:600;">Perfect Skills</h2>
                            </div>
                            <div class="col-md-6 text-center" style="">
                            <!--<h2 style=";font-weight:800;">MSPSquare</h2>-->
                            </div>
                        </div>
                        
                            <div class="col-md-7 text-right ">
                                <!--<h3>Greetings from Affluent Global Services !!!</h3>-->
                            </div>
                        
                </div>
                            
                            <div class="container-full" style="border-top:2px solid #0379BE;" >
                                
                                <div class="panel panel-white">
                                    <div class="panel-body">
                                         <form action="pages/update_exam.php" method="POST">
                    <div class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" value="<?php echo"$exname"; ?>" placeholder="Enter exam name" name="exam" required autocomplete="off">
                                        </div>
                    <div class="form-group">
                                            <label for="exampleInputEmail1">Duration (Minutes)</label>
                                            <input type="number" class="form-control" value="<?php echo"$exduration"; ?>" placeholder="Enter exam duration" name="duration" required autocomplete="off">
                                        </div>
                    <div class="form-group" style="display:none">
                                            <label for="exampleInputEmail1">Passmark (%)</label>
                                            <input type="number" class="form-control" value="<?php echo"$expassmark"; ?>" placeholder="Enter passmark" name="passmark" required autocomplete="off">
                                        </div>
                    <div class="form-group">
                                            <label for="exampleInputEmail1">RE Test (if you take exam then show it again after some days)</label>
                                            <input type="number" class="form-control" value="<?php echo"$exreex"; ?>" placeholder="Enter days to attempt" name="attempts" required autocomplete="off">
                                        </div>
                  <div class="form-group">
                                    <label >Deadline</label>
                                    <input type="text" class="form-control date-picker" value="<?php echo"$exdate"; ?>" name="date" required autocomplete="off" placeholder="Select deadline">
                                    </div>
                    <div class="form-group" style="display:none">
                                            <label for="exampleInputEmail1">Select Subject</label>
                                            <select class="form-control" name="subject" required>
                      <option value="" selected disabled>-Select subject</option>
                      <?php
                      include '../database/config.php';
                      $sql = "SELECT * FROM tbl_subjects WHERE status = 'Active' ORDER BY name";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
    
                                            while($row = $result->fetch_assoc()) {
                      if ($exsubject == $row['name']) {
                      print '<option selected value="'.$row['name'].'">'.$row['name'].'</option>';  
                      }else{
                      print '<option value="'.$row['name'].'">'.$row['name'].'</option>'; 
                      }
                                            
                                            }
                                           } else {
                          
                                            }
                                             $conn->close();
                       ?>
                      
                      </select>
                                        </div>
                    
                    <div class="form-group" style="display:none">
                                            <label for="exampleInputEmail1">Change Test</label>
                                            <select class="form-control" name="category" required>
                      <option value="" selected disabled>-Select category-</option>
                      <?php
                      include '../database/config.php';
                      $sql = "SELECT * FROM tbl_categories WHERE status = 'Active' ORDER BY name";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
    
                                            while($row = $result->fetch_assoc()) {
                                            if ($excate == $row['name']) {
                      print '<option selected value="'.$row['name'].'">'.$row['name'].'</option>';  
                      }else{
                      print '<option value="'.$row['name'].'">'.$row['name'].'</option>'; 
                      }
                                            }
                                           } else {
                          
                                            }
                                             $conn->close();
                       ?>
                      
                      </select>
                                        </div>
                  
                  
                  <div class="form-group" style="display:none">
                                            <label for="exampleInputEmail1">Terms and conditions</label>
                                            <textarea style="resize: none;" rows="6" class="form-control" placeholder="Enter Terms and conditions" name="instructions" required autocomplete="off"><?php echo"$exterms"; ?></textarea>
                                     </div>
                   <input type="hidden" name="examid" value="<?php echo "$exam_id"; ?>">


                                        <button type="submit" class="btn btn-primary">Submit</button>
                                       </form>
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