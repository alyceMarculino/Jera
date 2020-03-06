<?php
	if(isset($_POST['logar'])){
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		
		$conexao = new mysqli('127.0.0.1', 'root', '', 'filmes_jera');
		
		$declaracao = $conexao->prepare('SELECT lo.senha senha, lo.nome nome, lo.email email, lo.codigo codigo FROM login lo WHERE email = ?');	
		$declaracao->bind_param('s', $email);
		$declaracao->execute();
		$resultado = $declaracao->get_result();
		$resultados = $resultado->fetch_all(MYSQLI_ASSOC);
		
		foreach($resultados as $resultado){
			session_start();
			$senhaComparar= $resultado['senha'];
			
			if($senha == $senhaComparar){
				$_SESSION['logado'] = true;
				$_SESSION['nomeUsuario'] = $resultado['nome'];
				$_SESSION['emailUsuario'] = $resultado['email'];
				$_SESSION['codigo_login'] = $resultado['codigo'];
				header('Location: principal.php');
			}
			else {
				header('Location: erroDeLogin.php');
			}
		}
	}
?>
