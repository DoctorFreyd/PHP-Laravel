jQuery(document).ready(function($) {
	function getPosts(){
		$.ajax({
			url:"server.php",
			type:"post",
			data:{ajax:"getPosts"},
			success:function(r){
				// r = JSON.parse(r)
				console.log(r)
				// let s = 0
				// for (i in r) {
				// 	src.push(`${r[i]['address']}`)
				// 	// ${r[i]['address']}
				// 	$(`
				// 			<div class="" id="divimg">
    //     						<img class="img" src="${r[i]['address']}" alt="${s}">
    //  						 </div>
				// 	`).appendTo('#photos')
				// 	s++
				// }
			}
		})
	}
	getPosts()
	// $(document).on('click', 'img', function(){})
	$(document).on('click', 'img', function(){
		$("#alertPhoto").attr("src",`${this["src"]}`)
		$("#alert1").css({"display":"block"})
	})
	$(document).on('click', '.close', function(){
		$("#alert1").css({"display":"none"})
	})
	$(document).on('click','#delete',function(){
		let img = src[img_id]
		$.ajax({
			url:"server.php",
			type:"post",
			data:{ajax:"deletePhoto",img:img},
			success:function(r){
				
			}
		})
		location.reload()
	})
});