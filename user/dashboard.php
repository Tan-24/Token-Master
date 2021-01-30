<?php
include ('../connect.php');
include ('../login_process.php');

?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Token Master</title>
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
	<div class="container-fluid" style="width: 100%;">
		<div class="row">
			<div class="col-12 p-0" >
				<nav class="navbar navbar-expand-sm navbar-light justify-content-between" style="background-color:#8080ff;">
					<a class="navbar-brand">
					<h3><b>Token Master</b></h3>
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
						
						<ul class="navbar-nav pt-5 pt-md-0">
							<li class="nav-item">
								<a class="nav-link" href="../logout.php"><b>Logout</b></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
		<div class="row h-100">
			<div class="col-12 d-none d-md-block col-md-2" style="background-color: #e6e6ff;">
				<ul class="nav flex-column">
					<li class="nav-item mt-4 border-bottom">
						<label for="">My Profile</label>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="dashboard.php">Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="edit-profile.php">Edit Profile</a>
					</li>
					<li class="nav-item mt-4 border-bottom">
						<label for="">Payment</label>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="add-money.php">Add Money</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="balance-info.php">Balance</a>
					</li>
					<li class="nav-item mt-4 border-bottom">
						<label for="">Play Game</label>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="buy-token.php">Buy Token</a>
					</li>
					
					<li class="nav-item mt-4 border-bottom">
						<label for="">Winning List</label>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="winners.php">Declared Numbers</a>
					</li>
					
				</ul>
			</div>
			<div class="col-12 d-none d-md-block col-md-10" style="background-color:#f2f2f2;">
			<!-- dis
				play block starts-->
			<div style="width:70%; align-self: center;margin-left: 15%;"><br>
				<center><legend>User Details</legend></center>
		        <label>Name :</label>
		        <?php
		          $name=$_POST['fname'];
		          echo $name;
		         ?>
		        <br><br>
			</div>
			<!-- dispplay block ends-->
		</div>
		</div>
	</div>
</body>
</html/>
