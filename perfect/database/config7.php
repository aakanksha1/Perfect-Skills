<?php
error_reporting(0);
$servername = "localhost";
$username = "u942694520_ab";
$password = "Ednations@2017";
//$dbname = "u942694520_db";

$dbname = "u942694520_ab";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("<h2>Database Connection Failure : " . $conn->connect_error . "</h2><hr>");
} 
?>