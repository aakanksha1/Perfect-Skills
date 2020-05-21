<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';
include 'nstyle2.php';
?>
<!DOCTYPE html>
<html>
   
<head>
        
  <title>PS | Analytics</title>
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
        <a class="nav-link" href="logout.php"><button class="navbutton">Logout</button></a>
      </li>
      
    </ul>
  </div>
</nav>
<div class="container-fluid" style="padding: 10px;">
  <div class="row">
    <div class="col-lg-12  md-auto sm-auto  pad">
      <div align="center">
         <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." style="width: 300px; padding: 10px; border: 1px solid #d5d5d5; border-radius: 5px;">
         </div>
     <div class="nav nav-tabs" role="tablist" style="border: none; padding-left: 20px;">
          <a role="presentation" class="nav-item nav-link active" href="#tab5" role="tab" data-toggle="tab">Appeared</a>
          <a role="presentation" class="nav-item nav-link" href="#tab6" role="tab" data-toggle="tab">Invited</a>
    </div>
    <div class="tab-content">
       <div role="tabpanel" class="tab-pane active fade show" id="tab5" >
        <div class="table-responsive tablediv">
            <?php
              $catid = $_GET['eid'];
              include '../database/config.php';
              $sql = "SELECT * FROM tbl_assessment_records ORDER BY exam_name asc ";
              $result = $conn->query($sql);                
              if ($result->num_rows > 0)
               {
                    print '
                         <table id="myTable" class="table table-striped" style="color:black;">
                            <tr>
                             <th>S.No</th>
                             <th>Candidate Name</th>
                             <th>Section Name</th>
                             <th>Section Status</th>
                             <th>Date Appeared</th>
                             <th>Level</th>
                             <th>Score</th>
                             <th>Performance</th>
                            </tr>';
                     $n = 1;
                     while($row = $result->fetch_assoc()) 
                     {
                       $sid = $row['student_name'];
                        print '
                           <tr>
                            <td>'.$n.'</td>
                            <td>'.$row['student_name'].'</td>
                            <td>'.$row['exam_name'].'</td>
                            <td>APPEARED</td>
                            <td>'.$row['date'].'</td>
                            <td id="stscore1">'.$row['status'].'</td>
                            <td id="stscore1">'.$row['score'].'</td>
                            <td><a href="report/candidate_rep.php?sid='.$row['student_id'].'" target="_blank"><button>View</button></a></td>
                           </tr>';
                           $n++;
                      }
                       
                       print '</table>  ';
                }
               else 
                {
                  print '
                        <div class="alert alert-info" role="alert">
                            Nothing was found in database.
                        </div>';
    
                }
                $conn->close();
  ?>
    </div>
 </div>
 <div role="tabpanel" class="tab-pane fade" id="tab6">
    <div class="table-responsive tablediv table-striped">
    <?php
      include '../database/config.php';
      $sql = "SELECT * FROM tbl_users WHERE role = 'student' ORDER BY category";
      $result = $conn->query($sql);
      if ($result->num_rows > 0)
       {
         print '
                <table id="myTable1" class="display table" style="color:black">
                <tr>
                
                <th>S.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Test</th>
                <th>Status</th>
                </tr>';
        $i = 1;
        while($row = $result->fetch_assoc()) 
        {
          $status = $row['acc_stat'];
          if ($status == "1") 
          {
             $st = '<p class="text-success">INVITED</p>';
             $stl = '<a href="pages/make_sd_in.php?id='.$row['user_id'].'">Make Inactive</a>';
          }
          else
          {
               $st = '<p class="text-danger">INACTIVE</p>'; 
               $stl = '<a href="pages/make_sd_ac.php?id='.$row['user_id'].'">Make Active</a>';                         
          }
          $nameofcd = $row['user_id'];
          $quest = 0;
          $sql3 = "SELECT * FROM tbl_assessment_records WHERE student_id = '$nameofcd'";  
          $result3 = $conn->query($sql3);
          if ($result3->num_rows > 0) 
          {
            $cdstat = "<p style='color:green'>Appeared</p>";
          }
          else
          {
            $cdstat = "<p style='color:red'>Invited - Not Appeared</p>";
          }
          print '
                <tr>
                  <td>'.$i.'</td>
                  <td>'.$row['first_name'].' '.$row['last_name'].'</td>
                  <td>'.$row['email'].'</td>
                  <td>'.$row['category'].'</td>
                  <td>'.$cdstat.'</td>
                </tr>';
                $i++;
        }
        print '</table>';
      } 
      else 
      {
       print '
              <div class="alert alert-info" role="alert">
                Nothing was found in database.
              </div>';
      }
      $conn->close();
?>


     
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
<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
function myFunction1() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable1");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>