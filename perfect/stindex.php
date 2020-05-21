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
	<title>Perfect Skills</title>
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
<body class="page-login">
	
	<div class="limiter">
		<div class="container-login100">
                 <span class="login100-form-title ">
						
						<center><h2 style="font-weight:500;color:black">New City Contracting</h2></center>
						
					</span>   
               
			<div class="wrap-login100" style="background-color:#3A3D6E">
               
				<div class="login100-pic js-tilt" data-tilt>
				    
					<img src="img.png" alt="IMG">
					
				</div>
                    <?php
					$pass = $_GET['sid'];
					
					?>
				<form class="login100-form validate-form" action="pages/authentication.php" method="POST">
					<center><h6 style="font-weight:500;color:white">Please Confirm Your E-mail</h6></center>  
                    <br>
					<div class="wrap-input100 validate-input js-tilt" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="user" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
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
               
				<p style="font-weight:800;font-family: georgia;color: #3A3D6E">Go To Registration Page: <a href="index.php" style="color:white" class="btn btn-info">Click Here</a>
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