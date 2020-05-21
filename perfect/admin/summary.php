<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';
include 'nstyle2.php';
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
        
  <title>PS | Test Report</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<nav class="navbar navbar-expand-lg " style="background-color: transparent; border-bottom: 2px solid #26657b; color:#26657b">
<span class="navbar-brand mr-auto">New City Contracting</span>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span style="color: #26657b !important;">&#x2630;</span>
</button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php"><button class="navbutton">Dashboard</button></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="logout.php"><button class="navbutton">Logout</button></a>
      </li>
      
    </ul>
  </div>
</nav>
<div class="container-fluid " style="padding: 20px;color: black;">
      <h4>Test Summary - <?php echo "$cat_name"; ?></h4>
  <div class="row">
      <div class="col-lg-6 md-auto sm-auto  pad">

       <div class="table-responsive tablediv">
       <table class="table table-striped table-bordered" style="color: black;">
        <tr><th>Invited Candidates</th><td><span id="invited">00</span></td></tr>
        <tr><th>Appeared Candidates</th><td><span id="appeared">00</span></td></tr>
        <tr><th>Not Appeared Candidates</th><td><span id="notappeared">00</span></td></tr>
                                           
        </table>
       <?php print '<a href="test.php?sid='.$cat_name.'"   style="text-decoration:none;"><button>Export Excel</button></a>' ?> 
       </div>
          
    </div>
    <div class="col-lg-6 sm-auto md-auto">
      <div id="chartContainer" class="chartcontainer"></div>
    </div>
  </div>
  <br><br>
  <div class="row">
    <div class="col-lg-12 sm-auto md-auto">
                           <div class="table-responsive tablediv">
                           <?php
                       include '../database/config.php';
                       $cat_name = mysqli_real_escape_string($conn, $_GET['eid']);
                       $sql = "SELECT * FROM tbl_users WHERE role = 'student' AND category='$cat_name' ORDER BY first_name";
                       
                                           $result = $conn->query($sql);

                                           if ($result->num_rows > 0) {
                    print '
                    <table class="table table-striped table-bordered" style="color:black">
                                            <tr>
                                                <th>S.No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                
                                                <th>Total</th>
                                                <th>Detailed Report</th>
                                            </tr>';
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
        $stl = '<a href="report/candidate_rep.php?sid='.$row['user_id'].'"><button class="btn btn-info">View</button></a>';
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
      </div>
    </div>
  </div>


</div>
</div>
<br><br><br><br>
<nav class="navbar navbar-expand-lg footer" style="background-color: #26657b;">
<a href="#" class="navbar-brand mx-auto"><img src="../ps_logo1.png" height="40" width="130"></a>
</nav>    
</body>
</html>
    <script src="../assets/js/canvasjs.min.js"></script>
<script type="text/javascript">

    var simple = <?php echo $app; ?>;
    console.log(simple);
    var complex = <?php echo $notapp; ?>;
    console.log(complex);
    document.getElementById("appeared").innerHTML = simple;
    document.getElementById("notappeared").innerHTML = complex;
    document.getElementById("invited").innerHTML = complex+simple;


window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
exportEnabled: true,
    backgroundColor: 'rgb(227,242,253)',
  data: [{
    type: "pie",

    startAngle: 0,
        showInLegend: "true",
    legendText: "{label}",
    indexLabel: "{label} - {y}",
    dataPoints: [
      {y: <?php echo $app; ?>, label: "Appeared"},
      {y: <?php echo $notapp; ?>, label: "Not Appeared"},

    ]
  }],
  options: {
        layout: {
            padding: {
                left: 100,
                right: 100,
                top: 100,
                bottom: 100
 
 }
 }        
    }
});
chart.render();

}
    
</script>