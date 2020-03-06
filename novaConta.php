<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/nav.css">
		<title></title>
	</head>
	<body>
		<main>
		<br>
			<div class="container-fluid">
				<h3> Informe os dados abaixo para relizar seu Cadastro </h3>
				<form action="#" method="POST">
					<div class="form-row">
						<div class="col-md-8">
							<label for="nome">Nome </label>
							<input type="text" class="form-control" placeholder="Nome Completo" name="nome">
						</div>
						<div class="col">
							<label for="dataNascimento">Data de Nascimento</label>
							<input type="date" class="form-control" placeholder="Data de Nascimento" name="nascimento">
						</div>
					</div>
					<br>
					<div class="form-row">
						<div class="col-md-8">
							<label for="email">Email </label>
							<input type="email" class="form-control" placeholder="Email" name="email">
						</div>
						<div class="col">
							<label for="senha"> Senha </label>
							<input type="password" class="form-control" placeholder="Senha" name="senha">
						</div>
					</div>		
					<br>
					<div class="form-row">
						<div class="col">
							<button type="submit" class="btn btn-outline-info btn-block"  name="adicionar" value="adicionar"> Adicionar Novo Cadastro </button>
						</div>
					</div>	
				</form>
			</div>
		</main>
		<?php 
			if(isset($_POST['adicionar'])){
				$nome = $_POST['nome'];
				$data = $_POST['nascimento'];
				$email = $_POST['email'];
				$senha = $_POST['senha'];
				
				$conexao = new mysqli('127.0.0.1', 'root', '', 'filmes_jera');
				
				$declaracao = $conexao->prepare("INSERT INTO login (nome, data_nascimento, email, senha) VALUES (?,?,?,?)");
				$declaracao->bind_param('ssss', $nome, $data, $email, $senha);
				$declaracao->execute();
				
				header('Location: login.php');
			}
		?>
	</body>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</html>
