<?php
#	inclue arquivos necessarios.
session_start();

include_once ("sql/config.php");
include_once ("sql/connection.php");
include_once ("func/function.php");

#	Se o usuario não estiver logado, redireciona para o painel.
if (!isset($_SESSION['UsuarioLogado'])) {
	header('location: index.php');
	session_destroy();
}

#	Efetua os tratamentos das variaveis recebidas.
if (isset($_POST['enviar'])){
	$conn = DBConnect();
	$emailc = mysqli_escape_string($conn, $_POST['emailc']);
	$senhac = mysqli_escape_string($conn, $_POST['senhac']);

#   Efetua o cadastro
    $cadast = DBCad('administrador',"email,senha","'$emailc','$senhac'");

#   Se cadastrado encaminha para a pagina de login, se não alerta de erro.
    if($cadast = true){
        echo "<script>alert('Cadastrado')</script>";
        header("location: index.php");
	} else {
		echo "<script>alert('Erro de Login')</script>";
    }
    
}
?>
<!-- Recebe os dados do usuario -->
<html>
<head>
</head>
<body>
    <h1>cadastrar</h1>
    <form action="" method="POST">
        <fieldset>
            <p>
            email: <input type="email" name="emailc" required/>
            </p>
            <p>
            senha: <input type="password" name="senhac" required/>
            </p>
            <p>
            <input type="submit" name="enviar"/>
            
            <a href="index.php"><button type="button"> Voltar </button><a/>
            </p>
        </fieldset>
    </form>
</body>
</html>