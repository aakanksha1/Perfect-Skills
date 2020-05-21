<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';
include 'nstyle2.php';

if (isset($_GET['sid'])) {
include '../database/config.php';
$cat_name = mysqli_real_escape_string($conn, $_GET['sid']);


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
}
?>
<!DOCTYPE html>
<html>
   
<head>
        
  <title>PS | Download Report</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<nav class="navbar navbar-expand-lg " style="background-color: transparent; border-bottom: 2px solid #0275d8; color:#0275d8">
<span class="navbar-brand mr-auto">New City Contracting</span>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span style="color: #0275d8 !important;">&#x2630;</span>
</button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" href="logout.php"><button class="navbutton">Logout</button></a>
      </li>
      
    </ul>
  </div>
</nav>
<div class="container-fluid " style="padding: 20px;">
  <div class="row">
    <div class="col-lg-12 md-auto sm-auto  pad">

    <div class="table-responsive tablediv" >
                  <div id="tb">
                       <?php
                       include '../database/config.php';
                       $cat_name = mysqli_real_escape_string($conn, $_GET['sid']);
                       $sql = "SELECT * FROM tbl_users WHERE role = 'student' AND category='$cat_name' ORDER BY first_name";
                       
                                           $result = $conn->query($sql);

                                           if ($result->num_rows > 0) {
                    print '

                    <table  class="table table-bordered" style="color:black">
                    <h3>'.$cat_name.'</h3><br>
                                        
                                            <tr>
                                                <th>S.No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Score</th>
                                                
                                                <th>Time</th>
                                                
                                            </tr>
                                        ';
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
$sql3 = "SELECT * FROM tbl_assessment_records WHERE student_id = '$nameofcd' AND exam_id='EX-550055'";
$sql4 = "SELECT * FROM tbl_assessment_records WHERE student_id = '$nameofcd' AND exam_id='EX-135348'";
$result3 = $conn->query($sql3);
$result4 = $conn->query($sql4);
if ($result4->num_rows > 0) {
    while($row4 = $result4->fetch_assoc()) {
         $st2score = $row4['score']."%";
                                   }
}
else{
    $st2score = '<p class="text-danger">-</p>';
}

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
$total = $stscore + $st2score;
    $total = $total/2;
    $total = $total."%";
// Current date and time
$datetime = $row['date'];

// Convert datetime to Unix timestamp
$timestamp = strtotime($datetime);

// Subtract time from datetime
$time = $timestamp + (330 * 60);

// Date and time after subtraction
$datetime = date("Y-m-d H:i:s", $time);
                                          print '

                           <tr>
                           <td>'.$i.'</td>
                                                <td>'.ucwords($row['first_name']).'</td>
                                                <td>'.$row['email'].'</td>
                                                <td>'.$cdstat.'</td>
                                                <td>'.$stscore.'</td>
                                                
                                                <td>'.$datetime.'</td>
                                                
                                                
                                                
                                                
          
                                            </tr>';
                                            $i++;
                                            
                                           }
                       
                       print '
                     
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
    <button onclick="printDiv('tb')">Download</button>
    <button class="navbutton" onclick="location.replace('summary.php?eid=<?php echo $cat_name ?>')">Return</button>

    </div>
  </div>


</div>
</div>
<span style="padding: 20px;"></span>
<nav class="navbar navbar-expand-lg footer" style="background-color: #0275d8;">
<a href="#" class="navbar-brand mx-auto"><img src="../ps_logo1.png" height="40" width="130"></a>
</nav>    
</body>
</html>
<script type="text/javascript">
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>