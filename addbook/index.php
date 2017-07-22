<?php
session_start();

if(isset($_SESSION['usr_id'])) {
	header("Location: home.php");
}

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	
	//name can contain only alpha characters and space
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$name_error = "Name must contain only alphabets and space";
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}
	if(strlen($password) < 4) {
		$error = true;
		$password_error = "Password must be minimum of 4 characters";
	}
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Password and Confirm Password doesn't match";
	}
	if (!$error) {
		if(mysqli_query($con, "INSERT INTO users(name,email,password) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "')")) {
			$successmsg = "Signup Successfully <a href='login.php'>Click for Login</a>";
		} else {
			$errormsg = "Error in registering...Please try again later!";
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Online Address Book</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />

	  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet"> 
  
  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate-css/animate.min.css" rel="stylesheet">
  
  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
	
		<style>
	body{
		 background:white;

	}
	</style>


</head>
<body>
<!--
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar">yt</span>
				<span class="icon-bar">rsty</span>
				<span class="icon-bar">ty</span>
			</button> -->
		<!--	<a class="navbar-brand" href="index.php"><span ></span> Online Address book</a>
		</div> -->

		<!-- <div class="collapse navbar-collapse" id="navbar1">
			 <ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['usr_id'])) { ?>
				<li><p class="navbar-text">Hi! <?php echo $_SESSION['usr_name']; ?></p></li>
				<li><a href="logout.php">Log Out</a></li>
				<?php } else { ?>
				<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				<?php } ?>
			</ul>
		</div> -->
	</div>
</nav>
<center> 
 <h2>Store Your Peoples Inforfations</h2>
</center>
</br></br>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend>New Here? Please Sign Up</legend>

					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" placeholder="Enter Name" required value="<?php if($error) echo $name; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					</div>
					
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Confirm Password</label>
						<input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
					</div>

					<div class="form-group">
						<input type="submit" name="signup" value="Sign Up" class="btn btn-info" />
						</br></br>
						
					</div>

             
		   <ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['usr_id'])) { ?>
				<li><p class="navbar-text">Hi! <?php echo $_SESSION['usr_name']; ?></p></li>
				<li><a href="logout.php">Log Out</a></li>
				<?php } else { ?>
				<div class="col-xs-12 text-right">
                <a href="login.php" class="btn btn-danger">Already Have an account ! Login Here</a>                    
                            
                </div>
			<!---	<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
				<?php } ?>
			</ul> 
	        </fieldset>
			</form>
			<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
 		</div>
	</div>
</div>

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

