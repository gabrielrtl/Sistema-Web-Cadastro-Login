<?php
	#Funções principais do sistema

	#	Função de consulta no banco de dados
	function DBQuery($tabela, $parametro = null, $colunas = "*"){
		$parametro = ($parametro) ? " {$parametro}": null;
		$colunas = ($colunas) ? " {$colunas}": "*";
		$sql = "SELECT {$colunas} FROM {$tabela}{$parametro}";
		
		$resultado = DBExecute($sql);
		
		if (!mysqli_num_rows($resultado)){
			return false;
		} else {
			while ($res = mysqli_fetch_assoc($resultado)){
				$dados[] = $res;
			}
			return $dados;
		}
	}
	
	#	Função de cadastro no banco de dados
	function DBCad($tabela, $parametro){
		$tabela = ($tabela) ? " {$tabela}": null;
		$parametro = ($parametro) ? " {$parametro}": null;
		
		$sql = "INSERT INTO {$tabela} (`email`, `senha`) VALUES ({$parametro});";
		$resultado = DBExecute($sql);
		return $resultado;
	}
	
	#	Função de execução de comandos SQL
	function DBExecute($sql){
	$conn = DBConnect();
	
	$resultado = @mysqli_query($conn, $sql) or die (mysqli_error($conn));
	DBClose($conn);
	
	return $resultado;
	}
?>