<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';
include 'nstyle2.php';
?>
<!DOCTYPE html>
<html>
   
<head>
        
  <title>PS | Admin</title>
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
        <a class="nav-link" href="https://www.perfectskills.in/learn.php" target="_blank"><button class="navbutton">Skill Library</button></a>
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
      <div class="tclass">
        <?php
                       include '../database/config.php';
                       $sql = "SELECT * FROM tbl_categories ORDER BY status ASC";
                                           $result = $conn->query($sql);

                                           if ($result->num_rows > 0) {

     
                                           while($row = $result->fetch_assoc()) {
                         $status = $row['status'];
                         if ($status == "Active") {
                         $st = '<p class="text-success">ACTIVE</p>';
                         $stl = '<a href="pages/make_ct_in.php?id='.$row['category_id'].'" class="btn btn-success">Make Inactive</a>';
                         }else{
                         $st = '<p class="text-danger">INACTIVE</p>'; 
                                               $stl = '<a href="pages/make_ct_ac.php?id='.$row['category_id'].'" class="btn btn-danger">Make Active</a>';                        
                         }

                                               
                                               print'
                                               
                                               <div class="formcls" style="color:black;font-size:20px;">
                                                 <p>'.$row['name'].'</p>
                                               <a href="testview.php?eid='.$row['name'].'"><button>View Test</button></a>
                                               &nbsp;&nbsp;
                                               <a href="summary.php?eid='.$row['name'].'"></i><button>Reports</button></a>
                                                
                                               </div>
                                               
                                               ';
                                        
                                           }
                                               
                       
                                            } else {
                                            //     <div class="cardcontainer">
                                               
                                            //   <a href="indexinvite.php?eid='.$row['name'].'" style="color: black;padding: 4px 5px;text-align: center; text-decoration: none;display: inline-block;border-radius: 5px;border: 1px solid black;">Invite Candidates</a>
                                               
                                                
                                            
                                              
                                                    
                                            //     </div>   
                      print '
                        <div class="alert alert-info" role="alert">
                                        Nothing was found in database.
                                    </div>
                                    
                                    ';
    
                                           }
                                               
                                           $conn->close();
                       
                       ?>
     
      </div>
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
