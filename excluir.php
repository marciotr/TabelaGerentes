<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title> CRUD - PHP com mysqli </title>
	</head>
	<body>
		<h3>CRUD - PHP com mysqli - Exclusão - Consulta do Produto</h3>
		<?php
			include_once('conexao.php');
			// recuperando 
			$id = $_POST['id'];


			$sqldelete =  "delete from gerente where id = '$id' ";
			$deleta = unlink('imagens/'.$imagem->imagem);
		
			// executando instrução SQL
			$resultado = @mysqli_query($conexao, $sqldelete);
			if (!$resultado) 
			{
				echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
				die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
			} 
			else 
			{
				$query = mysqli_query($conexao, "SELECT imagem FROM gerente WHERE id = $id")
				echo "Registro Excluído com Sucesso";
			} 
			mysqli_close($conexao);
		?>
		<br><br>
		<input type='button' onclick="window.location='exclusao.php';" value="Voltar">
	</body>
</html>
