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
        $cpfc = mysqli_escape_string($conn, $_POST['cpfc']);
        $apelidoc = mysqli_escape_string($conn, $_POST['apelidoc']);
        $nome_complc = mysqli_escape_string($conn, $_POST['nome_complc']);
        $data_nascic = mysqli_escape_string($conn, $_POST['data_nascic']);
        $localizacaoc = mysqli_escape_string($conn, $_POST['localizacaoc']);
        $telefonec = mysqli_escape_string($conn, $_POST['telefonec']);
        $obsc = mysqli_escape_string($conn, $_POST['obsc']);

#       Efetua o cadastro
    $cadast = DBCad('membro',"email,senha,cpf,apelido,nome_compl,data_nasci,localizacao,telefone,obs","'$emailc','$senhac','$cpfc','$apelidoc','$nome_complc','$data_nascic','$localizacaoc','$telefonec','$obsc'");
    if($cadast == true){
        echo "<script>alert('Cadastrado')</script>";
	} else {
	echo "<script>alert('Erro de Cadastro')</script>";
    }
    
}
?>

<html>
<head>
</head>
<body>
    <h1>cadastrar</h1>
    <form action="" method="POST">
        <fieldset>
            
            <p>
                email: <input type="text" name="emailc"/>
            </p>
            <p>
                senha: <input type="text" name="senhac"/>
            </p>
            <p>
                cpf: <input type="text" name="cpfc"/>
            </p>
            <p>
                apelido: <input type="text" name="apelidoc" required/>
            </p>
            <p>
                nome completo: <input type="text" name="nome_complc"/>
            </p>
            <p>
                Data Nascimento: <input type="text" name="data_nascic"/>
            </p>
            <p>
                Localização: <input type="text" name="localizacaoc"/>
            </p>
            <p>
                Telefone: <input type="text" name="telefonec"/>
            </p>
            <p>
                obs: <input type="text" name="obsc"/>
            </p>
            
            <p>
            <input type="submit" name="enviar"/>
        
            <a href="index.php"><button type="button"> Voltar </button><a/>
            </p>
            
        </fieldset>
        
    </form>
</body>
</html>