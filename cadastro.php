<?php
    if(isset($_POST["btn-registro"]) == true){ 
        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
		$login = $_POST["login"];
        $email = $_POST["email"];
        $sexo = $_POST["sexo"];
		$senha = $_POST["senha"];
		$confsenha = $_POST["conf_senha"];
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db_name = "projeto";

		$conexao = mysqli_connect($servername, $username, $password, $db_name) or die (mysqli_error($conexao));
		if(mysqli_connect_error()){
   		echo "Falha na Conexão: " . mysqli_connect_error();
		}

        //TRATAR COMANDOS MAL INTENCIONADO.
        $nome = mysqli_escape_string($conexao, $nome);
        $sobrenome = mysqli_escape_string($conexao, $sobrenome);
        $login = mysqli_escape_string($conexao, $login);
        $email = mysqli_escape_string($conexao, $email);
        $sexo = mysqli_escape_string($conexao, $sexo);
        $senha = mysqli_escape_string($conexao, $senha);
        $confsenha = mysqli_escape_string($conexao, $confsenha);

		$sql = mysqli_query($conexao, "INSERT INTO usuario(id, nome, sobrenome, login, email, sexo, senha, conf_senha) VALUES (null,'$nome','$sobrenome','$login','$email','$sexo','$senha','$confsenha')") or die(mysqli_error($conexao));

		if(mysqli_affected_rows($conexao) > 0) 
		{
			$id = mysqli_insert_id($conexao);
		}

		header("location:login.php");

        //FECHAR CONEXÃO MYSQL
        mysqli_close($conexao);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastre-se</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/stylee.css">
	</head>

	<body>

		<div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/registration-form-1.jpg" alt="">
				</div>
				<form method="POST" action="#">
					<h3>Formulário de Registro</h3>
					<div class="form-group">
						<input type="text" name="nome" placeholder="Nome" class="form-control" required>
						<input type="text" name="sobrenome" placeholder="Sobrenome" class="form-control" required>
					</div>
					<div class="form-wrapper">
						<input type="text" name="login" placeholder="Nome de Login" class="form-control" required>
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="email" name="email" placeholder="Email" class="form-control">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<select name="sexo" id="sexo" class="form-control">
							<option value="" disabled selected>Gênero</option>
							<option value="M">Masculino</option>
							<option value="F">Feminino</option>
							<option value="O">Outro</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" name="senha" placeholder="Senha" class="form-control" required>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" name="conf_senha" placeholder="Confirme sua Senha" class="form-control" required>
						<i class="zmdi zmdi-lock"></i>
					</div>
					<button name="btn-registro">Registrar
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
					<br>
					<p class="message">Já Posseuí Nosso Cadastro? <a href="login.php">Clique Aqui</a></p>
					<br>
					<p class="message">Quer Voltar Para o Inicio? <a href="index.html">Clique Aqui</a></p>
				</form>
			</div>
		</div>
		
	</body>
</html>