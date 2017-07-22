<?php
 
 include_once 'dbconnect.php';
 
		 	mysql_connect("localhost","root","");
			mysql_select_db("tst123");

if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id = $_GET['id']; // $id is now defined

// or assuming your column is indeed an int
// $id = (int)$_GET['id'];

mysqli_query($con,"DELETE FROM userinfo WHERE id='".$id."'");
mysqli_close($con);
header("Location: delete.php");



?> 