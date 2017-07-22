<?php
session_start();

if(isset($_SESSION['usr_id'])  && isset($_SESSION['email'])) {
	
	header("Location: home.php");

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
			<a class="navbar-brand" href="home.php"><span></span> Address book</a> 
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['usr_id'])) { ?>
				<li><a href="home.php"> <span></span>   Add</a></li>
				<li><a href="edit.php"> <span></span>  Edit</a></li>
				<li><a href="view.php"> <span></span>  View</a></li>
				<li><a href="delete.php"> <span></span>  Delete</a></li>
				
				<li><p class="navbar-text"> <span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['usr_name']; ?></p></li>
				<li><a href="logout.php"> <span></span> Log Out</a></li>
				<?php } else { ?>
				<li><a href="login.php"><span> Login</a></li>
				<li class="active"><a href="register.php"><span ></span> Sign Up</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>


<center> 
 <h3>Edit information</h3>
</center>
<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
  

  

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
              <td><center>
            <?php
             
            
             echo "<a class='btn btn-info' href=\"viewedit.php?id=".$arr['id']."\" ><span class='glyphicon glyphicon-trash'></span>Edit</a>"; ?>
             &nbsp;&nbsp;
             
          </tr>

          <?php
			}
		?>
        </tbody>
      </table>



            </div>

        </div>

        <br>
 

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

 