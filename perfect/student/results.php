<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';
include 'nstyle2.php';
$qrcodetxt = 'ID:'.$myid.', NAME: '.$myfname.' '.$mylname.', GENDER: '.$mygender.', DEPARTMENT : '.$mydepartment.', CATEGORY : '.$mycategory.'';
?>

<!DOCTYPE html>
<html>
   
<head>
        
  <title>PS | Learning</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<nav class="navbar navbar-expand-lg " style="background-color: transparent; border-bottom: 2px solid #26657b; color:#26657b">
<span class="navbar-brand mr-auto">New City Contracting</span>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span style="color: #26657b !important;">&#x2630;</span>
</button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php"><button class="navbutton">Dashboard</button></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php"><button class="navbutton">Profile</button></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="logout.php"><button class="navbutton">Logout</button></a>
      </li>
      
    </ul>
  </div>
</nav>
<div class="container-fluid maincontainer">
<div class="container-fluid containerbg">
    <div class="row">
      <div class="col-lg-6 offset-lg-3 md-auto sm-auto  pad" style="color: black!important;">
           <div class="formcls" style="height: 700px;">
           <?php
                       include '../database/config.php';
                       $sql = "SELECT DISTINCT tag,exam_id FROM tbl_questions ";
                       $result = $conn->query($sql);
                       if ($result->num_rows > 0) 
                       {
                         while($row = $result->fetch_assoc()) {
                         $status = $row['status'];
                         if ($status == "Active") 
                         {
                         $st = '<p class="" style="text-decoration:none">ACTIVE</p>';
                         $stl = '<a class="" style="text-decoration:none"  href="test_sections.php?id='.row['name'].'" target="_blank"><button class="btn btn-success">Take Assessment</button></a>';
                         }
                         else
                         {
                         $st = '<p class="text-danger">INACTIVE</p>'; 
                         $stl = '<p class="text-danger"><button class="btn btn-default">Take Assessment</button></a></p>';                         
                         }
                         $os = " ";
                         $exam = $row['exam_id'];
                         $sql1 = "SELECT * FROM tbl_examinations where exam_id='$exam' ";
                         $result1 = $conn->query($sql1);
                         if ($result1->num_rows > 0) 
                         {
                          while($row1 = $result1->fetch_assoc())
                          {
                                 $os = $row1['exam_name'];
                          }
                        }
                        else
                        {
                          $os=" ";
                        }
                         
                        $rowis = $row['name'];
                        $tagis = $row['tag'];
                        print '
                                <span style="color:black; font-size:25px; font-weight:bolder;">'.$row['tag'].'</span><br>
                                <a href="https://www.youtube.com/results?search_query='.$os.' '.$row['tag'].'" target="_blank" style="color:#26657b; text-decoration:none;"><i class="fa fa-youtube-play" style="font-size:30px"></i> Youtube</a><br>
                                <a href="https://www.udemy.com/courses/search/?q='.$os.' '.$row['tag'].'&p=1&price=price-free" target="_blank" style="color:#26657b; text-decoration:none;"><img src="udemy-logo-blue.png" height="25" width="30"> Udemy</a>
                               <br><hr>';

                       }
                     }
                                           $conn->close();
                       
                       ?>
                        </div>
     </div>
   </div>
</div>
</div>
<br><br><br>
<nav class="navbar navbar-expand-lg navbar-dark fixed-bottom" style="background-color: #26657b;">
<a href="#" class="navbar-brand mx-auto"><img src="../ps_logo1.png" height="40" width="130"></a>
</nav>    
</body>
</html>
