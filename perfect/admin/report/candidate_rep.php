<?php 
session_start();
$val = 0;

if (isset($_GET['sid'])) {
  include '../../database/config.php';
    
$student_id = mysqli_real_escape_string($conn, $_GET['sid']);    
$sql1 = "SELECT * FROM `tbl_assessment_records` WHERE `student_id` = '$student_id' AND exam_id!='EX-422565' ";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {

    while($row1 = $result1->fetch_assoc()) {
        $exam_name1 = $row1['exam_name'];
        $exam_duration1 = $row1['duration'];
        $exam_date1  =$row1['date'];
        $exam_score1  =$row1['score'];
        $exam_status1 = $row1['status'];
        $rec_id = $row1['record_id'];
    }
} else {
    echo "<h1 class='text-center' style='color:red'>No Records Found for This Profile</h1><br>";
    echo "<h2 class='text-center'>Displaying Demo Content</h2>";
}
    


  $student_id = mysqli_real_escape_string($conn, $_GET['sid']);
  $sql = "SELECT * FROM tbl_users WHERE user_id = '$student_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
  $sdfname = $row['first_name'];
  $sdlname = $row['last_name'];
  $sdgender = $row['gender'];
  $sddob = $row['dob'];
  $sdaddress = $row['address'];
  $sdemail = $row['email'];
  $sdphone = $row['phone'];
  $sddepartment = $row['department'];
  $sdcategory = $row['category'];
  $sdavatar = $row['avatar'];
  $sdstat = $row['acc_stat'];
  $qrcodetxt = 'ID:'.$student_id.', NAME: '.$sdfname.' '.$sdlname.', GENDER: '.$sdgender.', DEPARTMENT : '.$sddepartment.', CATEGORY : '.$sdcategory.'';
    }
} else {
    header("../index.php");
}
  
}else{
  header("../index.php");
}


?>

<?php 
include '../nstyle2.php';
?>
<!DOCTYPE html>
<html>
   
<head>
        
  <title>PS | Candidate Report</title>
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
        <a class="nav-link"><button class="navbutton" onclick="printDiv()">Print</button></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../index.php"><button class="navbutton">Dashboard</button></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../logout.php"><button class="navbutton">Logout</button></a>
      </li>
    </ul>
  </div>
