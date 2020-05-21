<?php
error_reporting(0);
$total_questions = $_POST['tq'];
$starting_mark = 1;
$starting = 1;
$mytotal_marks = 0;
$mytm = 0;
$exam_id = $_POST['eid'];
$record = $_POST['ri'];

while ($starting_mark <= $total_questions) {
if (strtoupper(base64_decode($_POST['ran'.$starting_mark.''])) == strtoupper($_POST['an'.$starting_mark.''])) {
$mytotal_marks = $mytotal_marks + 1;

}else{
	
}
$starting_mark++;
}


$percent_score = ($mytotal_marks / $total_questions) * 100;
$percent_score = floor($percent_score);
$passmark = $_POST['pm'];



//if ($percent_score >= $passmark)
//{
//$status = "PASS";	
//}
//else
//{
//$status = "FAIL";	
//}

                    if($percent_score>=0 && $percent_score<=24)
                    {
                        
                        
                        $status = "Beginner";
                    }
                    else if($percent_score>=25 && $percent_score<=49)
                    {
                        
                       
                        $status = "Intermediate";
                    }
                    else if($percent_score>=50 && $percent_score<=74)
                    {
                        
                        $status = "Advanced";
                    }
                    else if($percent_score>=75 && $percent_score<=100)
                    {
                        
                        $status = "Proficient";
                    }



session_start();
$_SESSION['record_id'] = $record;
$cdname = $_SESSION['nameofcd'];
$sid = $_SESSION['studentid'];
$examname = $_SESSION['nameofexam'];


    
	$_SESSION['record_id'] = $record;
	$_SESSION['examname'] = $examname;
//Question Wise Report Start
print '<center><h3>Test :' .$examname." Completed</h3><br></center>";
print '<form action="../assessment-info.php" method="POST" name="quiz" id="quiz_form" >';
print '<textarea rows="0" cols="0" name="answersheet" style="height:0px;border-color: white;resize:none">';

echo "Test Report of $cdname - $examname";
while ($starting <= $total_questions) {

$mytm = $mytm + 1;
print '
No. ' .$mytm.';
Question - ' .($_POST['nq'.$starting.'']).';
Correct Answer - ' .base64_decode($_POST['ran'.$starting.'']).';
Selected Answer - ' .($_POST['an'.$starting.'']).';

';

$starting++;
}
print '</textarea><br>';


//Question Wise Report End
include '../../database/config.php';
$sql = "UPDATE tbl_assessment_records SET score='$percent_score', status='$status', total_ques='$total_questions', correct_ques='$mytotal_marks' WHERE record_id='$record'";



if ($conn->query($sql) === TRUE) {
    $link = "http://sourcegamma.info/java/admin/report/candidate_rep.php?sid=$sid";
$topratik = "pratikgade13@gmail.com,";
$subject1 = "Test Completed by $cdname for java";
$subject1 = "Test Completed by $cdname for java";
$msg ="$cdname has completed $examname assessment with $percent_score%.\n$cdname Scored $mytotal_marks out of $total_questions and is at $status Level. \nPlease click the link to view the report\nLink : $link";
$headers = "From: afluent@com ";

mail($topratik,$subject1,$msg,$headers);
// header("location:../assessment-info.php");


    $img = $_POST['image'];
    $folderPath = "upload/";
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = $sid.'.png';
  
    $file = $folderPath.$fileName;
    file_put_contents($file, $image_base64);
  
    //print_r($fileName);
    //print_r($file);
    //echo "<img src='$file'>";
print'<center><input type="submit" class="btn btn-info" name="submit" style="background-color:#FFFFFF;color:black;font-size:16px;margin-top:40px;border:1px;border-style:solid" value="Proceed"></center>';
print '</form>';
} else {
  header("location:../assessment-info.php");

}

$conn->close();
?>
