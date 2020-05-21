<?php 
date_default_timezone_set('Africa/Dar_es_salaam');
include 'includes/check_user.php'; 
include 'includes/check_reply.php';
include '../includes/uniques.php';
include 'nstyle2.php';
if (isset($_SESSION['current_examid'])) {
include '../database/config.php';

$exam_id = $_SESSION['current_examid']; 
$retake_status = $_SESSION['student_retake'];

if ($retake_status == "1") {
$sql = "DELETE FROM tbl_assessment_records WHERE student_id = '$myid' AND exam_id = '$exam_id'";

if ($conn->query($sql) === TRUE) {

} else {

} 
}


$sql = "SELECT * FROM tbl_examinations WHERE exam_id = '$exam_id' AND category = '$mycategory' AND status = 'Active'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $exam_name =$row['exam_name'];
  $subject = $row['subject'];
  $deadline = $row['date'];
  $duration = $row['duration'];
  $passmark = $row['passmark'];
  $reexam = $row['re_exam'];
  $terms = $row['terms'];
  $status = $row['status'];
  $today_date = date('Y/m/d');
    $next_retake = date('m/d/Y', strtotime($today_date. ' + '.$reexam.' days'));
  
  $today_date = date('m/d/Y');
    }
} else {
header("location:./");  
}
}else{
header("location:./");  
}



$sql = "SELECT * FROM tbl_assessment_records WHERE student_id = '$myid' AND exam_id = '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    header("location:./take-assessment.php?id=$exam_id");
    }
} else {
$myname = "$myfname $mylname";
$recid = 'RS'.get_rand_numbers(14).'';
$_SESSION['rid']=$recid;
$sql = "INSERT INTO tbl_assessment_records (record_id, student_id, student_name, exam_name, exam_id, score, status, next_retake, date)
VALUES ('$recid', '$myid', '$myname', '$exam_name', '$exam_id', '0', 'Beginner', '$next_retake', '$today_date')";

if ($conn->query($sql) === TRUE) {

} else {

}

}

?>

<!DOCTYPE html>
<html>
   
<head>
        
  <title>PS | Assesment</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    
</head>
<body>
<nav class="navbar navbar-expand-lg " style="background-color: transparent; border-bottom: 2px solid #26657b; color:#26657b">
<span class="navbar-brand mr-auto">Time Left : <span id="quiz-time-left" style="color:#26657b"></span>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span style="color: #26657b !important;">&#x2630;</span>
</button>
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <?php 
        if ($myavatar == NULL) 
        {
        print '<li class="nav-item"><img width="50" height="50" src="profile-logo.png" alt="">&emsp;</li>';
        }
        else
        {
        echo '<li class="nav-item"><img src="data:image/jpeg;base64,'.base64_encode($myavatar).'" width="60" alt="'.$myfname.'"/></li>';  
        }
            
        ?>
        <li class="nav-item"><a class="nav-link" href=# style="text-decoration:none;color:#26667b;"><span style="font-size: 22px;"><?php echo "$myfname"; ?> <?php echo "$mylname"; ?></span></a></li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><button class="navbutton">Logout</button></a>
      </li>
      
    </ul>
  </div>
