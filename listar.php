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

#       conecta e consulta os membros no banco
$conn = DBConnect();
$dado = DBQuery("*","membro","")

?> 

<!DOCTYPE html> 
  <html> 
    <head> 
      <meta charset="UTF-8"> 
      <title>membros</title> 
    </head> 
    <body> 
      <table border="1">
          <!-- Lista os dados dos membros -->
        <tr> 
          <td>Código</td> 
          <td>E-mail</td> 
          <td>Senha</td> 
          <td>CPF</td>
          <td>Apelido</td>
          <td>Nome Completo</td>
          <td>Nascimento</td>
          <td>Localização</td>
          <td>Telefone</td>
          <td>Observação</td> 
        </tr>
        <?php while ($dados = $dado->fetch_array()) { ?> 
        <tr> 
          <td><?php echo $dados['id']; ?></td>
          <td><?php echo $dados['email']; ?></td>
          <td><?php echo $dados['senha']; ?></td>
          <td><?php echo $dados['cpf']; ?></td>
          <td><?php echo $dados['apelido']; ?></td>
          <td><?php echo $dados['nome_compl']; ?></td>
          <td><?php echo $dados['data_nasci']; ?></td>
          <td><?php echo $dados['localizacao']; ?></td>
          <td><?php echo $dados['telefone']; ?></td>
          <td><?php echo $dados['obs']; ?></td>
          <!-- seleciona um registro para excluir ou editar -->
          <td>
              <a href="editUser.php?edit=<?php echo $dados['id']; ?>">Editar</a> 
              <a href="?dell=<?php echo $dados['id']; ?>">Excluir</a> 
          </td> 
        </tr>
        <?php } ?> 
      </table> 
        <a href="index.php"><button type="button"> Voltar </button><a/>
    </body>
    
        <?php 
#        Deleta o registro selecionado
        if (isset($_GET['dell'])) {
        $d = $_GET['dell'];
        $ex = DBDellReg('membro', $d);
    
            if ($ex == true) {
                header("Refresh:0; url=listar.php");
            } else {
                    echo "<script>alert('Erro de Login')</script>";
                    }
        }
        ?>
</html>

