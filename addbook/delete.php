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
		if(mysqli_query($con, "INSERT INTO userinfo (userID,name,email,Address,Phone) VALUES('" . $userId . "','" . $name . "', '" . $email . "', '" . $Address . "', '" . $Phone. "')")) {
			$successmsg = "Successfully Data are added!";
		} else {
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
	    background: white;
	    
	}
	</style>

</head>
<body>

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="home.php"><span ></span>   Address book</a> 
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['usr_id'])) { ?>
				<li><a href="home.php"> <span></span>   Add</a></li>
				<li><a href="edit.php"> <span></span>  Edit</a></li>
				<li><a href="view.php"> <span></span>  View</a></li>
				<li><a href="delete.php"> <span></span>  Delete</a></li>
				
				<li><p class="navbar-text"> <span class="glyphicon glyphicon-user"> </span> <?php echo $_SESSION['usr_name']; ?></p></li>
				<li><a href="logout.php"> <span ></span> Log Out</a></li>
				<?php } else { ?>
				<li><a href="login.php"><span> Login</a></li>
				<li class="active"><a href="register.php"><span ></span> Sign Up</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>


<center> 
 <h3>Delete information</h3>
</center>
 
  
   <div class="container">

            <div class="row">

   <table class="table table-bordered ">
        <thead>
          <tr>
              <th class="text-center">Id</th>
              <th class="text-center">Name</th>
              <th class="text-center">Address</th>
              <th class="text-center">Email</th>
            <th class="text-center">Mobile</th>
              <th class="text-center">Option</th>
          </tr>
 
		  
		  <?php
 			include_once 'dbconnect.php';
 
		 	mysql_connect("localhost","root","");
			mysql_select_db("tst123");

            $userid=$_SESSION['usr_id'];
	       // var_dump($userid);
	
			
	
		  
		  $query=mysql_query("SELECT * FROM userinfo WHERE userID=$userid");

			if($query === FALSE) { 
				die(mysql_error()); // TODO: better error handling
			}

		   while($arr=mysql_fetch_array($query)) {


		   ?>
        </thead>
        <tbody>
          <tr>

              <td class="text-center"><?php echo $arr[1];?></td>
              <td class="text-center"><?php echo $arr[2];?></td>
              <td class="text-center"><?php echo $arr[3];?></td>
              <td class="text-center"><?php echo $arr[4];?></td>
              <td class="text-center"><?php echo $arr[5];?></td>
              <!-- <td><center>
             <a href=\"delete.php?id=".$row['id']."\"> class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a></center></td> -->
             <?php

             echo "<td ><center><a class='btn btn-danger' href=\"deleted.php?id=".$arr['id']."\" ><span class='glyphicon glyphicon-trash'></span>Delete</a></center</td>";
             ?>
          </tr>

          <?php
			}
		?>
        </tbody>
      </table>
      </div>
      </div>
 
 

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>


