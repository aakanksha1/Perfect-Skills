<?php
date_default_timezone_set('Africa/Dar_es_salaam');
include '../database/config.php';
include '../includes/uniques.php';
$email = mysqli_real_escape_string($conn, $_POST['user']);
$login = mysqli_real_escape_string($conn, $_POST['login']);

// $sql = "SELECT * FROM tbl_users WHERE email = '$email'";
$sql = "SELECT * FROM tbl_users WHERE user_id = '$email' OR email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

   
    while($row = $result->fetch_assoc()) {
    session_start();
	$_SESSION['login'] = true;
	$_SESSION['first_name'] = $row['first_name'];
	$_SESSION['last_name'] = $row['last_name'];
	$_SESSION['gender'] = $row['gender'];
	$_SESSION['dob'] = $row['dob'];
	$_SESSION['address'] = $row['address'];
	$_SESSION['email'] = $row['email'];
	$_SESSION['phone'] = $row['phone'];
	$_SESSION['department'] = $row['department'];
	$_SESSION['role'] = $row['role'];
	$_SESSION['avatar'] = $row['avatar'];
	$_SESSION['myid'] = $row['user_id'];
	$_SESSION['mycategory'] = $row['category'];
    $_SESSION['myempid'] = $row['branch'];	
	$accstat = $row['acc_stat'];
	if ($accstat == "0") {
	 header("location:../?rp=5732");	
	}else{
		$location = strtolower($row['role']);
	header("location:../$location/");	
	}

    }
    
} else {

echo "<script>alert('Account does not exists please Signup')</script>";

}

$conn->close();
?>