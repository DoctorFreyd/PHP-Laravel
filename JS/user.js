jQuery(document).ready(function() {
	function getInfo(){
		let id = $("#user_id").val()
		$.ajax({
			url:"server.php",
			type:"post",
			data:{ajax:"getUser",id:id},
			success:function(r){
				r = JSON.parse(r)
				$(".card").empty()
				for (i in r){
					$(".card").append(` 
						<img class="card-img-top" src="https://www.clipartkey.com/mpngs/m/152-1520367_user-profile-default-image-png-clipart-png-download.png" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title">${r[i]['name']}</h5>
							<h5 class="card-title">${r[i]['surname']}</h5>
							<h5 class="card-title">${r[i]['age']}</h5>		
						</div>
						`)
				}
			}
		})
	}
	getInfo()

});