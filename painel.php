<?php
#	inclue arquivos necessarios.
session_start();

include_once ("config.php");
include_once ("connection.php");
include_once ("function.php");

#	Se o usuario não estiver logado, encaminha pra pagina de login e destroi a sessão
if (!isset($_SESSION['UsuarioLogado'])) {
	header('location: index.php');
	session_destroy();
}

#	Configuração do butão sair
if (isset($_GET['deslogar'])){
	session_destroy();
	header('location: index.php');
}

?>

<html>
<head></head>
<body>
    <h1>Painel para membros</h1>
    <a href="?deslogar"><button type="button">Sair</button></a>
</body>
</html>
