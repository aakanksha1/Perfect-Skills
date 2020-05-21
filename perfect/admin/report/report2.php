<?php 
//include '../includes/check_user.php'; 
//include '../includes/check_reply.php';
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

<!DOCTYPE html>
<html lang="zxx">
<head>
<title>Report View</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Classic UI Kit web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--// Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
<link rel="stylesheet" href="css/style1.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all"/> <!-- Owl-Carousel-CSS -->
<link rel="stylesheet" href="css/easy-responsive-tabs.css"><!-- tabs-css -->
<link rel="stylesheet" href="css/monthly.css">  <!-- Calender-CSS -->
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" /> <!-- pop-up-box -->

<!-- //css files -->
<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=latin-ext,vietnamese" rel="stylesheet">
    
    <style>
    .hidden-xs-up{display:none!important}@media (max-width:575px){.hidden-xs-down{display:none!important}}@media (min-width:576px){.hidden-sm-up{display:none!important}}@media (max-width:767px){.hidden-sm-down{display:none!important}}@media (min-width:768px){.hidden-md-up{display:none!important}}@media (max-width:991px){.hidden-md-down{display:none!important}}@media (min-width:992px){.hidden-lg-up{display:none!important}}@media (max-width:1199px){.hidden-lg-down{display:none!important}}@media (min-width:1200px){.hidden-xl-up{display:none!important}}.hidden-xl-down{display:none!important}.visible-print-block{display:none!important}@media print{.visible-print-block{display:block!important}}.visible-print-inline{display:none!important}@media print{.visible-print-inline{display:inline!important}}.visible-print-inline-block{display:none!important}@media print{.visible-print-inline-block{display:inline-block!important}}@media print{.hidden-print{display:none!important}}
    </style>
</head>
<body onload="check()"> 
<!-- main-content -->
     
<div class="container">
<div class="col-md-12" style="padding-top: 10px;padding-bottom: 5px;border-style: solid;border-color: #1F253D;">
    
    <div class="col-md-6 text-left" style="padding-top:10px">
        <span style="color: #F58834;font-size:22px"><?php echo "" ?></span><br>
        
        
    </div>
    <div class="col-md-6 text-right" style="padding-top:10px">
        <span style="color: #F58834;font-size:22px"><?php echo "$exam_duration" ?> Minutes</span><br>
        
        
    </div>
    
    
    
    
</div>

