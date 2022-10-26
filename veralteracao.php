<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title> CRUD - PHP com mysqli </title>
	</head>
	<body>
		<h3>CRUD - PHP com mysqli - Alteração</h3>
		<?php
			include_once('conexao.php');
			// recuperando 
			$id = $_POST['id'];

			// criando a linha do  SELECT
			$sqlconsulta =  "select * from gerente where id = $id";
			
			// executando instrução SQL
			$resultado = @mysqli_query($conexao, $sqlconsulta);
			if (!$resultado) 
			{
				echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
				die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
			} 
			else 
			{
				$num = @mysqli_num_rows($resultado);
				if ($num==0)
				{
					echo "<b>id: </b>não localizado !!!!<br><br>";
					echo '<input type="button" onclick="window.location='."'alteracao.php'".';" value="Voltar"><br><br>';
					exit;
				}
				else
				{
					$dados=mysqli_fetch_array($resultado);
					if (empty($dados['imagem']))
					{
						$imagem = 'SemImagem.png';
					}
					else
					{
						$imagem = $dados['imagem'];
					}
					echo "<img src='imagens/$imagem' width='200px' heigth='200px'> <br><br>";
				}
			} 
			mysqli_close($conexao);
		?>
		<form name="gerente" action="alterar.php" method="post" enctype="multipart/form-data">
			<b>ID:</b> <input type="number" name="id" value='<?php echo $dados['id']; ?>' readonly> <br><br>
			<b>Nome:</b> <input type="text" name="nome" maxlength='80' style="width:550px" value='<?php echo $dados['nome']; ?>'> <br><br>
			<b>Data: </b> <input type="datetime" name="data_nasc" value='<?php echo $dados['data_nasc']; ?>'> <br><br>
			<b>Endereço: </b> <input type="text" name="endereco" maxlength='120' style="width:700px"  value='<?php echo $dados['endereco']; ?>'> <br><br>
			<b>Departamento: </b> <input type="text" name="depto" maxlength='30' value='<?php echo $dados['depto']; ?>'> <br><br>
			<b>imagem: </b> <input type="file" name="imagem"> <br><br>
			<input type="submit" value="Ok">&nbsp;&nbsp;
			<input type="reset" value="Limpar">
			<input type='button' onclick="window.location='alteracao.php';" value="Voltar">
		</form>
	</body>
</html>