</nav>
<div class="container-fluid " style="padding: 20px;">
  <div class="row">
    <div class="col-lg-8 offset-lg-2 md-auto sm-auto  pad" style="color:black;">
      <div id="report">
      <div class="container-fluid" align="center" style="padding-bottom:25px;">
       <?php 
       $idval = $_GET['sid'];
       if(file_exists('../../student/pages/upload/'.$idval.'.png'))
       {
       echo " <img src='../../student/pages/upload/".$idval.".png' width='100px' height='100px' style='border: 1px solid transparent; border-radius:50%'"; 
       }
       else
       {
        echo " <img src='../../student/profile-logo.png' width='150px' height='150px'>"; 
       }
       ?>
      </div>
      <div class="container-fluid alert alt" style="color:#26657b;border: 2px solid #26657b;background-color: rgba(38,101,123,0.1)" align="center">
        <label> Name:&nbsp;</label><b><?php echo $sdfname."&nbsp;".$sdlname ?></b>&emsp;
        <label>Id:&nbsp;</label><b><?php echo "$student_id" ?></b>&emsp;
        <label>Email:&nbsp;</label><b><?php echo "$sdemail" ?></b><br><br>
        <label>Overall Score:&nbsp;</label> <b id="scorehere">00</b>%&emsp;
        <label>Appeared on:&nbsp;</label><b> <?php echo "$exam_date1" ?></b>&emsp;
        <label>Proficiency:&nbsp;</label> <b id="aggstatus">Null</b>&emsp;
    </div>
    <div id="pnum" style="width: 100%;display:none;">
      <canvas id="baronly" width="400" height="50"></canvas>
    </div>
    <script type="text/javascript">
      var arr=[];
      var data=[];
      var color=[];
      var bar=[];
      var colorag=[];
    </script>
     <div class="table-responsive tablediv">
                       <?php
                   include '../database/config.php';
                   $arr=array();
                   $sql = "SELECT * FROM tbl_assessment_records WHERE student_id = '$student_id' AND exam_id!='EX-422565'";
                                     $result = $conn->query($sql);

                                     if ($result->num_rows > 0) {
                                         
                  print '
                                   
                                    
                     <table id="resultexample" class="table table-bordered" style="color:black;">
                                     
                                            <tr>
                                                <th>S.No</th>
                                                <th>Section</th>
                                                <th>Total Questions</th>
                                                <th>Correct</th>
                                                <th>Score</th>
                                                <th>Status</th>
                                                <th id="dl">Detailed Report</th>
                                                
                                            </tr>
                                        ';
                                        $snumber = 1;
                                     while($row = $result->fetch_assoc()) {
                                         $val = $val + $row['score'];
                                         $valscore = $row['score'];
                                                    $recid = $row['record_id'];
                                                    $ename = $row['exam_name'];
                                         $sp=($row['correct_ques']/$row['total_ques'])*100*1000;
                                         $sp1=$sp/1000;
                                         if($sp1<=24)
                                         {
                                          echo '<script type="text/javascript">color.push(`#d9534f`); </script>';
                                            
                                         }
                                         else if($sp1>=25 && $sp1<=49)
                                         {
                                          echo '<script type="text/javascript">color.push(`#f0ad4e`); </script>';
                                            
                                         }
                                         else if($sp1>=50 && $sp1<=74)
                                         {
                                          echo '<script type="text/javascript">color.push(`#0275d8`); </script>';
                                            
                                         }
                                         else if($sp1>=75 && $sp1<=100)
                                         {
                                          echo '<script type="text/javascript">color.push(`#5cb85c`); </script>';
                                            
                                         }

                                         echo '<script type="text/javascript">arr.push(`'.$ename.'`); data.push(`'.$sp.'`);</script>'; 
                                                    $eid = $row['exam_id'];
                                                    $nname = $recid.$ename;
                                     print '
                                     
                                    
                                            <tr>
                                                <td>'.$snumber.'</td>
                                                <td>'.$row['exam_name'].'</td>
                                                <td>'.$row['total_ques'].'</td>
                                                <td>'.$row['correct_ques'].'</td>
                                                <td>'.$row['score'].'%</td>
                                                <td id="cdstatus1">'.$row['status'].'</td>
                                                <td><a href="../allq.php?eid='.$eid.'&sid='.$student_id.'" ><button>Detailed Report</button></a></td>
                                                
                                                
                                            </tr>
                                            
                                        
                                            ';
                                         $snumber = $snumber+1;
                                       $num = $rowcount=mysqli_num_rows($result);  
                                     }
                                       $ag = $val/$num;
                                       
                                      $agg = round($ag,2)*1000;
                                      $aggg=round($ag,2);
                                      if($aggg<=24)
                                         {
                                          echo '<script type="text/javascript">colorag.push(`#d9534f`); </script>';
                                            
                                         }
                                         else if($aggg>=25 && $aggg<=49)
                                         {
                                          echo '<script type="text/javascript">colorag.push(`#f0ad4e`); </script>';
                                            
                                         }
                                         else if($aggg>=50 && $aggg<=74)
                                         {
                                          echo '<script type="text/javascript">colorag.push(`#0275d8`); </script>';
                                            
                                         }
                                         else if($aggg>=75 && $aggg<=100)
                                         {
                                          echo '<script type="text/javascript">colorag.push(`#5cb85c`); </script>';
                                            
                                         }

                                      echo "<script>bar.push(`".$agg."`)</script>";
                   print '
                                     
                     </tbody>
                                       </table>  
                                       ';
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
           <div>
             <canvas id="barChart" width="400" height="120"></canvas>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script>
              var val1 = <?php echo $aggg ?>;
                console.log(data)

                
             if(val1>=0 && val1<=24)
                    {
                        document.getElementById("aggstatus").style.color = "#26657b";
                        document.getElementById("aggstatus").innerHTML = "Beginner";
                        document.getElementById("scorehere").innerHTML = val1;
                    }
                    else if(val1>=24 && val1<=49)
                    {
                        document.getElementById("aggstatus").style.color = "#26657b";
                        document.getElementById("aggstatus").innerHTML = "Intermediate";
                        document.getElementById("scorehere").innerHTML = val1;

                    }
                    else if(val1>=49 && val1<=74)
                    {
                        document.getElementById("aggstatus").style.color = "#26657b";
                        document.getElementById("aggstatus").innerHTML = "Advanced";
                        document.getElementById("scorehere").innerHTML = val1;
                    
                    }
                    else if(val1>=74 && val1<=100)
                    {
                        document.getElementById("aggstatus").style.color = "#26657b";
                        document.getElementById("aggstatus").innerHTML = "Proficient";
                        document.getElementById("scorehere").innerHTML = val1;
                    }
            </script>
            <script type="text/javascript">
  function printDiv() {

    $('#resultexample tr').find('td:eq(6),th:eq(6),td:eq(3),th:eq(3)').remove();
     window.print();
     location.replace(window.location.href)

}

       
Chart.defaults.global.defaultFontFamily = "Lato";

var horizontalBarChart = new Chart(barChart, {
   type: 'horizontalBar',
   data: {
      labels:arr,
      datasets: [{
         data:data ,
         backgroundColor:color, 
      }]
   },
   options: {
      tooltips: {
        enabled: false
      },
      responsive: true,
      legend: {
         display: false,
         position: 'bottom',
         fullWidth: true,
         labels: {
           boxWidth: 10,
           padding: 50
         }
      },
      scales: {
         yAxes: [{
           barPercentage: 0.75,
           gridLines: {
             display: true,
             drawTicks: true,
             drawOnChartArea: false
           },
           ticks: {
             fontColor: '#555759',
             fontFamily: 'Lato',
             fontSize: 18
           }
            
         }],
         xAxes: [{
             gridLines: {
               display: true,
               drawTicks: false,
               tickMarkLength: 5,
               drawBorder: false
             },
           ticks: {
             padding: 5,
             beginAtZero: true,
             fontColor: '#555759',
             fontFamily: 'Lato',
             fontSize: 20,
             callback: function(label, index, labels) {
              return label/1000;
             }
               
           },
            scaleLabel: {
              display: true,
              padding: 10,
              fontFamily: 'Lato',
              fontColor: '#555759',
              fontSize: 16,
              fontStyle: 700,
              labelString: 'Percentage'
            },
           
         }]
      }
   }
});

Chart.defaults.global.defaultFontFamily = "Lato";

var horizontalBarChart = new Chart(baronly, {
   type: 'horizontalBar',
   data: {
      datasets: [{
         data:bar ,
         backgroundColor:colorag, 
      }]
   },
   options: {
      tooltips: {
        enabled: false
      },
      responsive: true,
      legend: {
         display: false,
         position: 'bottom',
         fullWidth: true,
         labels: {
           boxWidth: 10,
           padding: 50
         }
      },
      scales: {
         yAxes: [{
           barPercentage: 0.75,
           gridLines: {
             display: true,
             drawTicks: true,
             drawOnChartArea: false
           },
           ticks: {
             fontColor: '#555759',
             fontFamily: 'Lato',
             fontSize: 18
           }
            
         }],
         xAxes: [{
             gridLines: {
               display: true,
               drawTicks: false,
               tickMarkLength: 5,
               drawBorder: false
             },
           ticks: {
             padding: 5,
             beginAtZero: true,
             fontColor: '#555759',
             fontFamily: 'Lato',
             fontSize: 20,
             callback: function(label, index, labels) {
              return label/1000;
             }
               
           },
            scaleLabel: {
              display: true,
              padding: 10,
              fontFamily: 'Lato',
              fontColor: '#555759',
              fontSize: 16,
              fontStyle: 700,
              labelString: 'Overall Performance'
            },
           
         }]
      }
   }
});


</script>