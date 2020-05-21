<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';
include 'nstyle2.php';
include '../database/config.php';
$cid = $_GET['eid'];
$sql = "SELECT * FROM tbl_examinations WHERE category='$cid' ORDER BY exam_name ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
      while($row = $result->fetch_assoc())
       {
             $nameofexam = $row['exam_name'];
       }
}
else 
{
 print '
 <div class="alert alert-info" role="alert">
    Nothing was found in database.
 </div>';
}

$sql = "SELECT * FROM tbl_categories WHERE name='$cid'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
  while($row = $result->fetch_assoc()) 
  {
    $cname = $row['name'];
    $catid = $row['category_id'];
  }
}
else
{
  print '
  <div class="alert alert-info" role="alert">
     Nothing was found in database.
  </div>';
    
}
?>

<!DOCTYPE html>
<html>
   
<head>
        
<title>Perfect Skills | Sections    <?php echo $cid;  ?></title>
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
        <a class="nav-link" href="<?php echo "stats.php?eid=".$cname;?>"><button class="navbutton">Analytics</button></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><button class="navbutton">Logout</button></a>
      </li>
      
    </ul>
  </div>
</nav>
<div class="container-fluid" style="color: black; padding: 10px;">
  <div class="row">
    <div class="col-lg-12  md-auto sm-auto  pad" style="color: black;">
         <h4>Test Name : <b><?php echo $cid;  ?></b></h4><br>
         <div align="center">
         <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." style="width: 300px; padding: 10px; border: 1px solid #d5d5d5; border-radius: 5px;">
         </div>
<br>
<div class="table-responsive tablediv">
 <?php
 $sql = "SELECT * FROM tbl_examinations WHERE category='$cid' ORDER BY exam_name ASC";
 $result = $conn->query($sql);
 if ($result->num_rows > 0)
{
  print '
        <table id="myTable" class="table table-bordered table-striped" style="color:black;">
        <tr>
        <th onclick="sortTable(0);">Section Name</th>
        <th onclick="sortTable(1);">Duration</th>
        <th onclick="sortTable(2);">Questions</th>
        <th onclick="sortTable(3);">Deadline</th>
        <th>Action</th>
        <th></th>
        <th></th>
        <th></th>
        </tr>';
     
                                           while($row = $result->fetch_assoc()) {
                         $status = $row['status'];
                         if ($status == "Active") {
                         $st = '<p class="text-success">ACTIVE</p>';
                         $stl = '<a href="pages/make_ex_in.php?id='.$row['exam_id'].'"><button>Make Inactive</button></a>';
                         }else{
                         $st = '<p class="text-danger">INACTIVE</p>'; 
                                               $stl = '<a href="pages/make_ex_ac.php?id='.$row['exam_id'].'" class="rtbutton">Make Active</a>';                        
                         }
                         
$nameexam = $row['exam_id'];
$quest = 0;
$sql3 = "SELECT * FROM tbl_questions WHERE exam_id = '$nameexam'";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {

    while($row3 = $result3->fetch_assoc()) {
    $quest++;
    }
    
} else {
$quest = $nameexam;
}
                                          print '
                           <tr>
                                                <td>'.$row['exam_name'].'</td>
                        <td>'.$row['duration'].'</td>
                                                <td>'.$quest.'</td>
                        <td>'.$row['date'].'</td>
                                                <td><a href="report/report.php?eid='.$row['exam_id'].'"><button>Section Stats</button></a></td>

                                                <td><a href="allques.php?eid='.$row['exam_id'].'"><button class="">View Questions</button></a></td>
                                                <td>'.$stl.'</td>
                                                <td><a href="edit-exam.php?eid='.$row['exam_id'].'"><button class="">Edit Exam</button></a>
                                                </td>
                                                
                                                </tr>';
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
  </div>


</div>
</div>
<span style="padding: 20px;"></span>
<nav class="navbar navbar-expand-lg footer" style="background-color: #26657b;">
<a href="#" class="navbar-brand mx-auto"><img src="../ps_logo1.png" height="40" width="130"></a>
</nav>    
</body>
</html>
<script type="text/javascript">
  var asc = 0;
function sort_table(table, col)
{
  $('.sortorder').remove();
  if (asc == 2) {asc = -1;} else {asc = 2;}
  var rows = table.tBodies[0].rows;
  var rlen = rows.length-1;
  var arr = new Array();
  var i, j, cells, clen;
  // fill the array with values from the table
  for(i = 0; i < rlen; i++)
  {
    cells = rows[i].cells;
    clen = cells.length;
    arr[i] = new Array();
    for(j = 0; j < clen; j++) { arr[i][j] = cells[j].innerHTML; }
  }
  // sort the array by the specified column number (col) and order (asc)
  arr.sort(function(a, b)
  {
    var retval=0;
    var col1 = a[col].toLowerCase().replace(',', '').replace('$', '').replace(' usd', '')
    var col2 = b[col].toLowerCase().replace(',', '').replace('$', '').replace(' usd', '')
    var fA=parseFloat(col1);
    var fB=parseFloat(col2);
    if(col1 != col2)
    {
      if((fA==col1) && (fB==col2) ){ retval=( fA > fB ) ? asc : -1*asc; } //numerical
      else { retval=(col1 > col2) ? asc : -1*asc;}
    }
    return retval;      
  });
  for(var rowidx=0;rowidx<rlen;rowidx++)
  {
    for(var colidx=0;colidx<arr[rowidx].length;colidx++){ table.tBodies[0].rows[rowidx].cells[colidx].innerHTML=arr[rowidx][colidx]; }
  }
  
  hdr = table.rows[0].cells[col];
  if (asc == -1) {
    $(hdr).html($(hdr).html() + '<span class="sortorder">▲</span>');
    } else {
    $(hdr).html($(hdr).html() + '<span class="sortorder">▼</span>');
  }
}


function sortTable(n) {
  sort_table(document.getElementById("myTable"), n);
}
</script>
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
</script>