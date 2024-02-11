$(document).ready(function(){
	let src = []
	let img_id
	function getPhotos(){
		$.ajax({
			url:"server.php",
			type:"post",
			data:{ajax:"getPhoto"},
			success:function(r){
				r = JSON.parse(r)
				console.log(r)
				let s = 0
				for (i in r) {
					src.push(`${r[i]['address']}`)
					// ${r[i]['address']}
					$(`
							<div class="" id="divimg">
        						<img class="img" src="${r[i]['address']}" alt="${s}">
     						 </div>
					`).appendTo('#photos')
					s++
				}
			}
		})
	}
	getPhotos()
	console.log(src)
	// $(document).on('click', 'img', function(){})
	$(document).on('click', 'img', function(){
		img_id = this["alt"]
		$("#alertPhoto").attr("src",`${this["src"]}`)
		$("#alert1").css({"display":"block"})
	})
	$(document).on('click', '.close', function(){
		$("#alert1").css({"display":"none"})
	})
	$(document).on('click','#left',function(){
		// console.log(parseInt(img_id))
		// console.log(img_id-1)
		// console.log(src[img_id])
		// $("#alertPhoto").attr("src",`${src[img_id-1]}`)
	})
	$(document).on('click','#right',function(){
		// console.log(parseInt(img_id))
		// console.log(1+img_id)
		// console.log(src[img_id])
		// $("#alertPhoto").attr("src",`${src[img_id+1]}`)
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