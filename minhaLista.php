<?php
	require_once("funcoes.php");
	if(!isset($_SESSION['logado'])){
		if (!isset($_SESSION['admin'])){
			header('Location: index.php');
		}
	}
	else{
?>

		<html>
			<head>
				<meta charset="utf-8">
				<link rel="stylesheet" href="css/bootstrap.min.css">
				<link rel="stylesheet" href="css/nav.css">
				<title></title>

			</head>
			<body>
				<h2> Minha Lista de Filmes </h2>			
				<nav>
					<ul>
						<li><a href="principal.php"> Busca de Filmes </a></li>
						<li><a class="ativo" href="minhaLista.php"> Visualizar lista para assistir </a></li>
						<li><a href="jaVistos.php"> Filmes já Vistos </a></li>
					</ul>
				</nav>

				<main>
					<div class="container-fluid">
					<br>
									
						<?php
							$conexao = new mysqli('127.0.0.1', 'root', '', 'filmes_jera');
				
							$declaracao = $conexao->prepare("SELECT id_filme FROM meusfilmes WHERE codigo_perfil=?");
							$declaracao->bind_param('i', $_SESSION['codigo_login']);
							$declaracao->execute();
							
							$resultados = $declaracao->get_result();
							$resultados = $resultados->fetch_all(MYSQLI_ASSOC);
														
							if(empty($resultados)) { 
							?>
								<div class="alert alert-primary" role="alert" align="center">
									<h3> Você ainda não colocou nenhum filme em sua lista.</h3><br>
									<a href="principal.php"> <b> Buscar Filme Agora <b> </a>
								</div>	
							<?php
							} 
							else {
							?>
								<table class="table">
									<thead class="thead-dark">
										<th>Titulo Original</th>
										<th> Title </th>
										<th> Marcar Como Visto </th>
									</thead>
								
									<tbody>	
							<?php
									
									foreach($resultados as $lista){
										$filme = buscarId($lista['id_filme']);
							?>	
										<tr> 
											<td id="duracao"><?=$filme['original_title'];?></td>
											<td id="nome"> <?=$filme['title'];?></td>
											<td><a href="comoVisto.php?codigo=<?=$filme['id']?>"> Marcar como Visto </a></td>
										</tr>
								<?php			
									}
								?>				
									</tbody>
								</table>
						<?php			
							}
						?>
					</div>
				</main>

			</body>
			<script src="js/jquery-3.4.1.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
		</html>
<?php
	}
?>
