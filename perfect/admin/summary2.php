<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';
if (isset($_GET['eid'])) {
include '../database/config.php';
$cat_name = mysqli_real_escape_string($conn, $_GET['eid']);


$stda = 0;
$stdb = 0;



$sql = "SELECT * FROM tbl_users WHERE category = '$cat_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $recruiter = $row['recruiter'];
   if ($recruiter == ""){
     $stda++;
   }else {
    $stdb++; 
     
   }
   
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
        
        <title>OES | Short Summary</title>
        
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
    <body onload="showme();"  class="page-header-fixed">
        <div class="overlay"></div>
       
      
        <main class="page-content content-wrap">
           
            
            <div class="page-inner">
                <div class="page-title">
                    <h3>Test Summary - <?php echo "$cat_name"; ?></h3>
<?php
$idhere = $cat_name;
?>
              </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
            <div class="row">
                            <div class="col-md-12">

                                <div class="panel panel-white">
                                    <div class="panel-body">
                                    <div class="col-md-5">  
                                       <table border="2px" class="display table" style="width: 100%; cellspacing: 0;">
                                           
                                           
                                                <tr>
                                                   <td>Invited Candidates</td>
                                                   <td><span id="invited">00</span></td>
                                                </tr>
                          <tr>
                                                   <td>Appeared Candidates</td>
                                                   <td><span id="appeared">00</span></td>
                                                </tr>
                          <tr>
                                                   <td>Not Appeared Candidates</td>
                                                   <td><span id="notappeared">00</span></td>
                                                </tr>
                                           
                                        </table>
                                        <?php print '<a href="test.php?sid='.$idhere.'" target="_blank" style="text-decoration:none;background-color:#6ACA6B"><button class="btn btn-success" style="background-color:#6ACA6B">Export Excel</button></a>' ?> 
                                    </div>
                                    <div class="col-md-7" style="margin-top:-20px">
                  <div id="chartContainer" style="height: 370px;"></div>
                  
                  </div>
                                    </div>
                                </div>  
  
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive">
                       <?php
                       include '../database/config.php';
                       $cat_name = mysqli_real_escape_string($conn, $_GET['eid']);
                       $sql = "SELECT * FROM tbl_users WHERE role = 'student' AND category='$cat_name' ORDER BY first_name";
                       
                                           $result = $conn->query($sql);

                                           if ($result->num_rows > 0) {
                    print '
                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                
                                                <th>Total</th>
                                                <th>Report</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>';
                                            $i = 1;
                                            $app = 0;
$notapp = 0;
                                           while($row = $result->fetch_assoc()) {
                         
                         $status = $row['acc_stat'];
                         if ($status == "1") {
                         $st = '<p class="text-success">INVITED</p>';
                         
                         }else{
                         $st = '<p class="text-danger">INACTIVE</p>'; 
                                               
                         }
$nameofcd = $row['user_id'];
$quest = 0;
$sql6 = "SELECT * FROM tbl_assessment_records WHERE student_id = '$nameofcd' AND exam_id='EX-550058'";
$result6 = $conn->query($sql6);
if ($result4->num_rows > 0) {
    while($row6 = $result6->fetch_assoc()) {
         $st4score = $row6['score']."%";
                                   }
}
else{
    $st2score = '<p class="text-danger">-</p>';
}

$sql5 = "SELECT * FROM tbl_assessment_records WHERE student_id = '$nameofcd' AND exam_id='EX-550057'";
$result5 = $conn->query($sql5);
if ($result5->num_rows > 0) {
    while($row5 = $result5->fetch_assoc()) {
         $st3score = $row5['score']."%";
                                   }
}
else{
    $st3score = '<p class="text-danger">-</p>';
}

$sql4 = "SELECT * FROM tbl_assessment_records WHERE student_id = '$nameofcd' AND exam_id='EX-550056'";
$result4 = $conn->query($sql4);
if ($result4->num_rows > 0) {
    while($row4 = $result4->fetch_assoc()) {
         $st2score = $row4['score']."%";
                                   }
}
else{
    $st2score = '<p class="text-danger">-</p>';
}
$sql3 = "SELECT * FROM tbl_assessment_records WHERE student_id = '$nameofcd' AND exam_id='EX-550055'";
$result3 = $conn->query($sql3);
if ($result3->num_rows > 0) {

        $cdstat = "<p style='color:green'>Appeared</p>";
        $app = $app + 1; 
        $stl = '<a href="report/candidate_rep.php?sid='.$row['user_id'].'" target="_blank"><button class="btn btn-info">View</button></a>';
         while($row3 = $result3->fetch_assoc()) {
         $stscore = $row3['score']."%";
        
                                           }
    
    } 
    else {
        $cdstat = "<p style='color:red'>Invited - Not Appeared</p>";
        $notapp = $notapp + 1; 
        $stl = '<p class="text-danger">Not Appeared Yet</p>';
        $stscore = '<p class="text-danger">-</p>';
    }
    $total = $stscore + $st2score + $st3score + $st4score;
    $total = $total/4;
    $total = $total."%";


                                          print '

                           <tr>
                           <td>'.$i.'</td>
                                                <td>'.$row['first_name'].'</td>
                                                <td>'.$row['email'].'</td>
                                                <td>'.$cdstat.'</td>
                                                
                                                <td>'.$total.'</td>
                                                <td>'.$stl.'</td>
                                                
                                                
                                                
          
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
<script type="text/javascript">

    var simple = <?php echo $app; ?>;
    console.log(simple);
    var complex = <?php echo $notapp; ?>;
    console.log(complex);
    document.getElementById("appeared").innerHTML = simple;
    document.getElementById("notappeared").innerHTML = complex;
    document.getElementById("invited").innerHTML = complex+simple;
    
</script>

<p>

</p>
                 

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
<script src="../assets/js/canvasjs.min.js"></script>
<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
exportEnabled: true,
  data: [{
    type: "pie",
    startAngle: 0,
        showInLegend: "true",
    legendText: "{label}",
    indexLabel: "{label} - {y}",
    dataPoints: [
      {y: <?php echo "$app"; ?>, label: "Appeared"},
      {y: <?php echo "$notapp"; ?>, label: "Not Appeared"},

    ]
  }]
});
chart.render();

}
</script>
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



