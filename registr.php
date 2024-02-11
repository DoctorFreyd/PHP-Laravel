<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="w-25 mx-auto bg-dark p-4">
		<div class="form-group">			
			<input type="text" class="form-control" placeholder="Enter name" id="name">
		</div>
		<div class="form-group">			
			<input type="text" class="form-control" placeholder="Enter surname" id="surname">
		</div>
		<div class="form-group">			
			<input type="text" class="form-control" placeholder="Enter age" id="age">
		</div>
		<div class="form-group">			
			<input type="text" class="form-control" placeholder="Enter email" id="email">
		</div>
		<div class="form-group">			
			<input type="password" class="form-control" placeholder="Enter password" id="password">
		</div>
		<div class="form-group">			
			<input type="password" class="form-control" placeholder="Confirm password" id="cpassword">
		</div>
		<div class="form-group form-check">			
				<input class="form-check-input" type="checkbox">
				<span style="color: white;">remember me</span>
		</div>
		<button class="btn btn-info" id="register">Registrate</button>
	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript" src="JS/registr.js"></script>
</html>