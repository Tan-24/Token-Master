<?php
include '../connect.php';
session_start();
if(isset($_POST['winner']))
{
	echo "ddone";

	$token_no=$_SESSION['token_no'];
	$query="update tokens set winning_status=0 where token_no !='$token_no'";
	$update=mysqli_query($conn,$query);
	if($update)
	{
	echo "ddone";
	$query1="update tokens set winning_status=1 where token_no = '$token_no'";
	$update1=mysqli_query($conn,$query1);
	if($update1)
	{
		echo "ddone";
		echo "<script>alert('Winner choosen successfully')</script>";
		header("refresh:3;url=index.php");
	}
	}
	else
	{
		echo "<script>alert('Something went wrong... Try again')</script>";
		header("refresh:5;url=index.php?screen=winners");
	}
}