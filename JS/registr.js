$(document).ready(function() {
	$("#register").click(function(){
		let user = {
			name:$("#name").val(),
			surname:$("#surname").val(),
			age:$("#age").val(),
			email:$("#email").val(),
			password:$("#password").val(),
			cpassword:$("#cpassword").val(),

		}
		$.ajax({
			url:"server.php",
			type:"post",
			data:{ajax:"register",user:user},
			success:function(r){
				$(".errors").remove()
				if (r != "success") {
					r = JSON.parse(r)
						console.log(r)
						for(el in r){
					$("#"+el).before(`<label class="alert alert-danger errors">${r[el]}</label>`);
					}
				} 
				else{ 
					Swal.fire({
						title: 'Success!',
						text: 'You have registered!.',
						imageUrl: 'https://unsplash.it/400/200',
						imageWidth: 400,
						imageHeight: 200,
					})
					setTimeout(function(){
						location.href = "index.php"
					},1000)
				}
				
			}
		})
	})


});