<?php
include '../../database/config.php';
include '../includes/check_user.php'; 
include '../includes/check_reply.php';
$exid = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "UPDATE tbl_examinations SET status='Active' WHERE exam_id='$exid'";

if ($conn->query($sql) === TRUE) {
    header("location:../index.php");
} else {
    header("location:../index.php");
}

$conn->close();
?>
