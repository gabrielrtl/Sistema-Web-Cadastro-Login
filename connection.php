<?php
	#Funções de coneção com o banco

	#	Conecta ao banco
	function DBConnect(){
		$sql = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE) or die (mysqli_error());
		mysqli_set_charset($sql, CHARSET) or die (mysqli_error($sql));
		
		return $sql;
	}
	
	#	Fecha a coneção com o banco
	function DBClose($sql){
		@mysqli_close($sql) or die (mysqli_error($sql));
	}
?>