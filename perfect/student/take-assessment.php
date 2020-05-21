<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';
include 'nstyle2.php';
if (isset($_GET['id'])) {
include '../database/config.php'; 
$exam_id = mysqli_real_escape_string($conn, $_GET['id']);
$record_found = 0;
$sql = "SELECT * FROM tbl_examinations WHERE exam_id = '$exam_id' AND category = '$mycategory'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
  $subject = $row['subject'];
  $exam_name = $row['exam_name'];
  $deadline = $row['date'];
  $duration = $row['duration'];
  $passmark = $row['passmark'];
  $reexam = $row['re_exam'];
  $terms = $row['terms'];
  $status = $row['status'];
  $today_date = date('Y/m/d');
    $next_retake = date('m/d/Y', strtotime($today_date. ' + '.$reexam.' days'));
  $dcv = date_format(date_create_from_format('m/d/Y', $deadline), 'Y/m/d');
  

  if ($status == "Inactive") {
  header("location:./");  
  }
    }
} else {
header("location:./");  
}
$quest = 0;
if($exam_id=='EX-135348')
{
$limit = '20';
}
else
{
$limit = '50';
}
$sql = "SELECT * FROM tbl_questions WHERE exam_id = '$exam_id' LIMIT $limit";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $quest++;
    }
} else {

}


$sql = "SELECT * FROM tbl_assessment_records WHERE student_id = '$myid' AND exam_id = '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $record_found = 1;
  $score = $row['score'];
  $status = $row['status'];
  $take_date = $row['date'];
  $retake_date = $row['next_retake'];
  $today_date = date('Y/m/d');
  $retakeconv = date_format(date_create_from_format('m/d/Y', $retake_date), 'Y/m/d');
    $tc = strtotime($today_date);
  $rc = strtotime($retakeconv);
  $dc = strtotime($dcv);
    $td = ($tc - $rc)/86400;
  $dcc = ($tc - $dc)/86400;
  
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
        
  <title>PS | Take Assesment</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
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
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-6 md-auto sm-auto" style="color: black; padding: 20px;">
      <h1>Exam Information</h1>
     <div class="formcls">  
     <label><h4>Exam Name</h4></label><br>
     <h5><?php echo "$exam_name"; ?></h5><br>
     
     <label><h4>Deadline</h4></label><br>
     <h5><?php echo "$deadline"; ?></h5><br>
                                                   
     <label><h4>Duration</h4></label><br>
     <h5><?php echo "$duration"; ?> minutes</h5><br>
                                                   
     <label><h4>No. of Questions</h4></label><br>
     <h5><?php echo "$quest"; ?></h5><br>
    </div>
    <div  style="padding-top: 20px;">
      <?php
        if ($record_found == "1")
         {
            if ($td >= 0)
            {
              if ($dcc > 1)
              {
                print '
                <div class="alert alert-warning" role="alert">
                                The exam is already expired.
                                </div>';
              }
              else
              {
                $_SESSION['current_examid'] = $exam_id;
                $_SESSION['student_retake'] = 1;
                print ''; 
                ?>
                <a onclick="return confirm('Are you sure you want to begin ?')" class="rtbutton" style="text-decoration: none;font-size:20px;" href="assessment.php">Retake Assessment</a>
                <?php 
              }
                                
            }
            else
            {
               print '
                        <div class="formcls" role="alert">
                            You will be able to retake this exam on <span style="color:#26657b">'.$retake_date.'</span>
                        </div>';
            }               
                  
          }
          else
          {
                $_SESSION['current_examid'] = $exam_id;
                $_SESSION['student_retake'] = 0;
                print ' <a onclick="return confirm(\'Are you sure you want to begin ?\')" class="navbutton" href="assessment.php" style="text-decoration:none; font-size:20px">Begin Assessment</a>';

          }
          ?>      
    </div>
  </div>

  <div class="col-lg-6 sm-auto md-auto" style="padding: 20px; color: black;">
    <h1>Instructions</h1>
        <div style="border-top: 2px solid #707793;padding-top:20px; padding-bottom:20px; ">
        <h4>
        <p>1. This is an Online Test, please use proper and active internet connectivity</p>
        <p>2. Do Not Reload the Test Page, if done so the test will terminate</p>
        <p>3. Do Not Move out of the Test Page, if done so the test will terminate</p>
        <p>4. Questions can be MCQ, Fill in Blanks or Descriptive, read carefully before answering</p>
        <p>5. You can skip the questions and visit them later .</p>
        <p>6. The test is webcam proctered and moving out of the frame will cause disqualification.</p>
        </h4>
        </div>
        <div id="my_camera"></div>
               
        <?php echo nl2br("\n\n\n");?>                        
  </div>
</div>
<script type="text/javascript">
    Webcam.set({
        width: 380,
        height: 250,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
<nav class="navbar navbar-expand-lg navbar-dark fixed-bottom" style="background-color: #26657b;">
<a href="#" class="navbar-brand mx-auto"><img src="../ps_logo1.png" height="40" width="130"></a>
</nav>    
</body>
</html>
