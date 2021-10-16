<?php
#	inclue arquivos necessarios.
session_start();

include_once ("sql/config.php");
include_once ("sql/connection.php");
include_once ("func/function.php");

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

<!--	Menu painel admin -->
<html>
<head></head>
<body>
    <center>
    <h1>Painel Admin</h1>
        <div>
            <ul>
                <li><a href="listar.php">LISTAR Usuarios</a></li>
                <li><a href="cadUser.php">CADASTRAR Usuarios</a></li>
                <li><a href="cadastro.php">Cadastrar Admin</a></li>
                <li><a href="?deslogar"><button type="button">Sair</button></a></li>
            </ul>
        </div>
    </center>
</body>
</html>
