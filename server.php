<?php 
class Project{
	private $db;
	function __construct(){
		$this->db = new mysqli("localhost","root","","project");
		$this->db->set_charset("UTF8");
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (isset($_POST["ajax"])) {
				if ($_POST["ajax"] == "register") {
					$this->register();
				}
				if ($_POST["ajax"] == "login") {
					$this->login();
				}
				if ($_POST["ajax"] == "search") {
					$this->search();
				}
				if ($_POST["ajax"] == "logout") {
					$this->logout();
				}
				if ($_POST["ajax"] == "changeProfile") {
					$this->editProfile();
				}
				if ($_POST["ajax"] == "changePassword") {
					$this->editPassword();
				}	
				if ($_POST["ajax"] == "getPhoto") {
					$this->getPhoto();
				}	
				//Request
				if ($_POST["ajax"] == "addGuest") {
					$this->addGuest();
				}
				if ($_POST["ajax"] == "deleteGuest") {
					$this->deleteGuest();
				}
				if ($_POST["ajax"] == "addRequest") {
					$this->addRequest();
				}
				if ($_POST["ajax"] == "delRequest") {
					$this->delRequest();
				}  
				if ($_POST["ajax"] == "getUser") {
					$this->getUser();
				}
				if ($_POST["ajax"] == "deletePhoto") {
					$this->deletePhoto();
				}
				// Posts
				if ($_POST["ajax"] == "addPosts") {
					$this->addPosts();
				} 
				if ($_POST["ajax"] == "getPosts") {
					$this->getPosts();
				} 
			}
			// Photo
			if (isset($_FILES["image"])) {
				$this->addPhoto();
			}		
		}	
	}
	function register(){
		extract($_POST["user"]);
		$mails = $this->db->query("SELECT * from user WHERE email = '$email' ")->fetch_all(true);
			// print json_encode($mails);

		$errors = [];
		if (empty($name)) {
			$errors["name"] = "Lracreq name dashty";
		}
		if (empty($surname)) {
			$errors["surname"] = "Lracreq surname dashty";
		}
		if (empty($age)) {
			$errors["age"] = "Lracreq age dashty";
		}
		elseif (!is_numeric($age)) {
			$errors["age"] = "Lracreq tiv 1-100";
		}
		if (empty($email)) {
			$errors["email"] = "Lracreq email dashty";
		}
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors["email"] = " Lracreq chisht email (test@mail.ru)";
		}
		elseif (count($mails) > 0){
			$errors["email"] = "Already registered";
		}
		if (empty($password)) {
			$errors["password"] = "Lracreq password dashty";
		}
		elseif (strlen($password) < 6) {
			$errors["password"] = "Lracreq minimum 6 nish";
		}
		elseif ($password != $cpassword) {
			$errors["password"] = "Passwordnery chen hamnknum";
		}
		if (empty($cpassword)) {
			$errors["cpassword"] = "Lracreq password dashty";
		}
		if (count($errors) > 0) {
			print json_encode($errors);
		} 
		else {
			print "success";
			$hash = password_hash($password,PASSWORD_DEFAULT);
			$this->db->query("INSERT into user(name, surname, age,email,password,photo) VALUES ('$name', '$surname', '$age','$email','$hash','image/default.jpg')");
		}
	}
	function login(){
		extract($_POST["user"]);
		$errors = [];
		if (empty($email)) {
			$errors["email"] = "Lracreq email dashty";
		} else{
			$user = $this->db->query("SELECT * from user WHERE email = '$email' ")->fetch_all(true)[0];
			if (count($user) == 0) {
				$errors["email"] = "Email is not registered";
			}
			else{
				if (!password_verify($password, $user["password"])) {
					$errors["email"] = "Email or password is incorrect";
				}
				else{
					session_start();
					unset($user["password"]);
					$_SESSION["user"] = $user;
					print "success";
				}
			}
		}
		if (count($errors) > 0) {
			print json_encode($errors);
		}
	}
	// Search
	function search(){
		session_start();
		$id = $_SESSION['user']['id'];
		$search = $_POST["search"];
		$result = $this->db->query("SELECT id,name,surname,age,photo from user WHERE name LIKE '%$search%' or surname LIKE '%$search%' and id != '$id' ")->fetch_all(true);
		for ($i = 0; $i < count($result); $i++) {
			$result[$i]['info'] = '';
			$d = $result[$i]["id"];
			$s = $this->db->query("SELECT * FROM friends WHERE user_1_id = '$id' AND user_2_id = '$d' ")->fetch_all(true);
			$r_from_me = $this->db->query("SELECT * FROM request WHERE from_id = '$id' AND to_id = '$d' ")->fetch_all(true);
			$r_to_me = $this->db->query("SELECT * FROM request WHERE from_id = '$d' AND to_id = '$id' ")->fetch_all(true);
			if (count($s) > 0) {
				$result[$i]["info"] = "friends";
			}
			else if(count($r_from_me) > 0){
				$result[$i]["info"] = "req_to";
			}
			else if(count($r_to_me) > 0){
				$result[$i]["info"] = "req_me";
			}
			else{
				$result[$i]["info"] = "geust";
			}
		}
		print json_encode($result);
	}

	function logout(){
		session_start();
		session_destroy();
	}
	// Edit Profile
	function editProfile(){
		session_start();
		extract($_POST['user']);
		$id = $_SESSION['user']['id'];
		$mails = $this->db->query("SELECT * from user WHERE email = '$email' and id != '$id'")->fetch_all(true);
		$user = $this->db->query("SELECT * from user WHERE email = '$email'")->fetch_all(true);
		$errors = [];
		if (empty($name)) {
			$errors['name'] = 'Enter your name';
		}
		if (empty($surname)) {
			$errors['surname'] = 'Enter you surname';
		}
		if (empty($age)) {
			$errors['age'] = 'Enter your age';
		}
		elseif (!is_numeric($age)) {
			$errors["age"] = "Lracreq tiv 1-100";
		}
		if (empty($email)) {
			$errors['Email'] = 'Enter your email';
		}
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors["email"] = " Lracreq chisht email (test@mail.ru)";
		}
		elseif (count($mails) > 0){
			$errors["email"] = "Ays email arden ogtagorcvum e";
		}
		if (empty($pass)) {
			$errors["password"] = "Hastateq vor duq eq!";
		}
		elseif (!password_verify($pass, $user[0]['password'])) {
			$errors["password"] = "Moraceleq dzer passwordy ?!";
		}
		if (count($errors) > 0) {
			print json_encode($errors);
		} 
		else {
			$this->db->query("UPDATE user SET name = '$name',surname = '$surname',age='$age',email='$email' WHERE id = $id");
			$_SESSION['user']['name'] = $name;
			$_SESSION['user']['surname'] = $surname;
			$_SESSION['user']['age'] = $age;
			$_SESSION['user']['email'] = $email;
			print "success";
		}
	}
	function editPassword(){
		session_start();
		extract($_POST["pass"]);
		$id = $_SESSION['user']['id'];
		$user = $this->db->query("SELECT * from user WHERE id = '$id'")->fetch_all(true);
		$errors = [];
		if (empty($hpass)) {
			$errors["hpass"] = "Hastateq vor duq eq!";
		}
		elseif (!password_verify($hpass, $user[0]['password'])) {
			$errors["hpass"] = "Moraceleq dzer passwordy ?!";
		}
		if (empty($npass)) {
			$errors["npass"] = "Yntreq dzer nor paroly!";
		}
		elseif (strlen($npass) < 6) {
			$errors["npass"] = "Lracreq minimum 6 nish";
		}
		elseif ($npass != $cpass) {
			$errors["npass"] = "Passwordnery chen hamnknum";
		}
		if (empty($cpass)) {
			$errors["cpass"] = "Lracreq password dashty";
		}
		if (count($errors) > 0) {
			print json_encode($errors);
		}
		else{
			$hash = password_hash($npass, PASSWORD_DEFAULT);
			$this->db->query("UPDATE user SET password = '$hash' WHERE id = $id");
			print "success";
		}

	}
	// Request
	function addGuest(){
		session_start();
		$id1 = $_SESSION['user']['id'];
		$id2 = $_POST["id"];
		print $id2;
		$this->db->query("
				INSERT INTO request(from_id, to_id)
				VALUES ('$id1', '$id2')
				");
	}
	function deleteGuest(){
		session_start();
		$id1 = $_SESSION['user']['id'];
		$id2 = $_POST["id"];
		$this->db->query("DELETE FROM request WHERE from_id = '$id2' AND to_id = '$id1' ");
	}
	function delRequest(){
		session_start();
		$id1 = $_SESSION['user']['id'];
		$id2 = $_POST["id"];
		print $id2;
		$this->db->query("DELETE FROM request WHERE from_id = '$id1' AND to_id = '$id2' ");
	}
	function addRequest(){
		session_start();
		$id1 = $_SESSION['user']['id'];
		$id2 = $_POST["id"];
		$this->db->query("
				INSERT INTO friends(user_1_id,user_2_id)
				VALUES ('$id1','$id2')
				");
		$this->db->query("
				INSERT INTO friends(user_1_id,user_2_id)
				VALUES ('$id2','$id1')
				");
		$this->db->query("DELETE FROM request WHERE from_id = '$id2' AND to_id = '$id1' ");
	}
	// Photo
	function addPhoto(){
		session_start();
		$id = $_SESSION['user']['id'];
		$photo  = $_FILES["image"];
		// jamanakavor hasce
		$tmp = $photo["tmp_name"];
		// himnakan hasce
		$address = "image/".time().$photo["name"];
		if (!file_exists("image")) {
			mkdir("image");
		}
		move_uploaded_file($tmp, $address);
		$this->db->query("
				INSERT INTO photo(user_id,address)
				VALUES ('$id','$address')
				");
		header("Location:photo.php");
	}
	function getPhoto(){
		session_start();
		$id = $_SESSION['user']['id'];
		$photo = $this->db->query("SELECT * FROM photo WHERE user_id = '$id' ")->fetch_all(true);
		print json_encode($photo);
	}
	function deletePhoto(){
		session_start();
		$id = $_SESSION['user']['id'];
		$address = $_POST["img"];
		$this->db->query("DELETE from photo WHERE user_id = '$id' and address = '$address' ");
		unlink($address);
		print "success";
	}
	// Posts
	function addPosts(){
		session_start();
		$id = $_SESSION['user']['id'];
		$target_file  = $_FILES["upload"];
		if (!file_exists("post")) {
			mkdir("post");
		}
		// 
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		print $imageFileType;
		// $tmp = $target_file["tmp_name"];
		// $address = "post/".time().$target_file["name"];
		// move_uploaded_file($tmp, $address);
		// header("Location:profile.php");
	}
	function getPosts(){
		print "OK";
	}



	// Get User 
	function getUser(){
		session_start();
		$user_id = $_SESSION['user']['id']; 
		$id = $_POST["id"];
		$user = $this->db->query("SELECT * FROM user WHERE id = '$id' ")->fetch_all(true);
		$type = $this->db->qeury("SELECT * FROM friends WHERE user_1_id = '$id' AND user_2_id = '$user_id' ")->fetch_all(true);
		if (count($type) > 0) {
			$user["type"] = "friend";
		}
		else {
			$user
		}
		print json_encode($user);
	}
}
new Project();


?>