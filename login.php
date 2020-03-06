<html>

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/loginAdmin.css">
		<title> </title>
	</head>
	<body>
		<form action="loginProcessa.php" class ="form-signin" method="POST">
			<br>
			<p> <b> Login </b></p>
			
			<div class="form-label-group">
				<input type="text" class="form-control" placeholder="Email" name="email"></input> 
				<br>
				<input type="password" class="form-control" placeholder="Senha" name="senha"></input>
			</div>
			<br>
			
			<button class="btn btn-info" type="submit" name="logar"> Entrar </button>
			
			<p class = "mt-5 mb-3 text muted text-center"> © Alyce Marculino </p>
		</form>
		
	</body>
	
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</html>