<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';
include '../nstyle2.php';
if (isset($_GET['eid'])) {
include '../database/config.php';
$exam_id = mysqli_real_escape_string($conn, $_GET['eid']);
$sql = "SELECT * FROM tbl_examinations WHERE exam_id = '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
     $excate = $row['category'];
   $exsubject = $row['subject'];
   $exname = $row['exam_name'];
   $exdate = $row['date'];
   $exduration = $row['duration'];
   $expassmark = $row['passmark'];
   $exreex = $row['re_exam'];
   $exterms = $row['terms'];
    }
} else {
    header("location:./");
}
$conn->close(); 
}else{
  header("location:./");
}
?>
<!DOCTYPE html>
<html>
<head>  
  <title>PS | Questions</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
      <a class="nav-link"><button class="navbutton" onclick="history.go(-1)">Return</button></a>
   
      </li>

      <li class="nav-item">
        <a class="nav-link" href="logout.php"><button class="navbutton">Logout</button></a>
      </li>
      
    </ul>
  </div>
</nav>
<div class="container-fluid maincontainer">
  <div class="row">
    <div class="col-lg-6  offset-lg-3 md-auto sm-auto  pad">
 <div class="formcls" id="result" style="overflow-y: scroll; height: 700px; color: black;">
 <form action="pages/update_exam.php" method="POST">
    <label>Name</label><br>
    <input type="text" value="<?php echo"$exname"; ?>" placeholder="Enter exam name" name="exam" required autocomplete="off"><br><br>
    <label>Duration (Minutes)</label><br>
    <input type="number"  value="<?php echo"$exduration"; ?>" placeholder="Enter exam duration" name="duration" required autocomplete="off"><br><br>
    <input type="hidden"  value="<?php echo"$expassmark"; ?>" placeholder="Enter passmark" name="passmark" required autocomplete="off">
    <label>RE Test (if you take exam then show it again after some days)</label><br>
    <input type="number"  value="<?php echo"$exreex"; ?>" placeholder="Enter days to attempt" name="attempts" required autocomplete="off"><br><br>
    <label >Deadline</label><br>
    <input type="text" value="<?php echo"$exdate"; ?>" name="date" required autocomplete="off" placeholder="Select deadline"><br><br>
    <div class="form-group" style="display:none">
                                            <label for="exampleInputEmail1">Select Subject</label>
                                            <select class="form-control" name="subject" required>
                      <option value="" selected disabled>-Select subject</option>
                      <?php
                      include '../database/config.php';
                      $sql = "SELECT * FROM tbl_subjects WHERE status = 'Active' ORDER BY name";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
    
                                            while($row = $result->fetch_assoc()) {
                      if ($exsubject == $row['name']) {
                      print '<option selected value="'.$row['name'].'">'.$row['name'].'</option>';  
                      }else{
                      print '<option value="'.$row['name'].'">'.$row['name'].'</option>'; 
                      }
                                            
                                            }
                                           } else {
                          
                                            }
                                             $conn->close();
                       ?>
                      
                      </select>
                                        </div>
                    
                    <div class="form-group" style="display:none">
                                            <label for="exampleInputEmail1">Change Test</label>
                                            <select class="form-control" name="category" required>
                      <option value="" selected disabled>-Select category-</option>
                      <?php
                      include '../database/config.php';
                      $sql = "SELECT * FROM tbl_categories WHERE status = 'Active' ORDER BY name";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
    
                                            while($row = $result->fetch_assoc()) {
                                            if ($excate == $row['name']) {
                      print '<option selected value="'.$row['name'].'">'.$row['name'].'</option>';  
                      }else{
                      print '<option value="'.$row['name'].'">'.$row['name'].'</option>'; 
                      }
                                            }
                                           } else {
                          
                                            }
                                             $conn->close();
                       ?>
                      
                      </select>
                                        </div>
                  
    <input type="hidden" name="examid" value="<?php echo "$exam_id"; ?>">
    <button type="submit">Submit</button>

                               
</div> 
   </div>
  </div>


</div>
<span style="padding: 20px;"></span>
<nav class="navbar navbar-expand-lg footer" style="background-color: #26657b;">
<a href="#" class="navbar-brand mx-auto"><img src="../ps_logo1.png" height="40" width="130"></a>
</nav>    
</body>
</html>
