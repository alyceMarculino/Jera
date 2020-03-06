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
				<script src="js/buscarFilmes.js"></script>
				<title></title>
			</head>
			<body>
				<h2> Filmes </h2>
				<nav>
					<ul>
						<li><a class="ativo" href="principal.php"> Busca de Filmes </a></li>
						<li><a href="minhaLista.php"> Visualizar lista para assistir </a></li>
						<li><a href="jaVistos.php"> Filmes já Vistos </a></li>
					</ul>
				</nav>

				<main>
					<div class="container-fluid">
						<br>
					<form class="" action="#" method="POST">
						<div class="row">
							<div class="col-md-8">
								<input type="text" class="form-control" id="nomeFilme" name="nomeFilme" placeholder="Digite aqui o nome do filme que deseja buscar">
								</select>
							</div>
							<div class="col">
								<button type="submit" class="btn btn-info btn-block" onclick=""> Buscar Filme </button>
							</div>
						</div>
					</form>
					<?php
						if(!empty($_POST['nomeFilme'])){
					?>
							<table class="table">
								<thead class="thead-dark">
									<th>Titulo Original</th>
									<th> Title </th>
									<th> Colocar na Minha Lista </th>
								</thead>
							<br>
						<?php
							$query = $_POST['nomeFilme'];
							$query = str_replace(' ', '+', $query);
							$filmes = buscarFilmes($query);
						?>	
							<tbody>
							<?php
								foreach($filmes['results'] as $filme){
							?>
									<td id="duracao"><?=$filme['original_title'];?></td>
									<td id="nome"> <?=$filme['title'];?></td>
									<td><a href="inserirNaLista.php?codigo=<?=$filme['id']?>"> Colocar Este Filme </a></td>
							
							</tbody>
							<?php
								}
							?>
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