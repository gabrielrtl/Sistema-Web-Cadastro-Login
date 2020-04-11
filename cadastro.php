<?php
#	inclue arquivos necessarios.
session_start();

include_once ("config.php");
include_once ("connection.php");
include_once ("function.php");

#	Efetua os tratamentos das variaveis recebidas.
if (isset($_POST['enviar'])){
	$conn = DBConnect();
	$emailc = mysqli_escape_string($conn, $_POST['emailc']);
	$senhac = mysqli_escape_string($conn, $_POST['senhac']);

#   Efetua o cadastro
    $cadast = DBCad('usuario',"'$emailc','$senhac'");

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
            </p>
        </fieldset>
    </form>
</body>
</html>