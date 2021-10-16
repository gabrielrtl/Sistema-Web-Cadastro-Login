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

#       Conecta e edita os registros selecionados
$conn = DBConnect();
if (isset($_GET['edit'])) {
    $iduseredit = $_GET['edit'];
    $consult = DBQuery("*","membro","WHERE id='$iduseredit'");
}



?>

<html>
<head>
</head>
<body>
    <h1>Editar usuario</h1>
    <form action="" method="POST">
        <fieldset>
            <?php while ($dadosesp = $consult->fetch_array()) { ?>
            <p>
                email: <input value="<?php echo $dadosesp['email']?>" type="text" name="emaile"/>
            </p>
            <p>
                senha: <input value="<?php echo $dadosesp['senha']?>" type="text" name="senhae"/>
            </p>
            <p>
                cpf: <input value="<?php echo $dadosesp['cpf']?>" type="text" name="cpfe"/>
            </p>
            <p>
                apelido: <input value="<?php echo $dadosesp['apelido']?>" type="text" name="apelidoe" required/>
            </p>
            <p>
                nome completo: <input value="<?php echo $dadosesp['nome_compl']?>" type="text" name="nome_comple"/>
            </p>
            <p>
                Data Nascimento: <input value="<?php echo $dadosesp['data_nasci']?>" type="text" name="data_nascie"/>
            </p>
            <p>
                Localização: <input value="<?php echo $dadosesp['localizacao']?>" type="text" name="localizacaoe"/>
            </p>
            <p>
                Telefone: <input value="<?php echo $dadosesp['telefone']?>" type="text" name="telefonee"/>
            </p>
            <p>
                obs: <input value="<?php echo $dadosesp['obs']?>" type="text" name="obse"/>
            </p>
            
            <p>
            <input type="submit" name="enviar"/>
            <?php } ?> 
            
            
            <a href="index.php"><button type="button"> Voltar </button><a/>
            </p>
            
        </fieldset>
        
    </form>
</body>
</html>

<?php
#       Recebe os dados e prepara para alteração
if (isset($_POST['enviar'])){
	$emaile = mysqli_escape_string($conn, $_POST['emaile']);
	$senhae = mysqli_escape_string($conn, $_POST['senhae']);
        $cpfe = mysqli_escape_string($conn, $_POST['cpfe']);
        $apelidoe = mysqli_escape_string($conn, $_POST['apelidoe']);
        $nome_comple = mysqli_escape_string($conn, $_POST['nome_comple']);
        $data_nascie = mysqli_escape_string($conn, $_POST['data_nascie']);
        $localizacaoe = mysqli_escape_string($conn, $_POST['localizacaoe']);
        $telefonee = mysqli_escape_string($conn, $_POST['telefonee']);
        $obse = mysqli_escape_string($conn, $_POST['obse']);

#       Efetua a alteração no banco
    $cadast = DBUpdMembro('membro',"email = '$emaile',senha = '$senhae',cpf = '$cpfe',apelido = '$apelidoe',nome_compl = '$nome_comple',data_nasci = '$data_nascie',localizacao = '$localizacaoe',telefone = '$telefonee',obs = '$obse'","'$iduseredit'");
    header("Refresh:0; url=listar.php");
}

?>

