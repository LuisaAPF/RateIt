
document.addEventListener("DOMContentLoaded", function(){

	var modal = document.getElementsByClassName("modal")[0];
	var mobileMenu = document.getElementById("btn-menu-toggle");
	var btnLogin = document.getElementById("btn-submit-login");

	$.ajax({url:"/session.php",
		success: function(resultado) {
			if (resultado == "logged out") {
				if ($("#btn-menu-toggle").css("display") == "none") {
					$(".nav-loggedout").css("display", "inline-block");
					$(".nav-loggedin").css("display", "none");	
				}
				else {
					$(".aside-loggedout").css("display", "block");
					$(".aside-loggedin").css("display", "none");	
				}				
				
			}
			else if (resultado == "logged in") {
				if ($("#btn-menu-toggle").css("display") == "none") {
					$(".nav-loggedout").css("display", "none");
					$(".nav-loggedin").css("display", "inline-block");	
				}
				else {
					$(".aside-loggedout").css("display", "none");
					$(".aside-loggedin").css("display", "block");	
				}
			}
		}
	});
		
	// toggles mobile menu
	mobileMenu.addEventListener("click", function(){
		$("aside").toggle();
	});
	// opens login modal
	$("#nav-login").click( function(){
		$("#modal-login").css("display", "block");    	
	});
	$("#aside-login").click( function(){
		$("#modal-login").css("display", "block");   
		$("aside").css("display", "none"); 	
	});	
	// handles login request
	btnLogin.addEventListener("click", function(){
		var login = $("#login").val();
		var senha = $("#senha").val();

		$.ajax({method: "POST", url: "/login.php", data: {login: login, senha: senha},
			success: function(resultado){
				resultado = resultado.replace(/\s/g,'');
				if (resultado == 'success') {
					$("#modal-login").css("display", "none"); 
					if ($("#btn-menu-toggle").css("display") == "none") {
						$(".nav-menu").toggle();
					}
					else {
						$(".aside-loggedin").toggle();
						$(".aside-loggedout").toggle();
					}
				window.location.replace('./index.php');
				}
				else if (resultado == 'error') {
					$("#mensagem-login").html("Wrong password or login");
				}
			} ,
			error: function(){
				$("#mensagem-login").html("Error in the request");
			}
		});
	});
	//handles logout request
	$("#nav-logout").click(function() {	
		$.ajax({url: "/logout.php",
			success: function() {
				$(".nav-menu").toggle();
				window.location.replace('./index.php');
			},
			error: function() {
				alert("Error. Unable to logout.");
		}});
	});
	$("#aside-logout").click(function() {	
		$("aside").css("display", "none");
		$.ajax({url: "./logout.php",
			success: function() {
				$(".aside-loggedin").toggle();
				$(".aside-loggedout").toggle();
				window.location.replace('./index.php');
			},
			error: function() {
				alert("Error. Unable to logout.");
		}});
	});
	// removes product by id
	$('.delete-product').click(function(event) {
		$.ajax({method: "GET", url: "/remove_product.php/", 
			data: {id: event.currentTarget.getAttribute('id')},
			success: function(resultado) {
				resultado = resultado.replace(/\s/,'');
				window.scrollTo(0,0);
				$('#message-delete_product').html(resultado);
			},
			error: function() {
				$('#message-delete_product').html("Error in the request.");
			}
		});
	})
	// closes modal when clicking on button
	$(".close").click(function() {
		$(".modal").css("display",  "none");
	});
	// document.getElementsByClassName("close").addEventListener("click", function(){
	// 	modal.style.display = "none";
	// });
	// closes modal when clicking outside 
	window.addEventListener("click",function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
	});

});