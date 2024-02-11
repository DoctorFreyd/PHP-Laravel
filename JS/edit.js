$(document).ready(function() {
	$("#changeProfile").click(function(){
		let user = {
			name:$("#name").val(),
			surname:$("#surname").val(),
			age:$("#age").val(),
			email:$("#email").val(),
			photo:$("#photo").val(),
			pass:$("#password").val(),
		} 
		Swal.fire({
			title: 'Are you sure?',
			text: "You want to Change info about You?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Edit!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url:"server.php",
					type:"post",
					data:{ajax:"changeProfile",user:user},
					success:function(r){
						$(".errors").remove()
						if (r != "success") {
							r = JSON.parse(r)
							for(el in r){
								$("#"+el).val("")
								$("#"+el).after(`<label for="${el}" class="text-info errors">${r[el]}</label>`);
							}
						}
					}
				})
			}
		})


	})

	$("#changePassword").click(function(){
		let pass = {
			hpass:$("#hpass").val(),
			npass:$("#npass").val(),
			cpass:$("#cpass").val(),
		}
		if (pass["hpass"] != pass["npass"]) {
			Swal.fire({
				title: 'Are you sure?',
				text: "You want to Change info about You?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Edit!'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url:"server.php",
						type:"post",
						data:{ajax:"changePassword",pass:pass},
						success:function(r){
							$(".errors").remove()
							if (r != "success") {
								r = JSON.parse(r)
								for(el in r){
									$("#"+el).val("")
									$("#"+el).removeAttr('placeholder')
									$("#"+el).after(`<label for="${el}" class="text-info errors">${r[el]}</label>`);
								}
							}
							else{
								$("#hpass").val("")
								$("#npass").val("")
								$("#cpass").val("")
								Swal.fire({
									title: 'Great your password already has changed.',
									width: 600,
									padding: '3em',
									background: '#fff url(https://c4.wallpaperflare.com/wallpaper/410/867/750/vector-forest-sunset-forest-sunset-forest-wallpaper-thumb.jpg)',
									backdrop: `
									rgba(0,0,123,0.4)
									url(https://thumbs.gfycat.com/CaringCreepyAtlanticsharpnosepuffer-size_restricted.gif)
									left top
									no-repeat
									`
								})
							}
						}
					})
				}
			})
		}
		else {
			$("#hpass").removeAttr("placeholder")
			$("#hpass").val("")
			$("#npass").val("")
			$("#cpass").val("")
			$("#hpass").after(`<label for="#hpass" class="text-info errors">Paroly chi karox nuyny linel</label>`);
		}
	})

})