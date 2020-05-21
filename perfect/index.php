
<!DOCTYPE html>
<html lang="en">
    
<head>
	<title>Perfect Skills: New City Contracting</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include 'nstyle2.php' ?>
</head>

<!-- End of GA -->
<body>
<nav class="navbar navbar-expand-lg " style="background-color: transparent; border-bottom: 2px solid #26657b; color:#2665c7b">
<span class="navbar-brand mx-auto"><img src="genrics.png" height="30" width="30">&nbsp;New City Contracting</span>
</nav>
<div class="container-fluid maincontainer">
	<div class="row">
		<div class="col-lg-4 offset-lg-4 md-auto sm-auto" align="center">
			<div style="padding: 18px;">
			<ul class="nav nav-pills nav-justified">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="pill" href="#signup">Signup</a>
  </li>
  &emsp;
  <li class="nav-item">
    <a class="nav-link" data-toggle="pill" href="#login">Login</a>
  </li>
</ul></div>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane container active" id="signup">
  						<form class="formcls" action="pages/cd_register.php" method="POST">
						<input  type="text" name="fname" placeholder="First Name"><br><br>
						<input  type="text" name="lname" placeholder="Last Name"><br><br>
						<input  type="text" name="phone" placeholder="Phone Number" minlength="	10" maxlength="10"><br><br>
						<select name="gender">
							<option disabled selected>Gender</option>
							<option value="M">Male</option>
							<option value="F">Female</option>
							<option value="N">Rather Not Say</option>
						</select><br><br>
						<input  type="text" name="user" placeholder="Email"><br><br>
						<input  type="password"  name="login" placeholder="Password"><br><br>
		                <input  type="hidden" name="test" value="BDA Co-ordinator">
                                            
						<button type="submit" name="sgup">Register</button>
</form>	
  </div>
  <div class="tab-pane container fade" id="login">
 						<form class="formcls" action="pages/cd_login.php" method="POST">
						<input  type="text" name="user" placeholder="Email"><br><br>
						<input  type="password"  name="login" placeholder="Password"><br><br>
		                                    
						<button type="submit">Login</button>
</form>	
 
  </div>
</div>


			
		</div>
	</div>


</div>
<div class="navbar navbar-expand-lg footer" style="background-color: #26657b;">
<a href="#" class="navbar-brand mx-auto"><img src="ps_logo1.png" height="40" width="130"></a>
</div>		
	

</body>
</html>