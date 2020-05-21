<!DOCTYPE html>
<?php

//If the HTTPS is not found to be "on"
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on")
{
    //Tell the browser to redirect to the HTTPS URL.
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
    //Prevent the rest of the script from executing.
    exit;
}
?>
<?php include 'includes/check_reply.php'; ?>
<html lang="en">
<head>
	<title>Skill Evaluate</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body <?php if ($ms == "1") { print 'onload="myFunction()"'; } ?>  class="page-login">
	
	<div class="limiter">
	    
		<div class="container-login100">
                   
                 
			<div class="wrap-login100" style="background-color:whitesmoke">
               
				<div class="login100-pic js-tilt" data-tilt>
				    <br/>
					<img src="ps_logo.png" alt="IMG">
					<!--<br><br>-->
					<!--<img src="ags0.png" alt="IMG">-->
					<!--<center><h2 style="font-family:cursive;font-weight:800;color:#176297">Perfect Skill</h2><hr>-->
					<!--<h4 style="font-family:cursive;font-weight:600">THE THIRD EYE</h4>-->
					</center>
					
				</div>
                    <?php
					$pass = $_GET['sid'];
					
					?>
				<form class="login100-form validate-form" action="pages/authentication.php" method="POST">
					

					<div class="wrap-input100 validate-input js-tilt" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="user" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input js-tilt" data-validate = "Password is required">
						<input class="input100" type="password"  name="login" placeholder="Password" value="<?php echo $pass ?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn js-tilt">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>
					

					
					
				</form>
                
			</div>
            <div class="col-md-12 text-left">
               
				<p style="font-weight:800;font-family: georgia;color: whitesmoke">This is a Demo
				<br>GoTo Candidate Open Registration: <a href="register.php" style="color:white">Click Here</a>
				</p>
				 
				 

                
			</div>
            
		</div>
        
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>