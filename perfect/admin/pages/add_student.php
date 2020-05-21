<?php
date_default_timezone_set('Africa/Dar_es_salaam');
include '../../database/config.php';
include '../../includes/uniques.php';
$student_id = 'S'.get_rand_numbers(3).'-'.get_rand_numbers(3).'-'.get_rand_numbers(3).'';
$fname = ucwords(mysqli_real_escape_string($conn, $_POST['fname']));
$lname = ucwords(mysqli_real_escape_string($conn, $_POST['lname']));
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$department = mysqli_real_escape_string($conn, $_POST['department']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$address = ucwords(mysqli_real_escape_string($conn, $_POST['address']));
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$recname = mysqli_real_escape_string($conn, $_POST['recname']);
// $newpwd = 'ST'.get_rand_numbers(6);
$newpwd = '123456';

$instructions = 'https://recruit.sourcegamma.info/Perfect%20Skills%20Assesment%20Guide.pdf';

$sql = "SELECT * FROM tbl_users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $sem = $row['email'];
	$sph = $row['phone'];
	if ($sem == $email) {
$to = $email;
$subject = "Welcome To Perfect Skill Test";
$link = "https://sourcegamma.info/newcity/stindex.php";
$msg = "Hi\n 
Take a quick test to expedite your candidature.\n

Assessment Details : \n
Assessment Link: $link \n
Your Credentials Are \n
Username : $email \n
Password : $newpwd \n
Note: Please read the instructions carefully before starting the assessment. \n

Once logged in using above credentials you will find assessment for your related technology. \n
1. Once you click on take assessment,a pop-up appears asking to “allow your camera” (Mandatory to Allow the camera, else you cannot continue). \n
2. Click on BEGIN Assessment to start the test (Note: Once the test starts you cannot go back or switch the screen.) \n
3. Please click on each section and answer the questions to complete your test. \n
4. Your marked answers are automatically saved by the platform. \n
5. Once you mark all your answers in every section,then only you need to click on SUBMIT button. \n
6. Please note you need to click on the number to view the question and mark your answer or click on Next Button. \n
7. With this your test will be completed and the results will be shared with your recruiter. \n
8. Do not click submit till you finish visiting all the questions. \n
At any point you can reach out to our support contact given below: \n
Rishabh Gupta : +918446121445 \n
Pratik Gade : +919860430568 \n
Best Luck! \n
Team Perfect Skill \n
";
$headers = "From: Assessment@perfectskills.in";

mail($to,$subject,$msg,$headers);


$topratik = "pratikgade13@gmail.com";
$subject1 = "Existing User Invited To Perfect Skill Test";
$link1 = "https://sourcegamma.info/newcity/stindex.php";
$msg1 = "Hi\n 
New User Added.\n
Assessment Details : \n
Assessment Link: $link \n
Your Credentials Are \n
Username : $email \n
Password : $newpwd \n
Note: Please read the instructions carefully before starting the assessment. \n

Once logged in using above credentials you will find assessment for your related technology. \n
1. Once you click on take assessment,a pop-up appears asking to “allow your camera” (Mandatory to Allow the camera, else you cannot continue). \n
2. Click on BEGIN Assessment to start the test (Note: Once the test starts you cannot go back or switch the screen.) \n
3. Please click on each section and answer the questions to complete your test. \n
4. Your marked answers are automatically saved by the platform. \n
5. Once you mark all your answers in every section,then only you need to click on SUBMIT button. \n
6. Please note you need to click on the number to view the question and mark your answer or click on Next Button. \n
7. With this your test will be completed and the results will be shared with your recruiter. \n
8. Do not click submit till you finish visiting all the questions. \n
At any point you can reach out to our support contact given below: \n
Rishabh Gupta : +918446121445 \n
Pratik Gade : +919860430568 \n
Best Luck! \n
Team Perfect Skill \n
";
$headers = "From: Assessment@perfectskills.in ";

mail($topratik,$subject1,$msg1,$headers);

$sql = "UPDATE tbl_users SET category='$category' ,recruiter='$recname',login='$newpwd'  WHERE email='$email'";

if ($conn->query($sql) === TRUE) {
//    echo "Done";
//echo $email."<br>";
//	 echo $category."<br>";
//    echo "Name of Rec".$recname."<br>";
    header("location:../index.php?rp=6310");
}
else{
    echo "Error";
    
}


	 //header("location:../index.php?rp=1189");	
	 
	}else{

	
	}
	
    }
} else {

$sql = "INSERT INTO tbl_users (user_id, first_name, last_name, gender, dob, address, email, phone, department, category,recruiter,login)
VALUES ('$student_id', '$fname', '$lname', '$gender', '$dob', '$address', '$email', '$phone', '$department', '$category','$recname','$newpwd')";

if ($conn->query($sql) === TRUE) {
    
$to = $email;
$subject = "Welcome To Perfect Skill Test";
$link = "https://sourcegamma.info/newcity/stindex.php";
$msg = "Hi\n 
Take a quick test to expedite your candidature.\n

Assessment Details : \n
Assessment Link: $link \n
Your Credentials Are \n
Username : $email \n
Password : $newpwd \n
Note: Please read the instructions carefully before starting the assessment. \n

Once logged in using above credentials you will find assessment for your related technology. \n
1. Once you click on take assessment,a pop-up appears asking to “allow your camera” (Mandatory to Allow the camera, else you cannot continue). \n
2. Click on BEGIN Assessment to start the test (Note: Once the test starts you cannot go back or switch the screen.) \n
3. Please click on each section and answer the questions to complete your test. \n
4. Your marked answers are automatically saved by the platform. \n
5. Once you mark all your answers in every section,then only you need to click on SUBMIT button. \n
6. Please note you need to click on the number to view the question and mark your answer or click on Next Button. \n
7. With this your test will be completed and the results will be shared with your recruiter. \n
8. Do not click submit till you finish visiting all the questions. \n
At any point you can reach out to our support contact given below: \n
Rishabh Gupta : +918446121445 \n
Pratik Gade : +919860430568 \n
Best Luck! \n
Team Perfect Skill \n
";
$headers = "From: Assessment@perfectskills.in ";

mail($to,$subject,$msg,$headers);


$topratik = "pratikgade13@gmail.com";
$subject1 = "New User To Perfect Skill Test";
$link1 = "https://sourcegamma.info/newcity/stindex.php";
$msg1 = "Hi\n 
New User Added.\n
Assessment Details : \n
Assessment Link: $link \n
Your Credentials Are \n
Username : $email \n
Password : $newpwd \n
Note: Please read the instructions carefully before starting the assessment. \n

Once logged in using above credentials you will find assessment for your related technology. \n
1. Once you click on take assessment,a pop-up appears asking to “allow your camera” (Mandatory to Allow the camera, else you cannot continue). \n
2. Click on BEGIN Assessment to start the test (Note: Once the test starts you cannot go back or switch the screen.) \n
3. Please click on each section and answer the questions to complete your test. \n
4. Your marked answers are automatically saved by the platform. \n
5. Once you mark all your answers in every section,then only you need to click on SUBMIT button. \n
6. Please note you need to click on the number to view the question and mark your answer or click on Next Button. \n
7. With this your test will be completed and the results will be shared with your recruiter. \n
8. Do not click submit till you finish visiting all the questions. \n
At any point you can reach out to our support contact given below: \n
Rishabh Gupta : +918446121445 \n
Pratik Gade : +919860430568 \n
Best Luck! \n
Team Perfect Skill \n
";
$headers = "From: Assessment@perfectskills.in ";

mail($topratik,$subject1,$msg1,$headers);

header("location:../index.php?rp=6310");
    

} else {
  header("location:../index.php?rp=9157");
}


}

$conn->close();
?>