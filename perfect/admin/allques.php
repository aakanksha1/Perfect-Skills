<?php 
include '../nstyle2.php';
if (isset($_GET['eid'])) {
include '../database/config.php';
$exam_id = mysqli_real_escape_string($conn, $_GET['eid']);  

$sql = "SELECT * FROM tbl_examinations WHERE exam_id = '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $exam_name =$row['exam_name'];
    }
} else {
header("location:./");  
}

}else{
header("location:./");  
}
?>
<!DOCTYPE html>
<html>
   
<head>
        
  <title>PS | Questions</title>
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
      <a class="nav-link"><button class="navbutton" onclick="history.go(-1)">Return</button></a>
   
      </li>

      <li class="nav-item">
        <a class="nav-link" href="logout.php"><button class="navbutton">Logout</button></a>
      </li>
      
    </ul>
  </div>
</nav>
<div class="container-fluid maincontainer">
  <div class="row">
    <div class="col-lg-6  offset-lg-3 md-auto sm-auto  pad">
 <div class="formcls" id="result" style="overflow-y: scroll; height: 700px; color: black;">
              <?php

                        echo '<h2 style="color:black">Test Name:'.$exam_name.'</h2><div style="border-top:2px solid #26657b; width:100%;"><br>';
                        $sql1 = "SELECT * FROM tbl_questions WHERE exam_id = '$exam_id'";
                        if($result1 = $conn->query($sql1))
                        {
                        $qno=1;
                        while($row1= mysqli_fetch_assoc($result1))
                        {
                        
                          $op1=$row1['option1'];
                          $op2=$row1['option2'];
                          $op3=$row1['option3'];
                          $op4=$row1['option4'];
                          $a=$row1['answer'];
                          $q=$row1['question_id'];
                          echo $qno.") <b>".nl2br($row1['question'])."</b><br><br>a) ".$op1."<br>b) ".$op2."<br>c) ".$op3."<br>d) ".$op4."<br><br><span color:black; style='font-weight:bold;'>Correct Answer: </span>".nl2br($row1[$a])."<br><br>";
                          $qno++;
                        }
                        }
                        else
                        {
                          echo mysqli_error($conn);
                        }
                       
                  ?>
                     
              </div>    </div>
  </div>


</div>
<span style="padding: 20px;"></span>
<nav class="navbar navbar-expand-lg footer" style="background-color: #26657b;">
<a href="#" class="navbar-brand mx-auto"><img src="../ps_logo1.png" height="40" width="130"></a>
</nav>    
</body>
</html>
