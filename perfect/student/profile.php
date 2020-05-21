<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';
include 'nstyle2.php';
$qrcodetxt = 'ID:'.$myid.', NAME: '.$myfname.' '.$mylname.', GENDER: '.$mygender.', DEPARTMENT : '.$mydepartment.', CATEGORY : '.$mycategory.'';
?>

<!DOCTYPE html>
<html>
   
<head>
        
  <title>PS | Student Profile</title>
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
        <a class="nav-link" href="index.php"><button class="navbutton">Dashboard</button></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="results.php"><button class="navbutton">Learn</button></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="logout.php"><button class="navbutton">Logout</button></a>
      </li>
      
    </ul>
  </div>
</nav>
<div class="container-fluid">
<div class="container-fluid" style="padding: 10px;">

    
    <div class="row" style="color: black !important;">
      <div class="col-lg-6 md-auto sm-auto">     
        <div class="formcls"  style="color: black !important; height: 100%;">
          <div align="center">
          <?php 
        if ($myavatar == NULL) {
        print' <img width="150" height="150" src="profile-logo.png" alt="'.$myfname.'">';
        }else{
        echo '<img src="data:image/jpeg;base64,'.base64_encode($myavatar).'" width="150" height="150" alt="'.$myfname.'"/>';  
        }
        ?>
      </div>
        <br><br>
        <label>Registration Number</label><br>
        <b><?php echo "$myid"; ?></b><br><br>
        <label>Name</label><br>
        <b><?php echo ucwords($myfname.$mylname); ?></b><br><br>
        <label>Email Address</label><br>
        <b><?php echo "$myemail"; ?></b><br><br>
        <label>Category</label><br>
        <b><?php echo "$mycategory"; ?></b><br><br>   
      </div>
      <br><br>
    </div>
    <div class="col-lg-6 md-auto sm-auto">
      <div class="formcls" style="height: 93.5%;">
       <div class="table-responsive table-striped">
                       <?php
                       include '../database/config.php';
                       $sql = "SELECT * FROM tbl_assessment_records WHERE student_id = '$myid'";
                                           $result = $conn->query($sql);

                                           if ($result->num_rows > 0) {
                    print '
                    <table style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>Test</th>
                      
                        <th>Score</th>
                        <th>Date</th>
                                                <th>Status</th>
                        
                            
                                   
                                            </tr>
                                        </thead>
                                        <tbody>';
     
                                           while($row = $result->fetch_assoc()) {

                                          print '
                           <tr>
                                                <td>'.$row['exam_name'].'</td>
                         
                        <td>'.$row['score'].'%</td>
                                                <td>'.$row['date'].'</td>
                        <td>'.$row['status'].'</td>
                                                
                    
          
                                            </tr>';
                                           }
                       
                       print '
                     </tbody>
                                       </table>  ';
                                            } else {
                      print '
                        <div class="alert alert-info" role="alert">
                                        Oops '.$myfname.'. Seems like you have not appeared for any tests yet . But, feel free to learn from the resources below
                                    </div>';
    
                                           }
                                           $conn->close();
                       
                       ?>


                 

                                    </div>
     </div>
     <br><br><br>
     </div>
   </div>
</div>
<br><br><br>
<nav class="navbar navbar-expand-lg navbar-dark fixed-bottom" style="background-color: #26657b;">
<a href="#" class="navbar-brand mx-auto"><img src="../ps_logo1.png" height="40" width="130"></a>
</nav>    
</body>
</html>
