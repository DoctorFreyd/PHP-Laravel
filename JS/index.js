$(document).ready(function() {
	$("#login").click(function(){
		let user = {
			email:$("#email").val(),
			password:$("#password").val(),
		}
		$.ajax({
			url:"server.php",
			type:"post",
			data:{ajax:"login",user:user},
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
					Swal.fire(
						'You have logged in!',
						'Welcome to our website!',
						'success'
						)
					setTimeout(function(){
						location.href = "profile.php"
					},1000)
				}				
			}
		})
	})


});