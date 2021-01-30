<?php
session_start();
// if ($_SESSION['role']!='ADM') {
// 	header('Location:../');
// }
include '../connect.php';
?>
<html>
<style>
	.productbox
{
  align: center;
  max-width: 180%;
  height:20px;
  background-color: transperant;
  margin-left: 5%;
}
.box
{
  width:8%;
  height: 70px;
  background-color: lightblue;
  border-radius: 10px;
  align-items: center;
}
.container 
{
  width:10%;
  height:80px;
  position: center;
  text-align: center;
  color: black;  
}
.btn1
{
  background-color: white;
  border-color: white;
  border-radius: 5px;
  width:62px;
  height: 25px;
  font-size: 15px;
  color:black;
}
</style>
<head>
	<meta charset="UTF-8">
	<title>Admin Panel</title>
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
								<label for="">General</label>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="?screen=dashboard">Dashboard</a>
							</li>
							<li class="nav-item mt-3 border-bottom">
								<label for="">Users</label>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="?screen=all_users">All Users</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="?screen=payment">Payment Details</a>
							</li>
							<li class="nav-item mt-3 border-bottom">
								<label for="">Prizes</label>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="?screen=winners">Winners</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="?screen=winnerslist">Winners List</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="?screen=numbers">Tokens Claim</a>
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
					<li class="nav-item mt-5 border-bottom">
						<label for="">General</label>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="?screen=dashboard">Dashboard</a>
					</li>
					<li class="nav-item mt-5 border-bottom">
						<label for="">Users</label>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="?screen=all_users">All Users</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="?screen=payment">Payment Details</a>
					</li>
					<li class="nav-item mt-5 border-bottom">
						<label for="">Prizes</label>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="?screen=winners">Winners</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="?screen=winnerslist">Winners List</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="?screen=numbers">Tokens Claim</a>
					</li>
				</ul>
			</div>
			<div class="col-12 col-md-10">
				<?php if(isset($_GET['screen'])){
					if($_GET['screen']=='all_users'){
						?>
<!-- 						<div class="row">
							<div class="col-4 offset-8">
								<input type="text" id="search" class="form-control my-3" placeholder="Search">
							</div>
						</div> -->
						<table class = "table table-sm reflow">
							<thead>
								<th>ID</th>
								<th>Date</th>
								<th>Time</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email ID</th>
								<th>Address</th>
								<th>Phone No.</th>
								<th>Password</th>
							</thead>
			                <tbody>
			                      <?php
			                      $query="select * from login_details";
			                      $result=mysqli_query($conn, $query);
			                      if ($result) {
			                      while ($object = $result->fetch_object()) 
			                      {
			                      echo "<tr>
			                        <td>".$object->id."</td>
			                        <td>".$object->date."</td>
			                        <td>".$object->time."</td>
			                        <td>".$object->fname."</td>
			                        <td>".$object->lname."</td>
			                        <td>".$object->username."</td>
			                        <td>".$object->address."</</td>
			                        <td>".$object->phoneno."</td>
			                        <td>".$object->password."</td>
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

					else if($_GET['screen']=='confirmwinner'){
						?>
						<div class="row">
							<div class="col-md-2 mb-5"></div>
							<div class="col-md-8 mb-5">
								<div class="card m-6 mt-3 bg-light p-2">
									<center><legend><h3>Are you sure to make token <?php echo $_POST['token_no'];?> as winning token ?</h3></legend><br>
									<form method="post" action="adminprocess.php">
										<?php
										$_SESSION['token_no']=$_POST['token_no'];
										?>
										<button class="btn btn-dark" name="winner">Proceed</button>
									</form>
									<a class="nav-link" href="?screen=winners"><button class="btn btn-dark" >Cancel</button></a>
									</center>
								</div>
							</div>
						</div>
						<?php
					}
					else if($_GET['screen']=='winners'){
						
						?>
						<br><br>
						<form method="post" action="?screen=confirmwinner">
							<div class ="row">
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>1</h4>
									<button class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="1">Winner</button>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>2</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="2" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>3</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="3" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>4</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="4" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>5</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="5" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>6</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="6" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>7</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="7" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>8</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="8" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>9</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="9" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>10</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="10" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>11</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="11" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>12</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="12" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>13</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="13" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>14</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="14" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>15</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="15" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>16</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="16" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>17</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="17" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>18</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="18" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>19</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="19" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>20</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="20" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>21</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="21" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>22</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="22" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>23</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="23" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>24</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="24" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>25</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="25" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>26</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="26" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>27</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="27" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>28</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="28" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>29</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="29" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>30</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="30" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>31</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="31" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>32</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="32" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>33</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="33" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>34</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="34" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>35</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="35" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>36</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="36" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>37</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="37" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>38</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="38" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>39</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="39" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>40</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="40" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>41</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="41" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>42</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="42" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>43</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="43" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>44</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="44" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>45</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="45" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>46</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="46" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>47</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="47" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>48</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="48" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>49</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="49" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>
								<div class="col-12 col-md-2  mb-3 stats">
								<div class="bg-secondary p-3" style="border-radius: 10px;">
									<center><h4>50</h4>
									<button  class="btn btn-dark" style="border-radius: 5px;width:70%" name="token_no" value="50" onclick="myFunction()">Winner</button></a>
								</center>
								</div>
								</div>

							</div>
						</form>

						<?php
					}
					else if($_GET['screen']=='payment'){
						?>
						<table class = "table table-sm reflow">
							<thead>
								<th>ID</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email ID</th>
								<th>Address</th>
								<th>Phone No.</th>
								<th>Balance</th>

							</thead>
			                <tbody>
			                      <?php
			                      $query="SELECT login_details.id,login_details.fname,login_details.lname,login_details.username,login_details.address,login_details.phoneno,balance_details.balance FROM login_details INNER JOIN balance_details ON login_details.id = balance_details.id";
			                      $result=mysqli_query($conn, $query);
			                      if ($result) {
			                      	while ($object = $result->fetch_object()) 
			                      {
				                    		echo "<tr>
					                        <td>".$object->id."</td>
					                        <td>".$object->fname."</td>
					                        <td>".$object->lname."</td>
					                        <td>".$object->username."</td>
					                        <td>".$object->address."</</td>
					                        <td>".$object->phoneno."</td>
					                        <td>".$object->balance."</td>
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
					else if($_GET['screen']=='winnerslist'){
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
					else if($_GET['screen']=='numbers'){
						?>
						<div class="row">
							<div class="col-md-9 mb-5" style="margin-left: 10%;">
								<div class="card m-3 mt-3 bg-light p-2">
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
			                      $query="SELECT login_details.fname,login_details.lname,login_details.username,login_details.address,login_details.phoneno,tokens.token_no,tokens.tid FROM login_details INNER JOIN tokens ON login_details.id = tokens.id";
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
								</div>
							</div>
						</div>
						<?php
					}
					else if($_GET['screen']=='dashboard'){
						?>
						<h4 class="py-2 pt-4">Users</h4>
						<div class="row">
							<div class="col-12 col-md-4 mb-3 stats">
								<div class="bg-light p-3">
									<center><h4>Total Registered</h4></center>
									<center><h3>
										<?php 
										$sql="select count(*) as total from login_details";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) 
					                      {
					                      // output data of each row
					                      while($row = $result->fetch_assoc()) {
					                        $total=$row["total"];
					                      }
					                      }
					                     echo $total;
										?>	
									</h3>
								</center>
								</div>
							</div>
							<div class="col-12 col-md-4 mb-3 stats">
								<div class="bg-light p-3">
									<center><h4>Tokens Generated for</h4></center>
									<center><h3>
										<?php 
										$sql="SELECT count(*) as count FROM login_details WHERE id IN (SELECT ID FROM tokens)";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) 
					                      {
					                      // output data of each row
					                      while($row = $result->fetch_assoc()) {
					                        $count=$row["count"];
					                      }
					                      }
					                     echo $count;
										?>	
									</h3>
								</center>
								</div>
							</div>
							<div class="col-12 col-md-4 mb-3 stats">
								<div class="bg-light p-3">
									<center><h4>Payment Received</h4></center>
									<center><h3>
										<?php 
										$sql="select sum(payment) as total from tokens";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) 
					                      {
					                      // output data of each row
					                      while($row = $result->fetch_assoc()) {
					                        $total=$row["total"];
					                      }
					                      }
					                    echo $total;
										?>	
									</h3>
								</center>
								</div>
							</div>
							</div>

						<h4 class="py-2 pt-4">Tokens</h4>
						<div class="row">
							<div class="col-12 col-md-4 mb-3 stats">
								<div class="bg-light p-3">
									<center><h4>Total Tokens Generated</h4></center>
									<center><h3>
										<?php 
										$sql="select count(*) as total from tokens";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) 
					                      {
					                      // output data of each row
					                      while($row = $result->fetch_assoc()) {
					                        $total=$row["total"];
					                      }
					                      }
					                     echo $total;
										?>	
									</h3>
								</center>
								</div>
							</div>
							<div class="col-12 col-md-4 mb-3 stats">
								<div class="bg-light p-3">
									<center><h4>Winners Declared</h4></center>
									<center><h3>
										<?php 
										$sql="SELECT count(*) as count FROM tokens WHERE winning_status=1";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) 
					                      {
					                      // output data of each row
					                      while($row = $result->fetch_assoc()) {
					                        $count=$row["count"];
					                      }
					                      }
					                     echo $count;
										?>	
									</h3>
								</center>
								</div>
							</div>
							
						<?php
					}
				else{}}
					else{?>
						<h4 class="py-2 pt-4">Users</h4>
						<div class="row">
							<div class="col-12 col-md-4 mb-3 stats">
								<div class="bg-light p-3">
									<center><h4>Total Registered</h4></center>
									<center><h3>
										<?php 
										$sql="select count(*) as total from login_details";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) 
					                      {
					                      // output data of each row
					                      while($row = $result->fetch_assoc()) {
					                        $total=$row["total"];
					                      }
					                      }
					                     echo $total;
										?>	
									</h3>
								</center>
								</div>
							</div>
							<div class="col-12 col-md-4 mb-3 stats">
								<div class="bg-light p-3">
									<center><h4>Tokens Generated for</h4></center>
									<center><h3>
										<?php 
										$sql="SELECT count(*) as count FROM login_details WHERE id IN (SELECT ID FROM tokens)";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) 
					                      {
					                      // output data of each row
					                      while($row = $result->fetch_assoc()) {
					                        $count=$row["count"];
					                      }
					                      }
					                     echo $count;
										?>	
									</h3>
								</center>
								</div>
							</div>
							<div class="col-12 col-md-4 mb-3 stats">
								<div class="bg-light p-3">
									<center><h4>Payment Received</h4></center>
									<center><h3>
										<?php 
										$sql="select sum(payment) as total from tokens";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) 
					                      {
					                      // output data of each row
					                      while($row = $result->fetch_assoc()) {
					                        $total=$row["total"];
					                      }
					                      }
					                    echo $total;
										?>	
									</h3>
								</center>
								</div>
							</div>
							</div>

						<h4 class="py-2 pt-4">Tokens</h4>
						<div class="row">
							<div class="col-12 col-md-4 mb-3 stats">
								<div class="bg-light p-3">
									<center><h4>Total Tokens Generated</h4></center>
									<center><h3>
										<?php 
										$sql="select count(*) as total from tokens";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) 
					                      {
					                      // output data of each row
					                      while($row = $result->fetch_assoc()) {
					                        $total=$row["total"];
					                      }
					                      }
					                     echo $total;
										?>	
									</h3>
								</center>
								</div>
							</div>
							<div class="col-12 col-md-4 mb-3 stats">
								<div class="bg-light p-3">
									<center><h4>Winners Declared</h4></center>
									<center><h3>
										<?php 
										$sql="SELECT count(*) as count FROM tokens WHERE winning_status=1";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) 
					                      {
					                      // output data of each row
					                      while($row = $result->fetch_assoc()) {
					                        $count=$row["count"];
					                      }
					                      }
					                     echo $count;
										?>	
									</h3>
								</center>
								</div>
							</div>
							<?php
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
