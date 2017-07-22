<?php
session_start();

 $ID=$_GET['id'];

var_dump($ID);

if(isset($_SESSION['usr_id'])  && isset($_SESSION['email'])) {
	header("Location: home.php");
}

include_once 'dbconnect.php';
 mysql_connect("localhost","root","");
 mysql_select_db("tst123");

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['submit'])) {
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$userId=$_SESSION['usr_id'];
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$Address = mysqli_real_escape_string($con, $_POST['Address']);
	$Phone = mysqli_real_escape_string($con, $_POST['Phone']);
	$updatequery=mysql_query("UPDATE  userinfo SET name='$name',email='$email',Address='$Address',Phone='$Phone'

	 WHERE id='".$ID."'");
	/*var_dump($updatequery);*/
	/*if($updatequery === FALSE) { 
				die(mysql_error()); // TODO: better error handling
			}

		   while($updated=mysql_fetch_array($updatequery)) {
		   	var_dump($updated);
		   }*/

 
	if (!$error) {
		if(mysqli_query($con, $updatequery)) {
			$successmsg = "Successfully Data are added!";
		} else {
			$errormsg = "Error in added...Please try again later!";
		}
	}
	
	header("Location: edit.php");
}
?>