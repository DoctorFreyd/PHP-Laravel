<!-- HTML -->
<?php require_once 'header.php';?>
<link rel="stylesheet" href="CSS/photo.css">
<!-- Body -->
<div class="bg-dark w-50 p-4 mx-auto text-light ">
	<form method="post" action="server.php" enctype="multipart/form-data">
		<input type="file" name="image">
		<button class="btn btn-success">AddPhoto</button>
	</form>
</div>
  <!-- photo Alert -->
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
    <div id="photos">
    </div>
  </div>

<script src="JS/photo.js"></script>
<?php require_once 'footer.php';?>