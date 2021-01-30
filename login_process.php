<?php
include 'connect.php';
session_start();
if(isset($_POST['login']))
{
  $username = $_POST['uname'];
  $password = $_POST['password']; 

  $query="select * from login_details where username ='$username' and password = '$password'";
  $data=mysqli_query($conn, $query);
  if($username && $password == "admin")
  {
    echo "<script> alert('Login Successful')</script>";
    header("refresh:0; url=admin/index.php");
  }
  elseif ($data->num_rows==1)
   {
        //echo "Login Sucessfull...";
        $object = $data->fetch_object();
        $_SESSION['id'] = $object->id;
        // $_SESSION['date'] = $object->date;
        // $_SESSION['time'] = $object->time;
        // $_SESSION['username'] = $username;
        // $_SESSION['fname'] = $object->fname;
        // $_SESSION['lname'] = $object->lname;
        // $_SESSION['address'] = $object->address;
        // $_SESSION['phoneno'] = $object->phoneno;
        // $_SESSION['password']=$password;
        // $_SESSION['no_tokens']=$object->no_tokens;
        echo "<script> alert('Login Successful')</script>";
        header("refresh:0; url=user/index.php");
  }
  else
  {
    echo "<script> alert('Something went wrong')</script>";
    header("refresh:0; url=index.php");
  }
}
  else
{
  echo "POST is not set!";
}


?>