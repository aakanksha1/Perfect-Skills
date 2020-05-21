<?php 
session_start();
$val = 0;
$eid = $_SESSION["eid"];
if (isset($_GET['sid'])) {
	include '../../database/config.php';
    
$student_id = mysqli_real_escape_string($conn, $_GET['sid']);    
$sql1 = "SELECT * FROM `tbl_assessment_records` WHERE `student_id` = '$student_id' AND `exam_id` = '$eid'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {

    while($row1 = $result1->fetch_assoc()) {
        $exam_name1 = $row1['exam_name'];
        $exam_duration1 = $row1['duration'];
        $exam_date1  =$row1['date'];
        $exam_score1  =$row1['score'];
        $exam_status1 = $row1['status'];
    }
} else {
    echo "<h1 class='text-center' style='color:red'>No Records Found for This Profile</h1><br>";
    echo "<h2 class='text-center'>Displaying Demo Content</h2>";
}
    
$sql2 = "SELECT * FROM `tbl_examinations` WHERE `exam_id` = '$eid'";
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {

    while($row2 = $result2->fetch_assoc()) {
        $exam_name2 = $row2['exam_name'];
        $exam_duration2 = $row2['duration'];
        $exam_date2  =$row2['date'];
        $exam_score2  =$row2['score'];
    }
} else {
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
<link rel="stylesheet" href="css/monthly.css">	<!-- Calender-CSS -->
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" /> <!-- pop-up-box -->

<!-- //css files -->
<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=latin-ext,vietnamese" rel="stylesheet">
    
    
    
</head>
<body onload="myFunction();showme()"> 
    
    <script>
                function myFunction(){
                var val = <?php echo $exam_score1 ?>;
//                if(val>=0 && val<=24)
//                    {
//                        
//                        document.getElementById("cdlevel").style.color = "#D9534F";
//                        
//                        document.getElementById("cdlevel").innerHTML = "Beginner";
//                    }
//                    else if(val>=25 && val<=49)
//                    {
//                        document.getElementById("cdstatus").style.color = "#F0AD4E";
//                        
//                        document.getElementById("cdlevel").innerHTML = "Intermediate";
//                    }
//                    else if(val>=50 && val<=74)
//                    {
//                        document.getElementById("cdlevel").style.color = "#337AB7";
//                        
//                        document.getElementById("cdlevel").innerHTML = "Advanced";
//                    }
//                    else if(val>=75 && val<=100)
//                    {
//                       
//                        document.getElementById("cdlevel").style.color = "#5CB85C";
//                        document.getElementById("cdlevel").innerHTML = "Proficient";
//                    }
                    }
            </script>
    
<!-- main-content -->
<div class="container" style="border-style: solid;border-color: #1F253D;">
    <div class="container-full"  >
        <div class="col-md-12" >
<div class="col-md-4" style="padding-top: 10px;padding-bottom: 5px;">
    <div class="col-md-12">
        <div class="col-md-5">
            <span style="color: #1F253D;font-size:18px"> Name</span><br>
        </div>
        
        <div class="col-md-7">
            <span style="color: #1F253D;font-size:18px"> : <?php echo "$sdfname"."&nbsp;".$sdlname ?></span>
        </div>
    </div>
    
    <div class="col-md-12">
        <div class="col-md-5">
            <span style="color: #1F253D;font-size:18px"> User-Id</span>
        </div>
        
        <div class="col-md-7">
            <span style="color: #1F253D;font-size:18px"> : <?php echo "$student_id" ?></span>
        </div>
    </div>
    
    <div class="col-md-12">
        <div class="col-md-2">
            <span style="color: #1F253D;font-size:18px"> Email</span>
        </div>
        
        <div class="col-md-10">
            <span style="color: #1F253D;font-size:18px">:<?php echo "$sdemail" ?></span>
        </div>
    </div>
    
    
</div>
<div class="col-md-4" style="padding-top: 10px;padding-bottom: 5px;">
    
                <span style="color: #1F253D;font-size:18px">Overall Score of <?php echo "$sdfname"."&nbsp;".$sdlname ?> : <span style="color: #1F253D;font-size:18px;" id="scorehere">00</span><span style="color: #1F253D;font-size:22px;">%</span></span><br>
                
                <span style="color: #1F253D;font-size:18px"> <?php echo "$sdfname" ?> appeared Test on : <span style="color: #1F253D;font-size:18px;"><?php echo "$exam_date1" ?></span></span><br>
                
                <span style="color: #1F253D;font-size:18px"> Result of <?php echo "$sdfname" ?> : <span style="color: #5CB85C;font-size:22px;" id="cdlevel"> Status</span></span>
                
                
            </div>
<div class="col-md-4 text-right" style="padding-top: 10px;padding-bottom: 5px;">
   
    <img src="images/ags.png" style="width: 70%">
   
</div>
</div>
      
        <div class="col-md-6" style="padding-top: 10px;padding-bottom: 5px;">
    
<!--
            <div class="col-md-1">
                <span style="font-size:22px">:</span><br>
                <span style="font-size:22px">:</span><br>
                <span style="font-size:22px">:</span><br>
                
            </div>
            <div class="col-md-4">
                <span style="color: #F58834;font-size:22px"><?php echo "$exam_score1"."%" ?></span><br>
                <span style="color: #F58834;font-size:22px"><?php echo "$exam_date1" ?></span><br>
                <span style="color: #F58834;font-size:22px;font-weight:800"><?php echo "$exam_status1" ?></span><br>
                
            </div>
-->
        </div>
        <div class="col-md-6" style="padding-top: 10px;padding-bottom: 5px;">
    
<!--
            <div class="col-md-6">
                <span style="color: #1F253D;font-size:22px">Total Questions</span><br>
                <span style="color: #1F253D;font-size:22px">Appeared Questions</span><br>
                <span style="color: #1F253D;font-size:22px">Correct Answers</span><br>
                <span style="color: #1F253D;font-size:22px">Wrong Answers</span><br>
            </div>
            <div class="col-md-1">
                <span style="font-size:22px">:</span><br>
                <span style="font-size:22px">:</span><br>
                <span style="font-size:22px">:</span><br>
                <span style="font-size:22px">:</span><br>
            </div>
            <div class="col-md-4">
                <span style="color: #F58834;font-size:22px"><?php //echo "$sdfname"."&nbsp;".$sdlname ?></span><br>
                <span style="color: #F58834;font-size:22px"><?php //echo "$student_id" ?></span><br>
                <span style="color: #F58834;font-size:22px"><?php //echo "$student_id" ?></span><br>
                <span style="color: #F58834;font-size:22px"><?php //echo "$student_id" ?></span><br>
            </div>
-->
        </div>
        <div class="col-md-12 text-center">
            
            
            
<!--            <button onclick="myFunction()">Try it</button>-->
            
<div class="col-md-12 text-left" style="padding-top: 10px;border-style: solid;border-color: whitesmoke;">
    
    
     <div class="table-responsive">
										   <?php
									 include '../database/config.php';
									 $sql = "SELECT * FROM tbl_assessment_records WHERE student_id = '$student_id'";
                                     $result = $conn->query($sql);

                                     if ($result->num_rows > 0) {
                                         
									print '
                                   
                                    
									   <table id="resultexample" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Section</th>
                                                <th>Score</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        ';
                                        $snumber = 1;
                                     while($row = $result->fetch_assoc()) {
                                         $val = $val + $row['score'];
                                         $valscore = $row['score'];
            
                                     print '
                                     
                                    
                                            <tr>
                                                <td>'.$snumber.'</td>
                                                <td>'.$row['exam_name'].'</td>
                                                <td>'.$row['score'].'%</td>
                                                <td id="cdstatus1">'.$row['status'].'</td>
                                            </tr>
                                            
                                             <script>
                                    function testing(){
                                    var val1 = ' .$valscore. ';
                                    
                                    if(val1>=0 && val1<=24)
                    {
                        
                        document.getElementById("cdstatus1").style.color = "#D9534F";
                        document.getElementById("cdstatus1").innerHTML = "Beginner";
                    }
                    else if(val1>=25 && val1<=49)
                    {
                        
                        document.getElementById("cdstatus1").style.color = "#F0AD4E";
                        document.getElementById("cdstatus1").innerHTML = "Intermediate";
                    }
                    else if(val1>=50 && val1<=74)
                    {
                        
                        document.getElementById("cdstatus1").style.color = "#337AB7";
                        document.getElementById("cdstatus1").innerHTML = "Advanced";
                    }
                    else if(val1>=75 && val1<=100)
                    {
                        
                        document.getElementById("cdstatus1").style.color = "#5CB85C";
                        document.getElementById("cdstatus1").innerHTML = "Proficient";
                    }
                    }
                                    
                                    
                    
                                    </script>
                                            ';
                                         $snumber = $snumber+1;
                                       $num = $rowcount=mysqli_num_rows($result);  
                                     }
                                       $agg = "$val/$num";
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
      <script>
          function showme(){
              var val1 = <?php echo $agg ?>;
                
              
              if(val1>=0 && val1<=24)
                    {
                        document.getElementById("level1").style.display = "block";
                        document.getElementById("aggstatus").style.color = "#D9534F";
                        document.getElementById("level2").style.display = "none";
                        document.getElementById("level3").style.display = "none";
                        document.getElementById("level4").style.display = "none";
                        document.getElementById("aggstatus").innerHTML = "Beginner";
                        document.getElementById("cdlevel").style.color = "#D9534F";
                        document.getElementById("cdlevel").innerHTML = "Beginner";
                        document.getElementById("scorehere").innerHTML = val1;
                    }
                    else if(val1>=25 && val1<=49)
                    {
                        document.getElementById("level1").style.display = "none";
                        document.getElementById("level2").style.display = "block";
                        document.getElementById("aggstatus").style.color = "#F0AD4E";
                        document.getElementById("level3").style.display = "none";
                        document.getElementById("level4").style.display = "none";
                        document.getElementById("aggstatus").innerHTML = "Intermediate";
                        document.getElementById("cdlevel").style.color = "#F0AD4E";
                        document.getElementById("cdlevel").innerHTML = "Intermediate";
                        document.getElementById("scorehere").innerHTML = val1;
                    }
                    else if(val1>=50 && val1<=74)
                    {
                        document.getElementById("level1").style.display = "none";
                        document.getElementById("level2").style.display = "none";
                        document.getElementById("level3").style.display = "block";
                        document.getElementById("aggstatus").style.color = "#337AB7";
                        document.getElementById("level4").style.display = "none";
                        document.getElementById("aggstatus").innerHTML = "Advanced";
                        document.getElementById("cdlevel").style.color = "#337AB7";
                        document.getElementById("cdlevel").innerHTML = "Advanced";
                        document.getElementById("scorehere").innerHTML = val1;
                        
                    }
                    else if(val1>=75 && val1<=100)
                    {
                        document.getElementById("level1").style.display = "none";
                        document.getElementById("level2").style.display = "none";
                        document.getElementById("level3").style.display = "none";
                        document.getElementById("level4").style.display = "block";
                        document.getElementById("aggstatus").style.color = "#5CB85C";
                        document.getElementById("aggstatus").innerHTML = "Proficient";
                        document.getElementById("cdlevel").style.color = "#5CB85C";
                        document.getElementById("cdlevel").innerHTML = "Proficient";
                        document.getElementById("scorehere").innerHTML = val1;
                        
                    }
              
              }
            </script>
<!--<button onclick="showme()">SHOW</button>-->
<span style="color: #1F253D;font-size:22px"> Proficiency Level of <?php echo "$sdfname"."&nbsp;".$sdlname ?>:</span>
<span style="color: #5CB85C;font-size:22px;" id="aggstatus"> Status</span>
 <br><br>
<div class="progress text-center" style="height:40px;border-style:solid;border:1px;border-radius:50px;"  >
    <div class="progress-bar progress-bar-danger" role="progressbar" style="width:25%" id="level1">
      
        <p class="level1" style="font-size:12px;color:white;font-weight:700">Beginner (0-24%)</p>
    </div>
    <div class="progress-bar progress-bar-warning" role="progressbar" style="width:25%" id="level2">
      
        <p class="level2" style="font-size:12px;color:white;font-weight:700;margin-top:6px">Intermediate (25-49%)</p>
    </div>
    <div class="progress-bar" role="progressbar" style="width:25%" id="level3">
      
        <p class="level3" style="font-size:12px;color:white;font-weight:700">Advanced (50-74%)</p>
    </div>
    <div class="progress-bar progress-bar-success" role="progressbar" style="width:25%;" id="level4">
      
        <p class="level4" style="font-size:12px;color:white;font-weight:700">Profecient (75-100%)</p>
    </div>
</div>
<!-- Reference Rating Bar Here Starts            -->
 <div class="progress text-center" style="height:border-style:solid;border:1px;border-radius:50px;"  >
    <div class="progress-bar progress-bar-danger" role="progressbar" style="width:25%" >
      Beginner (0-24%)<br>
    </div>
    <div class="progress-bar progress-bar-warning" role="progressbar" style="width:25%" >
      Intermediate (25-49%)<br>
    </div>
    <div class="progress-bar" role="progressbar" style="width:25%" >
      Advanced (50-74%)<br>
    </div>
    <div class="progress-bar progress-bar-success" role="progressbar" style="width:25%;" >
      Profecient (75-100%)<br>
    </div>
</div>
<!-- Reference Rating Bar Here Ends            -->
            
            <!-- Chart To Come Here           -->
<!--            <img src="scoreview.png"><br>-->
            <!-- Chart To End Here           -->            
            
        </div>
</div>
<!--Table Was Here -->
    <div class="col-md-12 text-center" style="padding-bottom: 15px">
        <div class="col-md-6"> 
        <?php print '<a href="../view_print_user.php?sid='.$student_id.'" target="_blank" style="text-decoration:none;background-color:#6ACA6B"><button class="btn btn-success" style="background-color:#6ACA6B">Print Report</button></a>' ?> 
        </div>
        
        <div class="col-md-6">
        <h2 style="color: #1F253D"><a href="../index.php"><button class="btn btn-warning">Dashboard</button></a></h2>
        </div>
        
    </div>
    
<!--
<div class="col-md-12" style="padding-top: 10px;border-style: solid;border-color: #1F253D;">
    <div class="col-md-12" style="padding-bottom: 15px"><h2 style="color: #1F253D">Competencies</h2></div>

</div>
    
<div class="col-md-12" style="padding-top: 10px;border-style: solid;border-color: #1F253D;">
    <div class="col-md-12" style="padding-bottom: 15px"><h2 style="color: #1F253D">Education</h2></div>

    
</div>
    
<div class="col-md-12" style="padding-top: 10px;padding-bottom: 10px; border-style: solid;border-color: #1F253D;">
    <div class="col-md-12" style="padding-bottom: 15px"><h2 style="color: #1F253D">Critical Projects</h2></div>

    
</div>
    
<div class="col-md-12" style="padding-top: 10px;border-style: solid;border-color: #1F253D;">
    <div class="col-md-12" style="padding-bottom: 15px"><h2 style="color: #1F253D">Social Profiles</h2></div>

</div>
    
<div class="col-md-12" style="padding-top: 10px;border-style: solid;border-color: #1F253D;">
    <div class="col-md-12" style="padding-bottom: 15px"><h2 style="color: #1F253D">Personal Information</h2></div>
    
    
</div>
-->

    
    
    
    
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