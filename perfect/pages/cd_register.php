<?php
date_default_timezone_set('Africa/Dar_es_salaam');
include '../database/config.php';
include '../includes/uniques.php';
$student_id = 'S'.get_rand_numbers(3).'-'.get_rand_numbers(3).'-'.get_rand_numbers(3).'';
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);;
$email = mysqli_real_escape_string($conn, $_POST['user']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);;
$department = "NA";
$category = mysqli_real_escape_string($conn, $_POST['test']);
$address = "NA";
$dob = "NA";
$branch = "NA";
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$login = mysqli_real_escape_string($conn, $_POST['login']);

// $sql = "SELECT * FROM tbl_users WHERE email = '$email'";
$sql = "SELECT * FROM tbl_users WHERE user_id = '$email' OR email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo '<script>alert("Already Registered login please.");location.replace("../index.php")</script>';
    
} else {

$sql = "INSERT INTO tbl_users (user_id, first_name, last_name, gender, email, phone, department, category,role,acc_stat,login,branch)
VALUES ('$student_id', '$fname', '$lname', '$gender','$email', '$phone', '$department', 'BDA Co-ordinator','student',1,'$login','$branch')";

if ($conn->query($sql) === TRUE) {

	session_start();
	$_SESSION['login'] = true;
	$_SESSION['first_name'] = $fname;
	$_SESSION['last_name'] = $lname;
	$_SESSION['gender'] = $gender;
	$_SESSION['email'] = $email;
	$_SESSION['phone'] = $phone;
	$_SESSION['department'] = $department;
	$_SESSION['role'] = "student";
	$_SESSION['avatar'] = "";
	$_SESSION['myid'] = $student_id;
	$_SESSION['mycategory'] = $category;
    $_SESSION['myempid'] = $branch;	
    $_SESSION['dob']="";
    $_SESSION['address']="";
	$accstat =1;
	if ($accstat == "0") {
	 header("location:../?rp=5732");	
	}else{
		$location = strtolower('student');
	header("location:../$location/");	
	}
} 
else {
echo mysqli_error($conn);
}


}

$conn->close();
?>