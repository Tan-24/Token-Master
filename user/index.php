<?php
session_start();
// if ($_SESSION['role']!='ADM') {
// 	header('Location:../');
// }
include '../connect.php';
	$id = $_SESSION['id'];
	$query="SELECT * from login_details WHERE id='".$id."'";
	$result=mysqli_query($conn,$query);
    if ($result) {
     while ($object = $result->fetch_object()) {
     	$date = $object->date;
        $time = $object->time;
        $username = $object->username;
        $fname = $object->fname;
        $lname = $object->lname;
        $address = $object->address;
        $phoneno = $object->phoneno;
        $password=$object->password;
      }
      }

?>
<html>
<head>
	<meta charset="UTF-8">
	<title>User Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome-all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/jquery-ui.css" />
	<link rel="stylesheet" href="../css/swiper.min.css" />
	<link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css"/>
	<!-- <link rel = "stylesheet" href = "http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"> -->
	<link rel="stylesheet" href="style.css">
	<style>
	table.reflow {
		width: 100%;
	}
	table.reflow th, table.reflow td {
		text-align: left;
		border-bottom: 1px dashed silver;
	}
	table.reflow .cell-label {
		display: none;
	}

	@media screen and (max-width: 480px) {
		table.reflow th {
			display: none;
		}
		table.reflow tr td {
			float: left;
			clear: left;
			display: block;
			width: 100%;
		}
		table.reflow tr td:last-child {
			padding-bottom: 20px;
			border-bottom: 0;
		}
		table.reflow .cell-label {
			display: block;
			float: left;
		}
		table.reflow .cell-content {
			display: block;
			float: right;
		}
	}

	input[type=text],[type=tel],[type=textarea]
	{
	  border-style: none;
	  font-size: 20px;
	  width: 300px;
	  background-color: transparent;
	}

