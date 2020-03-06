<?php 
	session_start();
	if(isset($_GET['codigo'])){
		$idFilmes = $_GET['codigo'];
		
		$conexao = new mysqli('127.0.0.1', 'root', '', 'filmes_jera');
		
		$declaracao = $conexao->prepare("INSERT INTO jaVistos (codigo_perfil, id_filme) VALUES (?,?)");
		$declaracao->bind_param('ii', $_SESSION['codigo_login'], $idFilmes);
		$declaracao->execute();
		
		$declaracao = $conexao->prepare("DELETE FROM meusfilmes WHERE codigo_perfil = ? AND id_filme = ?");
		$declaracao->bind_param('ii', $_SESSION['codigo_login'], $idFilmes);
		$declaracao->execute();
		
		header('Location: minhaLista.php');
	}
?>