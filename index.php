<?php
#	inclue arquivos necessarios.
session_start();

include_once ("sql/config.php");
include_once ("sql/connection.php");
include_once ("func/function.php");

#	Se o usuario não estiver logado, redireciona para o painel.
if (isset($_SESSION['UsuarioLogado'])) {
	header('location: painel.php');
	die();
}

#	Efetua os tratamentos das variaveis recebidas.
if (isset($_POST['entrar'])){
	$conn = DBConnect();
	$email = mysqli_escape_string($conn, $_POST['email']);
	$senha = mysqli_escape_string($conn, $_POST['senha']);
#	Efetua a consulta ao banco
	$teste = DBQuery('*', "administrador", "WHERE email = '$email' AND senha = '$senha'");
#	Se existir encaminha para o painel, se não mostra erro de login.	
	if($teste){
		$_SESSION['UsuarioLogado'] = true;
		header("location: painel.php");
	} else {
		echo "<script>alert('Erro de Login')</script>";
	}
}



?>

<html>
<head>
<meta charset="utf8">
</head>
<body>

<!-- Recebe os dados do usuario -->
<div>
	<form action="" method="POST">
		<fieldset>
			<legend>Painel ADM</legend>
			<p>
				email: <input type="email" name="email" required />
			</p>
			<p>
				senha: <input type="password" name="senha" required />
			</p>
			<p>
				<input type="submit" name="entrar" value="Entrar" />
			</p>
		</fieldset>
	</form>
</div>

</body>
</html>