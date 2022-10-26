<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title> CRUD - PHP com mysqli </title>
	</head>
	<body>
		<h3>CRUD - PHP com mysqli - Consulta</h3>
		<?php
			include_once('conexao.php');
			// recuperando 
			$id = $_POST['id'];

			// criando a linha do  SELECT
			$sqlconsulta =  "select * from gerente where id = $id";
			
			// executando instrução SQL
			$resultado = @mysqli_query($conexao, $sqlconsulta);
			if (!$resultado) {
				echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
				die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
			} 
			else 
			{
				$num = @mysqli_num_rows($resultado);
				if ($num==0)
				{
					echo "<b>ID: </b>não localizado !!!!<br><br>";
					echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
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
		<form name="gerente" action="excluir.php" method="post" enctype="multipart/form-data">
			<b>Nome:</b> <input type="text" name="nome" value="<?php echo $dados['nome']; ?>" readonly > <br><br>
			<b>Data: </b> <input type="datetime" value="<?php echo $dados['data_nasc']; ?>" readonly > <br><br>
			<b>Endereço:</b> <input type="text"  maxlength='80' style="width:550px" value="<?php echo $dados['endereco']; ?>" readonly > <br><br>
			<b>Departamento: </b> <input type="text" name="depto" maxlength='30' value="<?php echo $dados['depto']; ?>" readonly > <br><br>
		<input type='button' onclick="window.location='index.php';" value="Voltar">
		</form>
	</body>
</html>
