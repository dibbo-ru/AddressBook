<?php
session_start();

if(isset($_SESSION['usr_id'])  && isset($_SESSION['email'])) {
	header("Location: home.php");
}

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['submit'])) {
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$userId=$_SESSION['usr_id'];
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$Address = mysqli_real_escape_string($con, $_POST['Address']);
	$Phone = mysqli_real_escape_string($con, $_POST['Phone']);
	
  
	if (!$error) {
		if(mysqli_query($con, "INSERT INTO userInfo (userID,name,email,Address,Phone) VALUES('" . $userId . "','" . $name . "', '" . $email . "', '" . $Address . "', '" . $Phone. "')")) 
		{
			$successmsg = "Successfully Data are added!";
		} 
		else {
			$errormsg = "Error in added...Please try again later!";
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

	<style>
	body  {
	   
    background: linear-gradient( white); 
	}
	</style>

</head>
<body>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="home.php"><span></span> Address book</a> 
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-left">

			<li> <p class="navbar-brand"> <span class="glyphicon glyphicon-user"> </span> <?php echo $_SESSION['usr_name']; ?></p></li>
				<?php if (isset($_SESSION['usr_id'])) { ?>
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Options<span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a href="home.php"> <span></span>   Add</a></li>
				<li><a href="edit.php"> <span></span>  Edit</a></li>
				<li><a href="view.php"> <span></span>  View</a></li>
				<li><a href="delete.php"> <span></span>  Delete</a></li>
				</ul>
				</li>
				
				<li><a href="logout.php"> <span></span> Log Out</a></li>
				<?php } else { ?>
				<li><a href="login.php"><span> Login</a></li>
				<li class="active"><a href="register.php"><span></span> Sign Up</a></li>
				<?php } ?>

			</ul>
		</div>
	</div>
</nav> 


<center> 
    <h3>Add information</h3>
</center>
 
 

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend>
					

					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" name="name" placeholder="Enter Full Name" required value="<?php if($error) echo $name; ?>" class="form-control" />
<!-- 						<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
 -->					</div>
					
					<div class="form-group">
						<label for="name">Email:</label>
						<input type="text" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Address:</label>
						<input type="text" name="Address" placeholder="Address" required class="form-control" />
<!-- 						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
 -->					</div>

					<div class="form-group">
						<label for="name">Phone Number:</label>
						<input type="text" name="Phone" placeholder="Phone" required class="form-control" />
						<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
					</div>

					<div class="form-group">
						<input type="submit" name="submit" value="Add data" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
<!-- 		Already Registered? <a href="login.php">Login Here</a>
 -->		</div>
	</div>
</div>


 

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>


