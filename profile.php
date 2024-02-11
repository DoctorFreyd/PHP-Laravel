<?php require_once 'header.php';?>
<link rel="stylesheet" href="CSS/photo.css">
<!-- Body -->
	<div class="card" style="width: 18rem;">
		<img class="card-img-top" src="https://www.clipartkey.com/mpngs/m/152-1520367_user-profile-default-image-png-clipart-png-download.png" alt="Card image cap">
		<div class="card-body">
			<h5 class="card-title"><?= $user["name"] ?></h5>
			<h5 class="card-title"><?= $user["surname"] ?></h5>
			<h5 class="card-title"><?= $user["age"] ?></h5>
			
		</div>
	</div>
	<!-- Add Post -->
	<div class="bg-dark w-50 p-4 mx-auto text-light ">
	<form method="post" action="server.php" enctype="multipart/form-data">
		<input type="file" name="upload">
		<button class="btn btn-success">AddPost</button>
	</form>
</div>
	  <!-- Post Alert -->
  <div id="alert1"> 
      <div id="alert2">
        <section id="page">
          <header>Header
            <button class="close">x</button>
          </header>
          <!-- Comments -->
          <nav> 
              <div class="posts">
       
              </div>
              <textarea class="sendpost">
                
              </textarea>
          </nav>
          <!-- Gallery -->
          <main>Main area
            <button id="left"><</button>
            <img src="" id="alertPhoto">
            <button id="right">></button>
          </main>
          <footer>Footer
          	<button id="delete">Delete</button>
          </footer>
        </section>
        <div class="gallery"></div>
        <div class="comments"></div>
      </div>
  </div>
  <!-- All Photos -->
  <div class="container" id="div1" align="center">
    <div id="posts">
    </div>
  </div>
<?php require_once 'footer.php';?>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript" src="js/profile.js"></script>
</html>