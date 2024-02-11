<?php require_once 'header.php';?>
<link rel="stylesheet" href="CSS/edit.css">
<?php if (isset($_GET["profile"])) { ?>
<div class="container">
	<div class="py-5 text-center">
		<img class="d-block mx-auto mb-4" src="https://mdbootstrap.com/img/logo/mdb-transparent-250px.png" alt="" width="180">
		<h2 class="my-4 pt-2 text-white"><strong>Checkout form</strong></h2>
		<p class="lead text-white">Below is an example form built entirely with Bootstrap’s form controls. Each required form group
		has a validation state that can be triggered by attempting to submit the form without completing it.</p>
	</div>
</div>
<div class="col-md-8 order-md-1 mx-auto">
	<h4 class="mb-3 w-50 mx-auto"><strong>Edit your profile</strong></h4>
	<div class="needs-validation w-50 mx-auto" novalidate>
		<div class="row">
			<div class="col-md-6 mb-3">
				<div class="md-form md-outline my-2">
					<input type="text" value="<?= $user['name'] ?>" id="name" class="form-control text-light" required>

				</div>
			</div>
			<div class="col-md-6 mb-3">
				<div class="md-form md-outline my-2">
					<input type="text" value="<?= $user['surname'] ?>" id="surname" class="form-control text-light" required>
					
				</div>
			</div>
		</div>

		<div class="mb-3">
			<div class="md-form md-outline my-2">
				<input type="text" value="<?= $user['age'] ?>" id="age" class="form-control text-light" required>
				
			</div>
		</div>

		<div class="row">
			<div class="col-12 mb-3">
				<div class="md-form md-outline my-2">
					<input type="email" value="<?= $user['email'] ?>" id="email" class="form-control text-light">
					
				</div>
			</div>
			<div class="col-12 mb-3">
				<div class="md-form md-outline my-2">
					<input type="text" id="password" value="Enter password" class="form-control text-light" required>
					
				</div>
			</div>
		</div>
		<hr class="mb-4">
		<button class="btn btn-primary btn-lg btn-block" type="submit" id="changeProfile">Change the Info</button>
	</div>
</div>
</div>

<div class="my-5 pt-5 text-muted text-center text-small">
	<p class="mb-1">&copy; 2017-2019 Company Name</p>
	<ul class="list-inline">
		<li class="list-inline-item"><a href="https://forum.arizona-rp.com/threads/2338749/">Privacy</a></li>
		<li class="list-inline-item"><a href="https://arizona-rp.com/">Terms</a></li>
		<li class="list-inline-item"><a href="https://arizona-rp.com/map/12">Support</a></li>
	</ul>
</div>
</div>
<?php } ?>

<?php if (isset($_GET["password"])) { ?>
<div class="container">
	<div class="py-5 text-center">
		<img class="d-block mx-auto mb-4" src="https://mdbootstrap.com/img/logo/mdb-transparent-250px.png" alt="" width="180">
		<h2 class="my-4 pt-2 text-white"><strong>Checkout form</strong></h2>
		<p class="lead text-white">Below is an example form built entirely with Bootstrap’s form controls. Each required form group
		has a validation state that can be triggered by attempting to submit the form without completing it.</p>
	</div>
</div>
<div class="col-md-8 order-md-1 mx-auto">
	<h4 class="mb-3 w-50 mx-auto"><strong>Edit your profile</strong></h4>
	<div class="needs-validation w-50 mx-auto" novalidate>
		<div class="row">
			<div class="col-12 mb-3">
				<div class="md-form md-outline my-2">
					<input type="text" id="hpass" class="form-control text-light" placeholder="Enter Your old password" required>
					
				</div>
			</div>
			<div class="col-12 mb-3">
				<div class="md-form md-outline my-2">
					<input type="text" id="npass" class="form-control text-light" placeholder="Enter Your new password" required>
					
				</div>
			</div>
			<div class="col-12 mb-3">
				<div class="md-form md-outline my-2">
					<input type="text" id="cpass" class="form-control text-light" placeholder="Enter Your new password again" required>
					
				</div>
			</div>
		</div>
		<hr class="mb-4">
		<button class="btn btn-primary btn-lg btn-block" type="submit" id="changePassword">Change the Password</button>
	</div>
</div>
</div>

<div class="my-5 pt-5 text-muted text-center text-small">
	<p class="mb-1">&copy; 2017-2019 Company Name</p>
	<ul class="list-inline">
		<li class="list-inline-item"><a href="https://forum.arizona-rp.com/threads/2338749/">Privacy</a></li>
		<li class="list-inline-item"><a href="https://arizona-rp.com/">Terms</a></li>
		<li class="list-inline-item"><a href="https://arizona-rp.com/map/12">Support</a></li>
	</ul>
</div>
</div>
<?php } ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="JS/edit.js"></script>
<?php require_once 'footer.php';?>