</nav>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-9 md-auto sm-auto" style="color: black; padding: 20px;">
    
      <div  class="qdiv" style="color: black;">
        <form action="" method="POST" name="quiz" id="quiz_form" >
          <?php
            $_SESSION['nameofcd'] = $myname;
            $_SESSION['nameofexam'] = $exam_name;
            $_SESSION['studentid'] = $myid;
          ?>
          <!------------------------------Retriving Number of Questions From Database------------------------------>
            <?php 
              if($exam_id=='EX-135348')
              {
                $limit = '20';
              }
              else
              {
                $limit = '50';
              }
             $tab_sql = "SELECT * FROM tbl_questions WHERE exam_id = '$exam_id' LIMIT $limit";
             $resultset = mysqli_query($conn, $tab_sql) or die("database error:". mysqli_error($conn));
             $active_class = 0 ;
             $tab_html = '';
             $question_html = '';
             $qno=1;
             $totalq=mysqli_num_rows($resultset);
             while( $ques = mysqli_fetch_assoc($resultset) )
             {
                  $current_tab = "";
                  $current_content = "";
                  if(!$active_class)
                  {
                    $active_class = 1;
                    $current_tab = 'active';
                    $current_content = 'in active';
                  }
                 $tab_html.= '<li class="'.$current_tab.'"><a href="#'.$qno.'" data-toggle="tab" id="tb'.$qno.'" onclick="qnoval('.$qno.')">'.$qno.'</a></li> &emsp;';
                 $question_html .= '<div id="'.$qno.'" class="tab-pane fade '.$current_content.'" align="left">';
                 $question_html .= '<input type="hidden" value="'.$ques['question_id'].'" name="q'.$qno.'">';
                 $question_html .= '<input type="hidden" value="'.$ques['answer'].'" name="a'.$qno.'">';
                 $question_html .= '<br><h5 style="color:#26657b; font-weight:bolder">'.$qno.') '.nl2br($ques["question"]).'</h5><br>';
                 $question_html .= '<b style="font-size:18px;"><input type="radio" name="'.$qno.'" value="option1" id="a'.$qno.'">&nbsp;<label for="a'.$qno.'">'.($ques["option1"]).'</label><br>';
                 $question_html .= '<input type="radio" name="'.$qno.'" value="option2" id="b'.$qno.'">&nbsp;<label for="b'.$qno.'">'.($ques["option2"]).'</label><br>';
                 $question_html .= '<input type="radio" name="'.$qno.'" value="option3" id="c'.$qno.'">&nbsp;<label for="c'.$qno.'">'.($ques["option3"]).'</label><br>';
                 $question_html .= '<input type="radio" name="'.$qno.'" value="option4" id="d'.$qno.'">&nbsp;<label for="d'.$qno.'">'.($ques["option4"]).'</label></b><br>';
                 $question_html .= '<input type="hidden" value="'.$totalq.'" name="totalq">';
                 if($qno==$totalq)
                 {
                  $question_html .='<br><input type="submit" name="submit_ans" value="submit" id="fintest"><br>';
                 }
                 else
                 {
                 $question_html.='<br><button onclick="nextq();return false;">&#10132;</button><br>';
                 }
                 $question_html .= '<div class="clear_both"></div></div>';
                 $qno++;
            }
            echo '<input type="hidden" value="'.$exam_id.'" name="examid">';
            echo '<input type="hidden" value="'.$myid.'" name="student">';
            ?>
          <!------------------------------Done Retriving Number of Questions From Database------------------------------>
            
         <ul class="nav nav-tabs" style="border-bottom:0px">
          <?php echo $tab_html ?>
         </ul>                 
        <div class="tab-content">
           <?php echo $question_html ?>           
        </div>
           </form>
      
    </div>
    <div align="left" style="padding-bottom: 20px;">
       <h2> Violation Count: <span id="fault" style="color: red;">0</span></h2>
    </div>
  </div>
<script type="text/javascript">
</script>

     <div class="col-lg-3 sm-auto md-auto" style="padding: 20px; color: black;">
        <div id="my_camera"></div>
               
        <?php echo nl2br("\n\n\n");?>                        
  </div>
</div>
<script type="text/javascript">
  var qno=1;
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

    function nextq()
    {
     qno=qno+1;
     id="#tb"+qno;
     console.log(id);
     $(id).click();   
    }
    
    function qnoval(val)
    {
     qno=val;
    }
$(document).ready(function() {
   $("#tb1").click();
});


