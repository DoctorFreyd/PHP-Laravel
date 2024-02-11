
<?php 
session_start();
if (isset($_SESSION["user"])) {
	$user = $_SESSION["user"];	
}
else{
	header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!-- Google Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	<!-- Bootstrap core CSS -->
	<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"> -->
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
	<link rel="stylesheet" href="CSS/header.css">
</head>

<div class="container-fluid bg-dark">
	<nav class="navbar navbar-expand-lg navbar-dark ">
		<a class="navbar-brand text-uppercase" href="#">Navbar</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse bg-secondary" id="navbarSupportedContent2">

			<ul class="navbar-nav mr-auto">
				<li class="nav-item ">
					<a class="nav-link text-uppercase" href="profile.php">Profile
						<span class="sr-only">(current)</span>
					</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link text-uppercase" href="photo.php">Photo
						<span class="sr-only">(current)</span>
					</a>
				</li>
				<li class="nav-item dropdown multi-level-dropdown">
					<a href="#" id="menu" data-toggle="dropdown" class="nav-link dropdown-toggle white-text " 
					>DROPDOWN</a>
					<ul class="dropdown-menu mt-2 rounded-0 pink darken-4 border-0 z-depth-1">
						<li class="dropdown-item dropdown-submenu p-0">
							<a href="#" class="text-white w-100">Click Me Too! </a>
						</li>
						<li class="dropdown-item dropdown-submenu p-0">
							<a href="edit.php" class="text-white w-100">Edit Profile </a>
							<ul class="dropdown-menu ml-1 rounded-0 pink darken-4 border-0 z-depth-1">
								<li class="dropdown-item p-0">
									<a href="edit.php?profile" class="text-white w-100">Profile Info</a>
								</li>
								<li class="dropdown-item p-0">
									<a href="edit.php?password" class="text-white w-100">My Password</a>
								</li>								
							</ul>
						</li>
					</ul>
				</li>
				<li class="nav-item" id="logout">
					<a class="nav-link text-uppercase"><i class="fa fa-sign-out" style="font-size:24px"></i>
						<span class="sr-only">(current)</span>
					</a>
				</li>

			</ul>
			<!-- Search -->
			<div class="form-inline">
				<div class="md-form my-0">
					<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" id="search">
				</div>
				<!-- Search Result -->
				<div class="card bg-dark text-light rounded" id="sbox">
					<ul class="list-group sresult">
					</ul>
				</div>
			</div>
		</div>
		
	</nav>
</div>

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap tooltips -->
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="JS/header.js"></script>

<!-- https://mdbootstrap.com/snippets/jquery/adamjakubowski/656393#html-tab-view -->