function toggle(element){
	if (element.style.display !== "none")
		element.style.display = "none";
	else element.style.display = "block";
}


document.addEventListener("DOMContentLoaded", function(){

	var modal = document.getElementsByClassName("modal")[0];
	var modalLogin = document.getElementById("modal-login");
	var mobileMenu = document.getElementById("btn-menu-toggle");
	var anchorLogin = document.getElementById("anchor-login");
	var btnLogin = document.getElementById("btn-submit-login");
		
	// toggles mobile menu
	mobileMenu.addEventListener("click", function(){
		toggle(document.getElementsByTagName("aside")[0]);
	});
	// handles login request
	anchorLogin.addEventListener("click", function(){
		modalLogin.style.display = "block";    	
		btnLogin.addEventListener("click", function(){
			var login = $("#login").val();
			var senha = $("#senha").val();
	
			$.ajax({method: "POST", url: "/login.php", data: {login: login, senha: senha},
				success: function(resultado){
					// $("#mensagem-login").html(resultado);
					if (resultado)
						$("#mensagem-login").html("Logado!");
						// modal.style.display = "none";
					else {
						$("#mensagem-login").html("Login ou senha não conferem.");
					}
				} ,
				error: function(){
					$("#mensagem-login").html("Ocorreu um erro e a ação não pôde ser concluída.");
				}
			});
		});
	});
	// closes modal when clicking on button
	document.getElementsByClassName("close")[0].addEventListener("click", function(){
		modal.style.display = "none";
	});
	// closes modal when clicking outside 
	window.addEventListener("click",function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
	});

});