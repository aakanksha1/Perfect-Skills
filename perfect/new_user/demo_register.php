<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "oes_db");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Escape user inputs for security
$name = $mysqli->real_escape_string($_REQUEST['fname']);
$email = $mysqli->real_escape_string($_REQUEST['email']);
$pass = $mysqli->real_escape_string($_REQUEST['pass']);
$cpass = $mysqli->real_escape_string($_REQUEST['cpass']); 
// attempt insert query execution if passwords are same

if($pass==$cpass){
$sql = "INSERT INTO demo (name ,email,password) VALUES ('$name','$email','$pass')";
if($mysqli->query($sql) === true){
    echo "Records inserted successfully.";
	header('Location: analysis/index.php');
    
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
	}
else{
	echo "Password Do Not Match";
}
 
// Close connection
$mysqli->close();
?>