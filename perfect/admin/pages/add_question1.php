<?php
include '../../database/config.php';
include '../../includes/uniques.php';
$examid = mysqli_real_escape_string($conn, $_POST['exam_id']);
$question_id = 'QS-'.get_rand_numbers(6).'';
$question = mysqli_real_escape_string($conn, $_POST['question']);
$tag = mysqli_real_escape_string($conn, $_POST['tag']);
$answer = mysqli_real_escape_string($conn, $_POST['answer']);
$name = $_FILES['file']['name'];
$name = $question_id.$name;

if (isset($_GET['type'])) {
$question_type = $_GET['type'];	
if ($question_type == "mc") {	
$opt1 = mysqli_real_escape_string($conn, $_POST['opt1']);
$opt2 = mysqli_real_escape_string($conn, $_POST['opt2']);
$opt3 = mysqli_real_escape_string($conn, $_POST['opt3']);
$opt4 = mysqli_real_escape_string($conn, $_POST['opt4']);


$sql = "SELECT * FROM tbl_questions1 WHERE exam_id = '$examid' AND question = '$question'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
 header("location:../add-questions1.php?rp=1185&eid=$examid");
    }
} else {
    
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

// Select file type
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Valid file extensions
$extensions_arr = array("jpg","jpeg","png","gif");

// Check extension
//   if( in_array($imageFileType,$extensions_arr) ){
 
    // Insert record
    //  $query = "insert into images(name) values('".$name."')";
    //  mysqli_query($con,$query);
  
     // Upload file
     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

//   }
$sql = "INSERT INTO tbl_questions1 (question_id, exam_id, type, question,image, tag, option1, option2, option3, option4, answer)
VALUES ('$question_id', '$examid', 'MC', '$question','$name', '$tag' , '$opt1', '$opt2', '$opt3', '$opt4', '$answer')";

if ($conn->query($sql) === TRUE) {
    header("location:../add-questions1.php?rp=0357&eid=$examid");	
    echo "Works"."<br>";
    echo $target_file;
    
} else {
    // header("location:../add-questions1.php?rp=3903&eid=$examid");	
    echo "Does not Work"."<br>";
    echo "Call Pratik!!!";
}

}


}else if($question_type == "fib") {
$sql = "SELECT * FROM tbl_questions1 WHERE exam_id = '$examid' AND question = '$question'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
header("location:../add-questions1.php?rp=1185&eid=$examid");
    }
} else {

$sql = "INSERT INTO tbl_questions1 (question_id, exam_id, type, question, answer)
VALUES ('$question_id', '$examid', 'FB', '$question', '$answer')";

if ($conn->query($sql) === TRUE) {
  header("location:../add-questions1.php?rp=0357&eid=$examid");  	
} else {
 header("location:../add-questions1.php?rp=3903&eid=$examid");
}


}


}else{
	
}
	
}else{
	
header("location:../");	
	
}


?>