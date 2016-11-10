<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require('header.html');
require('class_login.php');

if (isset($_POST) and $_POST != []) {
	$usuario = new login();
	$login_existe = $usuario->checar_login_existe($_POST['login']);

	if ($login_existe) {
		echo '<div class="container"><div class="alert-error">Login already being used. Please, choose another one.</div></div>';
	} 
	else {
		$resultado = $usuario->cadastrar_login_senha();
		if ($resultado) {
			echo '<div class="container"><div class="alert-success">Account created successfully!</div></div>';	
		}
		else {
			echo '<div class="container"><div class="alert-error">Error. Could not create account.</div></div>';
		}
	}
	unset($_POST);
	$_POST = [];
}
?>
<div class="container">
	<form method="POST" action="">	
		<div class="col-9">
			<div class="row">
				<div>
					<input id="login-cadastro" name="login" placeholder=" Login" class="input-lg" required>
				</div>
			</div>
			<div class="row">
					<input id="senha-cadastro" name="senha" type="password" placeholder=" Password" class="input-lg" required>
			</div>
			<div class="row">
				<button id="btn-submit-cadastro" type="submit" class="btn-lg btn-green right">Create</button>
			</div>
		</div>
	</form>
</div>

<?php			
require('footer.html');
?>