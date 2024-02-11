<!-- HTML -->
<?php require_once 'header.php';?>
	<input type="hidden" type="text" value="<?=$_GET['id']?>" id="user_id">
	<div class="card" style="width: 18rem;">
		<img class="card-img-top" src="https://www.clipartkey.com/mpngs/m/152-1520367_user-profile-default-image-png-clipart-png-download.png" alt="Card image cap">
		<div class="card-body">
			<h5 class="card-title"><?= $user["name"] ?></h5>
			<h5 class="card-title"><?= $user["surname"] ?></h5>
			<h5 class="card-title"><?= $user["age"] ?></h5>
			
		</div>
	</div>

<script src="JS/user.js"></script>
<?php require_once 'footer.php';?>
