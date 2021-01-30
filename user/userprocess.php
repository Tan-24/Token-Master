<?php
include '../connect.php';
session_start();
$id = $_SESSION['id'];
if(isset($_POST['edit']))
{
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
if(isset($_POST['addmoney']))
{
	$amount=$_POST['amount'];
	$query="select * from balance_details WHERE id='$id'";
	$data=mysqli_query($conn,$query);

	if($data->num_rows==1)
	{
		$object = $data->fetch_object();
		$balance=$amount+$object->balance;
		$query="update balance_details set balance='$balance' where id='$id'";
		$update=mysqli_query($conn,$query);
		if($update){
		echo "<script> alert('Details updated successfully')</script>";
		header("refresh:0; url=index.php");
		}
		else
		{
		echo "<script> alert('Something went wrong')</script>";
		header("refresh:10; url=index.php");
		
		}
		
	}
	else if($data->num_rows==0)
	{
		$query="insert into balance_details(balance,id) values('$amount','$id')";
		$update=mysqli_query($conn,$query);
		if($update){
		echo "<script> alert('Details updated successfully')</script>";
		header("refresh:10; url=index.php");
		}
		else
		{
		echo "<script> alert('Something went wrong')</script>";
		header("refresh:10; url=index.php");
		}
	}
	else
	{
		echo "<script> alert('Something went wrong')</script>";
		header("refresh:10; url=index.php");
	}
}

if(isset($_POST['buy']))
{
	$amount=50;
	$token_no=$_SESSION['token_no'];
	$query1="SELECT balance from balance_details WHERE id='$id'";
	$result1=mysqli_query($conn,$query1);
	if ($result1) 
	{
		while ($object1 = $result1->fetch_object()) 
		{
			$balance=$object1->balance;
		}
	}
		if($balance>=50)
		{
		$query="insert into tokens(token_no,payment,id) values('$token_no',50,'$id')";
		$status=mysqli_query($conn,$query);
		if($status)
		{
		$balance=$balance-$amount;
		$query2="update balance_details set balance='$balance' where id='$id'";
		$status2=mysqli_query($conn,$query2);	
		if($status2)
		{
		echo "<script> alert('Token buy successfully')</script>";
		header("refresh:0; url=index.php?screen=buytoken");
		}
		else
		{
		echo "<script> alert('balance not updated')</script>";
		header("refresh:5; url=index.php?screen=buytoken");
		}
		}
		}
		else
		{
		echo "<script> alert('Please recharge your account')</script>";
		header("refresh:0; url=index.php?screen=buytoken");
		}
}
								
	// $query1="SELECT * from balance_details WHERE id='$id'";
	// $result1=mysqli_query($conn,$query1);

	// if ($result1) 
	// {
	// 	echo "take balance";
	// 	while ($object1 = $result1->fetch_object()) 
	// 	{
	// 	$balance=$object1->balance;
	// 	echo $balance;
	// 	}

	// }
	// else
	// {
	// 	echo "<script> alert('Please recharge your account')</script>";
	// 	header("refresh:5; url=index.php?screen=buytoken");
	// }
	// 	if($balance>=50)
	// 	{
	// 		echo "check balance";
		
		
		
		// }
		// else
		// {
		// echo "<script> alert('something went wrong')</script>";
		// header("refresh:5; url=index.php?screen=buytoken");	
		// }
		// }
	// 	else
	// 	{
	// 	echo "<script> alert('You don't have sufficient balance')</script>";
	// 	header("refresh:5; url=index.php?screen=buytoken");
	// 	}

?>