<?php
include '../database/config.php';
if(isset($_POST['sgup']))
{
	$student_id = 'S'.get_rand_numbers(3).'-'.get_rand_numbers(3).'-'.get_rand_numbers(3).'';
    $fn=$_POST['fname'];
    $ln=$_POST['lname'];
    $phone=$_POST['phone'];
    $email=$_POST['user'];
    $login=$_POST['login'];
    $gender=$_POST['gender'];
    $test=$_POST['test'];
    echo $fn;
    $find="SELECT * FROM tbl_users where email='$email'";
    if($findr=$conn->query($find))
    {
    	echo "<script>alert('found')</script>";

     }
     else
     {
     	echo mysqli_error($conn);
     }
    $findnum=mysqli_num_rows($findr);
    if($findnum==1)
    {
    	echo "<script>alert('Account already exists login or create new.')</script>";
    }
    else
    {
    $sql = "INSERT INTO tbl_users (user_id, first_name, last_name, gender, email, phone, category,login,role,acc_stat,branch)VALUES ('$student_id', '$fn', '$ln', '$gender', '$email', '$phone', '$test','$login','student',1,'')";
    if($run=$conn->query($sql))
    {
    	$_SESSION['first_name'] = $fn;
		$_SESSION['last_name'] = $ln;
		$_SESSION['gender'] = $gender;
		$_SESSION['email'] = $email;
		$_SESSION['phone'] = $phone;
		$_SESSION['department'] ="";
		$_SESSION['role'] = "student";
		$_SESSION['avatar'] = "";
		$_SESSION['myid'] = $student_id;
		$_SESSION['mycategory'] = $test;
    	$_SESSION['myempid'] = "";	
		$accstat = 1;
	    echo "<script>location.replace('../student/index.php')";
    }
    else
    {
    	echo "<script>alert('Could not signup sorry for inconvinience.')</script>";
    }
     }
    }
    
?>