<?php
class login {
	
		
	function cadastrar_login_senha() {
		require('connection_data.php');

		$senha = $_POST['senha'];
		$login = $_POST['login'];
		$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
		$salt = '$2a$10' . $salt; // estrutura do salt para algoritmo blowfish: $2a$ seguido do custo (10, nesse caso) seguido de uma string de 22 caracteres do universo ./0-9A-Za-z
		$hash = crypt($senha, $salt);
		$sql = $connection->prepare('insert into USUARIOS (login,hash) values (?, ?);');
		$sql->bind_param('ss', $login, $hash);
		$resultado = $sql->execute();
		
		$connection->close();
		
		return $resultado;		
	}

	function criar_sessao($login) {
		session_start();
		$_SESSION['login'] = $login;
	}

	function destruir_sessao() {
		if (isset($_SESSION['login'])) session_destroy();
	}

	function hash_equals($str1, $str2) {
	    if(strlen($str1) != strlen($str2)) {
	      return false;
	    } else {
	      $res = $str1 ^ $str2;
	      $ret = 0;
	      for($i = strlen($res) - 1; $i >= 0; $i--) $ret |= ord($res[$i]);
	      return !$ret;
	    }
	}

	function checar_credenciais() {
		require('connection_data.php');
		
		$senha = $_POST['senha'];
		$login = $_POST['login'];
		$sql = "select hash from USUARIOS where login='$login';";
		$resultado = $connection->query($sql);
		$connection->close();
		
		if (mysqli_num_rows($resultado) == 1) {
			$obj = mysqli_fetch_object($resultado); 
			$match = $this->hash_equals($obj->hash, crypt($senha, $obj->hash));
			if ($match) {
				$this->criar_sessao($login);			
				return true;
			}
			else return false;
		}
		else return false;			

	}


}