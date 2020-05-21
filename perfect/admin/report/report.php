<?php 

session_start();
if (isset($_GET['eid'])) {
include '../../database/config.php';
$exam_id = $_GET['eid'];
    $_SESSION["eid"] = $exam_id;
$sql = "SELECT * FROM tbl_assessment_records WHERE exam_id = '$exam_id'";
$result = $conn->query($sql);
    
if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
    $exam_name = $row['exam_name'];
    $idhere = $row['exam_id'];
       
    }
    
} else {
}
$sql1 = "SELECT * FROM tbl_examinations WHERE exam_id = '$exam_id'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {

    while($row1 = $result1->fetch_assoc()) {
        $exam_name1 = $row1['exam_name'];
        $exam_duration = $row1['duration'];
        $exam_date  =$row1['date'];
    }
} else {
}
$conn->close();
}else{
header("location:./");  
}


?>

<?php 
include '../nstyle2.php';
?>
<!DOCTYPE html>
<html>
   
<head>
        
  <title>PS | Section Stats</title>
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
        <a class="nav-link" href="../index.php"><button class="navbutton">Dashboard</button></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="logout.php"><button class="navbutton">Logout</button></a>
      </li>
      
    </ul>
  </div>
</nav>
<div class="container-fluid " style="padding: 20px;">
  <div class="row">
    <div class="col-lg-12 md-auto sm-auto  pad" style="color:black;">
      <div id="report">
      
     <div class="table-responsive tablediv">
                    <?php       include '../../database/config.php';
                       $sql = "SELECT * FROM tbl_assessment_records WHERE exam_id = '$exam_id' ORDER BY score DESC";
                                           $result = $conn->query($sql);

                                           if ($result->num_rows > 0) {
                    print '
                    <table id="example" class="table table-bordered table-striped">
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Student Name</th>
                                                <th>Student ID</th>
                                                <th>Score</th>
                                                <th>Status</th>
                                                 <th>Date</th>
                                                <th>Action</th>
                                                <th></th>
                                            </tr>';
                                        $snumber = 1;
                                           while($row = $result->fetch_assoc()) {
                                          print '
                           <tr>
                            <td>'.$snumber.'</td>
                                                <td>'.$row['student_name'].'</td>
                        <td>'.$row['student_id'].'</td>
                                                
                                                <td>'.$row['score'].'</span>%</b></td>
                        <td id="stats">'.$row['status'].'</td>
                        <td>'.$row['date'].'</td>
                                                <td><a href="candidate_rep.php?sid='.$row['student_id'].'" target="_blank"><button class="btn btn-success">View Details</button></a></td>
                                                <td>
                                                <a'; ?> onclick = "return confirm('Reactivate exam for <?php echo $row['student_name']; ?> ?')" <?php print ' href="../pages/re-activate.php?rid='.$row['record_id'].'&eid='.$exam_id.'"><button class="btn btn-default" style="background:#3AA7D2;color:white;border:0px solid white">Reactivate</button></a>
                                                </td>
                                              </tr>
                                              ';
                                              $snumber = $snumber+1;
                                              $sc = $row['score'];
                                               $num = $rowcount=mysqli_num_rows($result);  
                                           }
                       
                       print '
                                           
                     </tbody>
                                       </table>  
                                       <script>
                                           function checkme(){
                                           var status = '.$sc.';
                                           var rows= '.$num.';
                                           rows = rows+1;
                                           if(status>=0)
                                           {
                                           var a =0;
                                                while(a<rows)
                                                {
                                                    var x = document.getElementById("example").rows[a].cells;
                                                    x[4].innerHTML = a;
                                                    a=a+1;
                                                 }
                                           }
                                           
                                           }
                                           </script>
                                       
                                       ';
                                            } else {
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
           <div class="tablediv">
             <button onclick="printDiv('report')">Print</button>
           </div>
   
  </div>
</div>
</div>
<span style="padding: 20px;"></span>
<nav class="navbar navbar-expand-lg footer" style="background-color: #26657b;">
<a href="#" class="navbar-brand mx-auto"><img src="../../ps_logo1.png" height="40" width="130"></a>
</nav>    
</body>
</html>
            <script type="text/javascript">
  function printDiv(divName) {

     var originalContents = document.body.innerHTML;
    $('#example tr').find('td:eq(6),th:eq(6),td:eq(7),th:eq(7)').remove();

     var printContents = document.getElementById(divName).innerHTML;
     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>