</script>
<nav class="navbar navbar-expand-lg navbar-dark fixed-bottom" style="background-color: #26657b;">
<a href="#" class="navbar-brand mx-auto"><img src="../ps_logo1.png" height="40" width="130">&nbsp;<span style="font-weight: bolder; font-size: 25px;">&#x2716;</span>&nbsp;New City</a>
</nav>    
</body>
</html>


<script type="text/javascript">
var max_time = <?php echo "$duration" ?>;
var c_seconds  = 0;
var total_seconds =60*max_time;
max_time = parseInt(total_seconds/60);
c_seconds = parseInt(total_seconds%60);
document.getElementById("quiz-time-left").innerHTML='' + max_time + ':' + c_seconds + 'Min';
function init(){
document.getElementById("quiz-time-left").innerHTML='' + max_time + ':' + c_seconds + ' Min';
setTimeout("CheckTime()",999);
}
function CheckTime(){
document.getElementById("quiz-time-left").innerHTML='' + max_time + ':' + c_seconds + ' Min' ;
if(total_seconds <=0){
setTimeout('document.getElementById("fintest").click()',1);
    
    } else
    {
total_seconds = total_seconds -1;
max_time = parseInt(total_seconds/60);$
c_seconds = parseInt(total_seconds%60);
setTimeout("CheckTime()",999);
}

}
init();
</script>

<?php

if(isset($_POST['submit_ans']))
{
  $qn=1;
  $tpt=0;
  $totalq=$_POST['totalq'];
  $sid=$_POST['student'];
  $eid=$_POST['examid'];
  while($qn<=$totalq)
  {
    $val="q".$qn;
    $ansval="a".$qn;
    $ans=$_POST[$ansval];
    $qid=$_POST[$val];
    $uans=$_POST[$qn];
    $pt=0;
    if(strcmp($ans, $uans)==0)
    {
      $pt=1;
      $tpt++;
    }
    $recid=$_SESSION['rid'];
    $ins="INSERT INTO `qwise_assesment`(`student_id`,`record_id`,`exam_id`, `question_id`, `uans`, `point`) VALUES ('$sid','$recid','$eid','$qid','$uans','$pt')";
   $runins=mysqli_query($conn,$ins);
   
    $qn++;
  }
  $score=($tpt/$totalq)*100;
  $status="Beginner";
  if($score>=25 and $score<=50)
  {
    $status="Intermediate";    
  }
  else if($score>=51 and$score<=75)
  {
   $status="Advance"; 
  }
  else if($score>=76 and$score<=100)
  {
   $status="Professional"; 
  }
   $uprecords="UPDATE `tbl_assessment_records` SET `score`='$score', `total_ques`='$totalq',`correct_ques`='$tpt',status='$status' WHERE student_id='$sid' and exam_id='$eid'";
   if($runup=mysqli_query($conn,$uprecords))
   {
    echo "<script type='text/javascript'>alert('Test Submitted')</script>";
   echo "<script type='text/javascript'>location.replace('tresult.php')</script>";    
   }
   else
   {
       echo "<script type='text/javascript'>alert('Test Not Submitted')</script>";
 
   }
}



?>
<script type="text/javascript">
  faultcount=0
  document.addEventListener('contextmenu', event => event.preventDefault());
$(document).keydown(function(e){
    if(e.which === 17 || e.which === 16 || e.which ===73 || e.which==123 || e.which==67 || e.which==116 ){
      alert('Action Prohibited.You Will Be Disqualified');
      faultcount+=1;
       document.getElementById("fault").innerHTML=faultcount;
       return false;
    }
    if(faultcount===3)
    {
      document.getElementById("fintest").click(); 
    }
});

 $(window).blur(function() 
 {
  if(faultcount<2)
  {
      alert('Changing tab  Prohibited.You Will Be Disqualified');
      faultcount+=1;
      document.getElementById("fault").innerHTML=faultcount;
      return false;
  }
  else
  {

            document.getElementById("fintest").click();
  }

});

</script>