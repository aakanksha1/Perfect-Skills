<?php 
session_start();
$val = 0;

if (isset($_GET['sid'])) {
  include '../database/config.php';
    
$sid = mysqli_real_escape_string($conn, $_GET['sid']);
$eid = mysqli_real_escape_string($conn, $_GET['eid']);    
}
?>

<?php 
include '../nstyle2.php';
?>
<!DOCTYPE html>
<html>
   
<head>
        
  <title>PS | Candidate Question Wise Report</title>
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
        <a class="nav-link" href="../admin/index.php"><button class="navbutton">Dashboard</button></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="logout.php"><button class="navbutton">Logout</button></a>
      </li>
      
    </ul>
  </div>
</nav>
<div class="container-fluid " style="padding: 20px;">
  <div class="row">
    <div class="col-lg-6 offset-lg-3 md-auto sm-auto  pad" style="color: black;">
       <div class="formcls" id="result" style="overflow-y: scroll; height: 700px;">
              <?php

                       $sql = "SELECT * FROM tbl_assessment_records WHERE student_id= '$sid' and exam_id = '$eid'";
                       
                       if($result = $conn->query($sql))
                       {
                       while($row=mysqli_fetch_assoc($result))
                       {
                        echo "<h2>Question-Wise Analysis</h2><div style='border-top:2px solid #26657b; width:100%;'></div><br>";
                        $sql1 = "SELECT * FROM tbl_questions WHERE exam_id = '$eid'";
                        if($result1 = $conn->query($sql1))
                        {
                        $qno=1;
                        while($row1= mysqli_fetch_assoc($result1))
                        {
                          $a=$row1['answer'];
                          $q=$row1['question_id'];
                          echo $qno.") <b>".nl2br($row1['question'])."</b><br><span color:black; style='font-weight:bold;'>Correct Answer: </span>".nl2br($row1[$a])."<br>";
                          $sql2 = "SELECT * FROM qwise_assesment WHERE exam_id = '$eid' and question_id='$q' and student_id='$sid'";
                          $result2 = $conn->query($sql2);
                          while($row2= mysqli_fetch_assoc($result2))
                          {
                            $ans=$row2['uans'];
                            echo "<span style='style='font-weight:bold;'>Your Answer: </span>".nl2br($row1[$ans])."<br><br>";
                            $qno++;
                          }
                        }
                        }
                        else
                        {
                          echo mysqli_error($conn);
                        }
                       }
                     }
                     else
                     {
                      echo mysqli_error($conn);
                     }
                       ?>
                     
              </div>
                       <br><div class="tablediv"><button onclick="printDiv('result')">Download Result</button></div>
   
  </div>
</div>
</div>
<span style="padding: 20px;"></span>
<nav class="navbar navbar-expand-lg footer" style="background-color: #26657b;">
<a href="#" class="navbar-brand mx-auto"><img src="../ps_logo1.png" height="40" width="130"></a>
</nav>    
</body>
</html>
            <script type="text/javascript">
  function printDiv(divName) {

     var originalContents = document.body.innerHTML;
    
     var printContents = document.getElementById(divName).innerHTML;
     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>