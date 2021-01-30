<?php
include '../connect.php';
session_start();
if(isset($_POST['edit']))
{
	$id = $_SESSION['id'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$username=$_POST['username'];
	$address=$_POST['address'];
	$phoneno=$_POST['phoneno'];
	$password=$_POST['password'];

	$query="UPDATE `login_details` SET fname='$fname',lname='$lname',username='$username',address='$address',phoneno='$phoneno',password='$password'  WHERE id='$id'";
	$data=mysqli_query($conn,$query);

	if($data)
	{
		echo "<script> alert('Details updated successfully')</script>";
		header("refresh:0; url=index.php");
	}
	else
	{
		echo "<script> alert('Something went wrong')</script>";
		header("refresh:0; url=index.php");
	}

}
?>