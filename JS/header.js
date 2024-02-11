$(document).ready(function() {
	// NavBar
	$('.multi-level-dropdown .dropdown-submenu > a').on("mouseenter", function(e) {
		var submenu = $(this);
		$('.multi-level-dropdown .dropdown-submenu .dropdown-menu').removeClass('show');
		submenu.next('.dropdown-menu').addClass('show');
		e.stopPropagation();
	});

	$('.multi-level-dropdown .dropdown').on("hidden.bs.dropdown", function() {
		$('.multi-level-dropdown .dropdown-menu.show').removeClass('show');
	});
	// Search
	$("#search").on("input",function(e){
		e.preventDefault()
		// .trim() prabelneri hamar
		let stxt = $(this).val().trim()
		if (stxt.length > 0) {
			$("#sbox").show(200)
			$.ajax({
				url:"server.php",
				type:"post",
				data:{ajax:"search",search:stxt},
				success:function(r){
					$(".sresult").empty()
					r = JSON.parse(r)
					console.log(r)
					if (r.length > 0) {
						for(e in r){
							if(r[e]["info"] == "friends"){
								$(".sresult").append(`
									<li class="list-group-item border">
										<a href="user.php?id=${r[e].id}" class="text-dark">${r[e].name} ${r[e].surname}</a>
										<div class="sres">
											<button class="btnAdd1" value="${r[e].id}">
												<i class='fas fa-user-alt' style='font-size:24px'></i>
											</button>
										</div>
									</li>
									`)
							}
							else if(r[e]["info"] == "req_to"){
								$(".sresult").append(`
									<li class="list-group-item border">
										<a href="user.php?id=${r[e].id}" class="text-dark">${r[e].name} ${r[e].surname}</a>
										<div class="sres">
											<button class="btnDel" value="${r[e].id}">x</button>
										</div>
									</li>
									`)
							}
							else if(r[e]["info"] == "req_me"){
								$(".sresult").append(`
									<li class="list-group-item border">
										<a href="user.php?id=${r[e].id}" class="text-dark">${r[e].name} ${r[e].surname}</a>
										<div class="sres">
											<button class="btnSelect" value="${r[e].id}">v</button>
											<button value="${r[e].id}" class="btnRefuse">x</button>
										</div>
									</li>
									`)
							}
							else {
								$(".sresult").append(`
									<li class="list-group-item border">
										<a href="user.php?id=${r[e].id}" class="text-dark">${r[e].name} ${r[e].surname}</a>
										<div class="sres">
											<button class="btnAdd" value="${r[e].id}">+</button>
										</div>
									</li>
									`)
							}
						}
					
					}
					else {
						$(".sresult").append(`
								<li class="list-group-item border">no result</li>
								`)
					}
				}
			})
		}
		else {
			$("#sbox").hide(200)
		}
	})
	// Request
	$(document).on('click', '.btnAdd', function(){
		let s = $(this).val()
		let parent = $(this).parents('.sres')
		parent.empty()
		parent.append(`
			<button class="btnDel" value="${ s }"> x </button>
		`) 
    	$.ajax({
    		url:"server.php",
    		type:"post",
    		data:{ajax:"addGuest",id:s},
    		success:function(r){
    			console.log(r)
    		}
    	})
	})
	$(document).on('click', '.btnRefuse', function(){
		let s = $(this).val()
		let parent = $(this).parents('.sres')
		parent.empty()
		parent.append(`
			<button class="btnAdd" value="${ s }"> + </button>
		`)
    	$.ajax({
    		url:"server.php",
    		type:"post",
    		data:{ajax:"deleteGuest",id:s},
    		success:function(r){
    			
    		}
    	})
	})
	$(document).on('click', '.btnSelect', function(){
		let s = $(this).val() 
		let parent = $(this).parents('.sres')
		parent.empty()
		parent.append(`
			<button class="btnAdd1" value="${ s }">
				<i class='fas fa-user-alt' style='font-size:24px'></i>
			</button>
		`)
    	$.ajax({
    		url:"server.php",
    		type:"post",
    		data:{ajax:"addRequest",id:s},
    		success:function(r){
    			console.log(r)
    		}
    	})
	})
	$(document).on('click', '.btnDel', function(){
		let s = $(this).val() 
		let parent = $(this).parents('.sres')
		parent.empty()
		parent.append(`
			<button class="btnAdd" value="${ s }"> + </button>
		`)
    	$.ajax({
    		url:"server.php",
    		type:"post",
    		data:{ajax:"delRequest",id:s},
    		success:function(r){
    			console.log(r)
    		}
    	})
	})


	// LogOut
	$("#logout").click(function(){
		Swal.fire({
			title: 'Are you sure?',
			text: "You want to LogOut?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'LogOut!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url:"server.php",
					type:"post",
					data:{ajax:"logout"},
					success:function(r){
						
					}
				})
				location.replace("index.php");
			}
		})
	})


});