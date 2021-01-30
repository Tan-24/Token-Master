<?php
include 'connect.php';

if(isset($_POST['login']))
{
  $username = $_POST['uname'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $address = $_POST['address'];
  $phoneno = $_POST['phoneno'];
  $password = $_POST['password']; 

  $query="INSERT INTO login_details(username,fname,lname,address,phoneno,password) values('$username','$fname','$lname','$address','$phoneno','$password')";
  $data=mysqli_query($conn, $query);
    if($data)
    {
    // $query1="select * from login_details where username ='$username' and password = '$password'";
    // $result1=mysqli_query($conn,$query1);
    // if ($result1) {
    // while ($object = $result1->fetch_object()) {
    // $object1 = $result1->fetch_object();
    // $_SESSION['id'] = $object1->id;
    // echo "<script> alert('Login successfully')</script>";
    // header("refresh:0; url=user/index.php");
    // // $object = $result1->fetch_object();
    // // $_SESSION['id'] = $object->id; 
    // }
    // }
    // else
    // {
    echo "<script> alert('Account created successfully')</script>";
    header("refresh:0; url=index.php");
    }
    else {
     echo "<script> alert('Something Went Wrong...')</script>";
     header("refresh:4; url=index.php");
    }
  }

  else
{
  echo "POST is not set!";
}


?>