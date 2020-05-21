<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';
if (isset($_GET['sid'])) {
include '../database/config.php';
$cat_name = mysqli_real_escape_string($conn, $_GET['sid']);


$stda = 0;
$stdb = 0;



$sql = "SELECT * FROM tbl_users WHERE category = '$cat_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $recruiter = $row['recruiter'];
   if ($recruiter == ""){
     $stda++;
   }else {
    $stdb++; 
     
   }
   
    }
} else {

}


$conn->close(); 
}else{
//  header("location:./");
echo "hey";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Download File</title>
    <!-- css files -->
<link rel="stylesheet" href="css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
<link rel="stylesheet" href="css/style1.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all"/> <!-- Owl-Carousel-CSS -->
<link rel="stylesheet" href="css/easy-responsive-tabs.css"><!-- tabs-css -->
<link rel="stylesheet" href="css/monthly.css">  <!-- Calender-CSS -->
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" /> <!-- pop-up-box -->
<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=latin-ext,vietnamese" rel="stylesheet">
    
    
    
     <style type="text/css">
        body
        {
            font-family: Arial;
            font-size: 10pt;
        }
        table
        {
            border: 1px solid #ccc;
            border-collapse: collapse;
        }
        table th
        {
            background-color: #F7F7F7;
            color: #333;
            font-weight: bold;
        }
        table th, table td
        {
            padding: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    
    <br />
    <div class="table-responsive">
                       <?php
                       include '../database/config.php';
                       $cat_name = mysqli_real_escape_string($conn, $_GET['sid']);
                       $sql = "SELECT * FROM tbl_users WHERE role = 'student' AND category='$cat_name' ORDER BY first_name";
                       
                                           $result = $conn->query($sql);

                                           if ($result->num_rows > 0) {
                    print '
                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        
                                        <tr>
                                        <th colspan="8">'.$cat_name.'</th></tr>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Score</th>
                                                
                                                <th>Time</th>
                                                
                                            </tr>
                                        ';
                                            $i = 1;
                                            $app = 0;
$notapp = 0;
                                           while($row = $result->fetch_assoc()) {
                         
                         $status = $row['acc_stat'];
                         if ($status == "1") {
                         $st = '<p class="text-success">INVITED</p>';
                         
                         }else{
                         $st = '<p class="text-danger">INACTIVE</p>'; 
                                               
                         }
$nameofcd = $row['user_id'];
$quest = 0;
$sql3 = "SELECT * FROM tbl_assessment_records WHERE student_id = '$nameofcd' AND exam_id='EX-550055'";
$sql4 = "SELECT * FROM tbl_assessment_records WHERE student_id = '$nameofcd' AND exam_id='EX-135348'";
$result3 = $conn->query($sql3);
$result4 = $conn->query($sql4);
if ($result4->num_rows > 0) {
    while($row4 = $result4->fetch_assoc()) {
         $st2score = $row4['score']."%";
                                   }
}
else{
    $st2score = '<p class="text-danger">-</p>';
}

if ($result3->num_rows > 0) {

        $cdstat = "<p style='color:green'>Appeared</p>";
        $app = $app + 1; 
        $stl = '<a href="report/candidate_rep.php?sid='.$row['user_id'].'" target="_blank"><button class="btn btn-info">View</button></a>';
         while($row3 = $result3->fetch_assoc()) {
         $stscore = $row3['score']."%";
        
                                           }
    
    } 
    else {
        $cdstat = "<p style='color:red'>Invited - Not Appeared</p>";
        $notapp = $notapp + 1; 
        $stl = '<p class="text-danger">Not Appeared Yet</p>';
        $stscore = '<p class="text-danger">-</p>';
    }
$total = $stscore + $st2score;
    $total = $total/2;
    $total = $total."%";
// Current date and time
$datetime = $row['date'];

// Convert datetime to Unix timestamp
$timestamp = strtotime($datetime);

// Subtract time from datetime
$time = $timestamp + (330 * 60);

// Date and time after subtraction
$datetime = date("Y-m-d H:i:s", $time);
                                          print '

                           <tr>
                           <td>'.$i.'</td>
                                                <td>'.ucwords($row['first_name']).'</td>
                                                <td>'.$row['email'].'</td>
                                                <td>'.$cdstat.'</td>
                                                <td>'.$stscore.'</td>
                                                
                                                <td>'.$datetime.'</td>
                                                
                                                
                                                
                                                
          
                                            </tr>';
                                            $i++;
                                            
                                           }
                       
                       print '
                     
                                       </table>  ';
                                       
                                            } else {
                      print '
                        <div class="alert alert-info" role="alert">
                                        Nothing was found in database.
                                    </div>';
    
                                           }
                                           $conn->close();
                       
                       ?>
 <script type="text/javascript">

//     var simple = <?php echo $app; ?>;
//     console.log(simple);
//     var complex = <?php echo $notapp; ?>;
//     console.log(complex);
//     document.getElementById("appeared").innerHTML = simple;
//     document.getElementById("notappeared").innerHTML = complex;
//     document.getElementById("invited").innerHTML = complex+simple;
    
 </script>

<center><input type="button" id="btnExport" class="btn btn-sucess" value="Download File" style="padding:10px 10px 10px 10px;background-color:#6ACA6B;color:white;font-size:14px" /></center>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="table2excel.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            
            $("#btnExport").click(function () {
                $("#example").table2excel({
                    filename: "Table.xls"
                });
            });
        });
    </script>
                 

                                    </div>
    
    
    <script src="js/easy-responsive-tabs.js"></script>
  <script>
    $(document).ready(function () {
    $('#verticalTab').easyResponsiveTabs({
    type: 'vertical',
    width: 'auto',
    fit: true
    });
    });
  </script>
  
</body>
</html>
