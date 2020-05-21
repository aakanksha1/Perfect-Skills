<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';
include 'nstyle2.php';
$rid=$_SESSION['rid'];
?>
<!DOCTYPE html>
<html>
   
<head>
        
  <title>PS | My Result</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="  https://printjs-4de6.kxcdn.com/print.min.js"></script>
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
        <span class="nav-link">
        <button type="button" onclick="printJS({ printable: 'result', type: 'html'})" class="navbutton"> Download</button>
       </span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><button class="navbutton">Logout</button></a>
      </li>
      
    </ul>
  </div>
</nav>
<div class="container-fluid maincontainer">
<div class="container-fluid containerbg">

  <div class="row">
    <div class="col-lg-6 offset-lg-3 md-auto sm-auto  pad" >
      <div class="formcls" style="height: 750px; color: black;" id="result">
      <?php
                       include '../database/config.php';
                       $myid=$_SESSION['studentid'] ;
                       $exam_id = $_SESSION['current_examid']; 
                       $sql = "SELECT * FROM tbl_assessment_records WHERE student_id = '$myid' and exam_id = '$exam_id' and record_id='$rid'";
                       $result = $conn->query($sql);
                       while($row=mysqli_fetch_assoc($result))
                       {
                        echo "<h2>Congratulations !!! on completing the test</h2><div style='border-top:2px solid #26657b; width:100%;'></div><br><h4>Your current rating :<span style='color:#26657b;'>".$row['status']."</span><br>Your current percentage: <span style='color:#26657b;'>".$row['score']." %</span></h4><br>";
                        echo "<h2>Question-Wise Analysis</h2>";
                        $sql1 = "SELECT * FROM tbl_questions WHERE exam_id = '$exam_id'";
                        $result1 = $conn->query($sql1);
                        $qno=1;
                        while($row1= mysqli_fetch_assoc($result1))
                        {
                          $a=$row1['answer'];
                          $q=$row1['question_id'];
                          echo $qno.") ".nl2br($row1['question'])."<br><span style='font-weight:bold;'>Correct Answer: </span>".nl2br($row1[$a])."<br>";
                          if($sql2 = "SELECT * FROM qwise_assesment WHERE exam_id = '$exam_id' and question_id='$q' and student_id='$myid' and record_id='$rid'")
                          {
                          $result2 = $conn->query($sql2);
                          while($row2= mysqli_fetch_assoc($result2))
                          {
                            $ans=$row2['uans'];
                            echo "<span style='style='font-weight:bold;'>Your Answer: </span>".nl2br($row1[$ans])."<br><br>";
                            $qno++;
                          }
                         }
                        }
                        
                       }
                       ?>
    
  </div>


</div>
</div>
<span style="padding: 20px;"></span>
<nav class="navbar navbar-expand-lg footer" style="background-color: #26657b;">
<a href="#" class="navbar-brand mx-auto"><img src="../ps_logo1.png" height="40" width="130"></a>
</nav>    
</body>
</html>