</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 p-0">
				<nav class="navbar navbar-expand-sm bg-primary navbar-light justify-content-between">
					<a class="navbar-brand">
						<h2>Token Master</h2>
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
						<ul class="navbar-nav d-block d-md-none">
							<li class="nav-item mt-3 border-bottom">
								<label for="">Profile</label>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="?screen=myprofile">My Profile</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="?screen=editprofile">Edit Profile</a>
							</li>
							<li class="nav-item mt-3 border-bottom">
								<label for="">Payment</label>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="?screen=addmoney">Add Money</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="?screen=balance">Balance</a>
							</li>
							<li class="nav-item mt-3 border-bottom">
								<label for="">Play Game</label>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="?screen=buytoken">Buy Token</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="?screen=totaltoken">Token Details</a>
							</li>
							<li class="nav-item mt-3 border-bottom">
								<label for="">Winners</label>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="?screen=viewwinners">View Winners</a>
							</li>
						</ul>
						<ul class="navbar-nav pt-5 pt-md-0">
							<li class="nav-item">
								<a class="nav-link" href="../logout.php">Logout</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
		<div class="row h-100">
			<div class="col-12 d-none d-md-block col-md-2 bg-light">
				<ul class="nav flex-column">
					<li class="nav-item mt-3 border-bottom">
								<label for="">Profile</label>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="?screen=myprofile">My Profile</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="?screen=editprofile">Edit Profile</a>
							</li>
							<li class="nav-item mt-3 border-bottom">
								<label for="">Payment</label>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="?screen=addmoney">Add Money</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="?screen=balance">Balance</a>
							</li>
							<li class="nav-item mt-3 border-bottom">
								<label for="">Play Game</label>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="?screen=buytoken">Buy Token</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="?screen=totaltoken">Token Details</a>
							</li>
							<li class="nav-item mt-3 border-bottom">
								<label for="">Winners</label>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="?screen=viewwinners">View Winners</a>
							</li>
				</ul>
			</div>
			<div class="col-12 col-md-10">
				<?php
				if(isset($_GET['screen'])){
					if($_GET['screen']=='myprofile'){
						?>
						<div class="row">
							<div class="col-md-9 mb-5" style="margin-left: 10%;">
								<div class="card m-3 mt-3 bg-light p-2">
										<legend><center><h3>User Details :</h3></center></legend>
										<label><font style="font-size: 25px;">First Name : <?php echo $fname;?></font></label>
										<label><font style="font-size: 25px;">Last Name : <?php echo $lname;?></font></label>
										<label><font style="font-size: 25px;">Signin Date : <?php echo $date;?></font></label>
										<label><font style="font-size: 25px;">Signin Time : <?php echo $time;?></font></label>
										<label><font style="font-size: 25px;">Username : <?php echo $username;?></font></label>
										<label><font style="font-size: 25px;">Address : <?php echo $address;?></font></label>
										<label><font style="font-size: 25px;">Phone No : <?php echo $phoneno;?></font></label>
										<label><font style="font-size: 25px;">Password : <?php echo $password;?></font></label>
								</div>
							</div>
						</div>
						<?php
					}
					else if($_GET['screen']=='totaltoken'){
						?>
						<div class="row">
							<div class="col-md-9 mb-5" style="margin-left: 10%;">
								<div class="card m-3 mt-3 bg-light p-2">
							<table class = "table table-sm reflow">
							<thead>
								<th>Token No.</th>
								<th>Payment</th>
								<th>date</th>
								<th>time</th>
							</thead>
			                <tbody>
			                      <?php
			                      $query="select * from tokens where id='$id'";
			                      $result=mysqli_query($conn, $query);
			                      if ($result) {
			                      while ($object = $result->fetch_object()) 
			                      {
			                      	 $query1="select * from balance_details where id = $object->id";
				                      $result1=mysqli_query($conn, $query);
				                      if ($result1) {
				                      while ($object1 = $result->fetch_object()) 
				                      {
				                      	echo $object1->balance;
				                      }
				                  }
				                    		echo "<tr>
					                        <td>".$object->token_no."</td>
					                        <td>".$object->payment."</td>
					                        <td>".$object->date."</td>
					                        <td>".$object->time."</td>
					                      </tr>";
			                      
			                      }
			                      }
			                      else {
			                      echo "Error : ".mysqli_error();
			                      }
			                      ?>
			                </tbody>
			    
			              </table>
								</div>
							</div>
						</div>
						<?php
					}
					else if($_GET['screen']=='viewwinners'){
						?>
<!-- 						<div class="row">
							<div class="col-4 offset-8">
								<input type="text" id="search" class="form-control my-3" placeholder="Search">
							</div>
						</div> -->
						<table class = "table table-sm reflow">
							<thead>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email ID</th>
								<th>Address</th>
								<th>Phone No.</th>
								<th>Token No</th>
								<th>Token id</th>
							</thead>
			                <tbody>
			                      <?php
			                      $query="SELECT login_details.fname,login_details.lname,login_details.username,login_details.address,login_details.phoneno,tokens.token_no,tokens.tid FROM login_details INNER JOIN tokens ON login_details.id = tokens.id where winning_status=1";
			                      $result=mysqli_query($conn, $query);
			                      if ($result) {
			                      while ($object = $result->fetch_object()) 
			                      {
			                      echo "<tr>
			                        <td>".$object->fname."</td>
			                        <td>".$object->lname."</td>
			                        <td>".$object->username."</td>
			                        <td>".$object->address."</</td>
			                        <td>".$object->phoneno."</td>
			                        <td>".$object->token_no."</td>
			                        <td>".$object->tid."</td>
			                      </tr>";
			                      }
			                      }
			                      else {
			                      echo "Error : ".mysqli_error();
			                      }
			                      ?>
			                </tbody>
			    
			              </table>
						<?php
					}
					else if($_GET['screen']=='editprofile'){
						?>
						<div class="row">
							<div class="col-md-9 mb-5" style="margin-left: 8%;">
								<div class="card m-3 mt-3 bg-light p-2" >
									<legend><center><h3>Edit User Details :</h3></center></legend><br>
									<form method="post" action="userprocess.php" style="margin-left: 10%;">
										<table>
											<tbody>
												<tr>
												<td><label><font style="font-size: 23px;">First Name : </font></label></td>
												<td><?php echo "<input type='text' name='fname' value='$fname'>";?></td>
												</tr>
												<tr>
												<td><label><font style="font-size: 23px;">Last Name : </font></label></td>
												<td><?php echo "<input type='text' name='lname' value='$lname'>";?></td>
												</tr>
												<tr>
												<td><label><font style="font-size: 23px;">Username : </font></label></td>
												<td><?php echo "<input type='text' name='username' value='$username'>";?></td>
												</tr>
												<tr>
													<td><label><font style="font-size: 23px;">Address : </font></label></td>
													<td><?php echo "<input type='textarea' name='address' value='$address'>";?></td>
												</tr>
												<tr>
													<td><label><font style="font-size: 23px;">Phone No. : </font></label></td>
													<td><?php echo "<input type='tel' name='phoneno' value='$phoneno'>";?><br></td>
												</tr>
												<tr>
													<td><label><font style="font-size: 23px;">Password : </font></label></td>
													<td><?php echo "<input type='text' name='password' value='$password'>";?></td>
												</tr>

											</tbody>
										</table>
										<center><button name="edit" class="btn btn-secondary">Save Changes</button></center>
									</form>
								</div>
							</div>
						</div>
						<?php
					}
					
					else if($_GET['screen']=='confirmbuy'){
						?>
						<div class="row">
							<div class="col-md-2 mb-5"></div>
							<div class="col-md-8 mb-5">
								<div class="card m-6 mt-3 bg-light p-2">
									<center><legend><h3>Proceed to buy the token ?</h3></legend><br>
									<form method="post" action="userprocess.php">
										<?php
										$_SESSION['token_no']=$_POST['token_no'];
										?>
										<button class="btn btn-dark" name="buy">Proceed</button>
									</form>
									<a class="nav-link" href="?screen=buytoken"><button class="btn btn-dark" >Cancel</button></a>
									</center>
								</div>
							</div>
						</div>
						<?php
					}
				
					else if($_GET['screen']=='buytoken'){
						?>
						<br><br>
							<form method="post" action="?screen=confirmbuy">
							<div class ="row">
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>1</h4>
									<button class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="1">Buy</button>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>2</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="2" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>3</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="3" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>4</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="4" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>5</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="5" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>6</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="6" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>7</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="7" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>8</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="8" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>9</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="9" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>10</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="10" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>11</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="11" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>12</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="12" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>13</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="13" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>14</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="14" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>15</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="15" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>16</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="16" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>17</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="17" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>18</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="18" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>19</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="19" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>20</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="20" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>21</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="21" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>22</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="22" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>23</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="23" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>24</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="24" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>25</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="25" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>26</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="26" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>27</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="27" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>28</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="28" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>29</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="29" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>30</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="30" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>31</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="31" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>32</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="32" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>33</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="33" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>34</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="34" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>35</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="35" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>36</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="36" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>37</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="37" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>38</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="38" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>39</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="39" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>40</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="40" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>41</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="41" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>42</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="42" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>43</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="43" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>44</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="44" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>45</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="45" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>46</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="46" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>47</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="47" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>48</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="48" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>49</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="49" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>50</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="50" onclick="myFunction()">Buy</button></a>
								</center>
								</div>
								</div>

							</div>
						</form>
						<?php
					}
					else if($_GET['screen']=='addmoney'){
						?>
						<div class="row">
							<div class="col-12">
								<div class="card m-2 mt-3 bg-light p-2">
									<center><form method="post" action="userprocess.php"><br>
									<label><h5>Amount You Want To Add : </h5></label><br>
									<input type="number" name="amount" id="amount" placeholder="Enter Amount" required><br><br>
									<button type="submit" name="addmoney" class="btn btn-primary">Proceed</button>
									</form></center>
								</div>
							</div>
						</div>
						<?php
					}
					else if($_GET['screen']=='balance'){
						?>
							<div class="row">
							<div class="col-12">
								<div class="card m-2 mt-3 bg-light p-2">
									<center><br>
									<label><h3>Your Balance : </h3></label><br>
									<?php
									$balance='0';
									$query1="SELECT balance from balance_details WHERE id='$id'";
									$result1=mysqli_query($conn,$query1);
								    if ($result1) {
								     while ($object1 = $result1->fetch_object()) {
								     	$balance=$object1->balance;
								      }
								      }
								      if($balance>0)
								      {
								      	echo "<label><h4>$balance</h4></label>";
								      }
								     else{
								     	echo "<label><h4>Your have 0 balance in your account</h4></label>";
								     }
								      ?>
									</center>
								</div>
							</div>
						</div>
						<?php

					}
							
					else{

					}
				}
				else{
					?>
					<div class="row">
							<div class="col-md-9 mb-5" style="margin-left: 10%;">
								<div class="card m-3 mt-3 bg-light p-2">
										<legend><center><h3>User Details :</h3></center></legend>
										<label><font style="font-size: 25px;">First Name : <?php echo $fname;?></font></label>
										<label><font style="font-size: 25px;">Last Name : <?php echo $lname;?></font></label>
										<label><font style="font-size: 25px;">Signin Date : <?php echo $date;?></font></label>
										<label><font style="font-size: 25px;">Signin Time : <?php echo $time;?></font></label>
										<label><font style="font-size: 25px;">Username : <?php echo $username;?></font></label>
										<label><font style="font-size: 25px;">Address : <?php echo $address;?></font></label>
										<label><font style="font-size: 25px;">Phone No : <?php echo $phoneno;?></font></label>
										<label><font style="font-size: 25px;">Password : <?php echo $password;?></font></label>
										<label><font style="font-size: 25px;">Tokens Buy : <?php echo $no_tokens;?></font></label>
								</div>
							</div>
						</div><?php
				}
				?>
			</div>
		</div>
	</div>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.dataTables.min.js"></script>
	<script src="../js/dataTables.bootstrap4.min.js"></script>
	<script src = "http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<script>
		$(document).ready(function(){
			$('table:not(.ticket-table table)').DataTable({
				"dom":'<"row mt-4"<"col-12 col-md-9"f><"col-12 col-md-3"l>><t><"row"<"col-12 text-center mb-2 mb-md-0 col-md-4"i><"col-12 col-md-4 text-center"p>>',
			});
			$('.declaration_checkbox').change(function(){
				if($('.declaration_checkbox:checked').length>=3){
					$('.declaration_checkbox:not(:checked)').attr('disabled',true);
				}
				else{
					$('.declaration_checkbox:not(:checked)').removeAttr('disabled');
				}
			})
		});
		$('table.reflow').find('th').each(function(index, value){

			var $this = $(this),
			title = '<b class="cell-label">' + $this.html() + '</b>';

		// add titles to cells
		$('table.reflow')
		.find('tr').find('td:eq('+index+')').wrapInner('<span class="cell-content"></span>').prepend( title );
	});
</script>
</body>
</html>
