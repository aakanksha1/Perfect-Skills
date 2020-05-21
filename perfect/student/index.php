<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';
include 'nstyle2.php';
?>
<!DOCTYPE html>
<html>
   
<head>
        
  <title>PS | My Tests</title>
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
        <a class="nav-link" href="profile.php"><button class="navbutton">Profile</button></a>
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
<div class="container-fluid maincontainer">
<div class="container-fluid containerbg">
  <div>
<div style="width: 50%">
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <h2>Support</h2>
      <span class="close">&times;</span>
      
    </div>
    <div class="modal-body">
      <h3>For Any Assisstance</h3>
      <p>Contact @ +91-9860430568</p>
      <p>View Video Walkthrough</p>
      <!--<iframe id="cartoonVideo" width="560" height="315" src="//www.youtube.com/embed/YE7VzlLtp-4" frameborder="0" allowfullscreen></iframe>-->
      <iframe src="demo_vid.mp4"></iframe>

      </div>
    
    </div>
  </div>
</div>
</div>
  <div class="row">
    <div class="col-lg-6  md-auto sm-auto  pad">
      <div class="tclass">
      <?php
                       include '../database/config.php';
                       $sql = "SELECT * FROM tbl_examinations WHERE category = '$mycategory' ORDER BY exam_name";
                       $result = $conn->query($sql);
                       if ($result->num_rows > 0)
                        {
                        while($row = $result->fetch_assoc())
                         {
                          $status = $row['status'];
                          if ($status == "Active") {
                          $st = '<p style="text-decoration:none">ACTIVE</p>';
                         $stl = '<a style="text-decoration:none"  href="take-assessment.php?id='.$row['exam_id'].'"><button>Take Assessment</button></a>';
                         }else{
                         $st = '<p class="text-danger">INACTIVE</p>'; 
                                               $stl = '<p class="text-danger"><button class="btn btn-default">Take Assessment</button></a></p>';                         
                         }
                                          print '
                                          
                                          <div class="formcls" style="color:black;font-size:20px;">
                                          <p><b>'.$row['exam_name'].'</b></p>
                                          <p style="display:none">'.$row['subject'].'</p>
                                          <p>'.$row['date'].'</p>
                                          <p>'.$st.'</p>
                                          <p>'.$stl.'</p>
                                          </div> <br>';
                                           }
                       
                       print '
                     </tbody>
                                       </table>  ';
                                            } else {
                      print '
                        <div class="alert alert-info" role="alert">
                                        Nothing was found in database.
                                    </div>';
    
                                           }
                                           $conn->close();
                       ?>
                     </div>
    </div>
    <div class="col-lg-6 sm-auto md-auto" style="color: black;font-size: 20px;">
        <div class="pad">
        <h2 style="color:#26657b"><b>Assessment Process:</b></h2>
                                    <p>1. Click on Take Assessment button</p>
                                    <p>2. On the Assessment Information Page read the instructions carefully and then click on Begin Assessment button</p>
                                    <p>3. Do Not Move out of the Test Page or Reload on the assessment page, if done so the test will terminate</p>
                                    <p>4. Click on Submit button on last question to complete the test</p>
                                    <p>5. On completing the test click on Proceed and then Return to Dashboard button.</p>
                                    <p>6. Repeat steps 1-5 for all provided tests.</p>
                                    <p>Click to View Video Walkthrough <br><button id="myBtn" class="navbutton">View</button><br><br></p>
</div>
    </div>
  </div>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


</div>
</div>
<span style="padding: 20px;"></span>
<nav class="navbar navbar-expand-lg footer" style="background-color: #26657b;">
<a href="#" class="navbar-brand mx-auto"><img src="../ps_logo1.png" height="40" width="130"></a>
</nav>    
</body>
</html>
