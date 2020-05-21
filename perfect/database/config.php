<?php
error_reporting(0);
$servername = "localhost";
$username = "perfect6_nc1";
$password = "Ednations@2017";


$dbname = "perfect6_newcity";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("<h2>Database Connection Failure : " . $conn->connect_error . "</h2><hr>");
} 
?>