<div class="col-md-12" style="padding-top: 10px;border-style: solid;border-color: #1F253D;">
    
    
     <div class="table-responsive">
                       <?php
                       include '../../database/config.php';
                       $sql = "SELECT * FROM tbl_assessment_records WHERE exam_id = '$exam_id' ORDER BY score DESC";
                                           $result = $conn->query($sql);

                                           if ($result->num_rows > 0) {
                    print '
                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Student Name</th>
                        <th class="hidden-sm-down">Student ID</th>
                        
                                                <th class="hidden-sm-down">Score</th>
                                                <th class="hidden-sm-down">Status</th>
                        <th class="hidden-sm-down">Date</th>
                                                <th>Action</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        $snumber = 1;
                                           while($row = $result->fetch_assoc()) {
                                          print '
                           <tr>
                            <td>'.$snumber.'</td>
                                                <td>'.$row['student_name'].'</td>
                        <td class="hidden-sm-down">'.$row['student_id'].'</td>
                                                
                                                <td class="hidden-sm-down">'.$row['score'].'</span>%</b></td>
                        <td class="hidden-sm-down" id="stats">'.$row['status'].'</td>
                        <td class="hidden-sm-down">'.$row['date'].'</td>
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
    <div class="col-md-12">
    
    
    </div>
    <div class="col-md-12" style="padding-bottom: 15px">
        <div class="col-md-6 text-center">
        <h2 style="color: #1F253D"><a href="../index.php"><button class="btn btn-warning">Dashboard</button></h2></a>
        </div>
        <div class="col-md-6 text-center">
        
        <?php print '<a href="../view_print_test.php?sid='.$idhere.'" target="_blank" style="text-decoration:none;background-color:#6ACA6B"><button class="btn btn-success" style="background-color:#6ACA6B">Print PDF</button></a>' ?> 
        
        <?php print '<a href="def.php?sid='.$idhere.'" target="_blank" style="text-decoration:none;background-color:#6ACA6B"><button class="btn btn-success" style="background-color:#6ACA6B">Export Excel</button></a>' ?> 
        
        </div>
        </div> 

    
</div>
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- smooth scrolling -->
<script src="js/SmoothScroll.min.js"></script>
<!-- //smooth scrolling -->
<!-- menu-script -->
<script>
  $("span.menu").click(function(){
    $(".nav1 ul").slideToggle(500, function(){
    });
  });
</script>
<!-- //menu-script -->
<!--skycons-icons-->
<script src="js/skycons.js"></script>
<!--//skycons-icons-->
<!--banner Slider starts Here-->
<script src="js/responsiveslides.min.js"></script>
<script>
  // You can also use "$(window).load(function() {"
  $(function () {
    // Slideshow 4
    $("#slider4").responsiveSlides({
    auto: true,
    pager:true,
    nav:true,
    speed: 500,
    namespace: "callbacks",
    before: function () {
      $('.events').append("<li>before event fired.</li>");
    },
    after: function () {
      $('.events').append("<li>after event fired.</li>");
    }
    });

  });
</script>
<!--banner Slider ends Here-->
<!--weather-->
<script>
  var icons = new Skycons({"color": "#E8BA0A"}),
      list  = [
      "partly-cloudy-night"
      ],
      i;

    for(i = list.length; i--; )
    icons.set(list[i], list[i]);
    icons.play();
</script>
<script src="../assets/plugins/datatables/js/jquery.datatables.min.js"></script>
<script>
   var icons = new Skycons({"color": "#999"}),
      list  = [
      "clear-day","fog","wind","partly-cloudy-day","snow"
      ],
      i;

    for(i = list.length; i--; )
    icons.set(list[i], list[i]);
    icons.play();
</script>
<!--//weather-->
<!-- video pg plugin -->  
<script src="js/jquery.vide.min.js"></script>
<!-- //video pg plugin -->  
<!-- //bars -->
<script src="js/bars.js"></script>  
<!-- bars -->
<!-- Owl-Carousel-JavaScript -->
<script src="js/owl.carousel.js"></script>
<script>
  $(document).ready(function() {
    $("#owl-demo").owlCarousel ({
      items : 4,
      lazyLoad : true,
      autoPlay : true,
      pagination : true,
    });
  });
</script>
<!-- //Owl-Carousel-JavaScript --> 
<!-- responsive-tabs -->
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
<!-- //responsive-tabs -->
<!-- Popup-js -->
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<script>
  $(document).ready(function() {
  $('.popup-with-zoom-anim').magnificPopup({
    type: 'inline',
    fixedContentPos: false,
    fixedBgPos: true,
    overflowY: 'auto',
    closeBtnInside: true,
    preloader: false,
    midClick: true,
    removalDelay: 300,
    mainClass: 'my-mfp-zoom-in'
  });
                                  
  });
</script>
<!-- //Popup-js -->
<!-- stats -->
<script type="text/javascript" src="js/numscroller-1.0.js"></script>
<!-- //stats -->
<!-- calendar -->
<script type="text/javascript" src="js/monthly.js"></script>
<script type="text/javascript">
  $(window).load( function() {

    $('#mycalendar').monthly({
      mode: 'event',
      
    });

    $('#mycalendar2').monthly({
      mode: 'picker',
      target: '#mytarget',
      setWidth: '250px',
      startHidden: true,
      showTrigger: '#mytarget',
      stylePast: true,
      disablePast: true
    });

  switch(window.location.protocol) {
  case 'http:':
  case 'https:':
  // running on a server, should be good.
  break;
  case 'file:':
  alert('Just a heads-up, events will not work when run locally.');
  }

  });
</script>
<!-- //calendar --> 
<!-- Counter required files -->
<link rel='stylesheet' href='css/dscountdown.css' type='text/css' media='all' />
<script type="text/javascript" src="js/dscountdown.min.js"></script>
<script>
  jQuery(document).ready(function($){           
    $('.demo2').dsCountDown({
      endDate: new Date("December 24, 2020 23:59:00"),
      theme: 'black'
      });               
  });
</script>
<!-- //Counter required files -->
<!-- Necessary-JavaScript-File-For-Bootstrap -->  
<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- //Necessary-JavaScript-File-For-Bootstrap -->
 
<!-- //js-scripts -->
  
</body>
</html>