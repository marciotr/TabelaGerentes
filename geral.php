<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title> CRUD - PHP com mysqli </title>
	</head>
	<body>
		<h3>TABELA - GERENTES - Consulta Geral</h3>
		<input type='button' onclick="window.location='index.php';" value="Voltar">
		<p></p>

		<?php
			include_once('conexao.php');
			
			// ajustando a instrução select para ordenar por id
			$query = mysqli_query($conexao,"select * from gerente order by id");

			if (!$query) {
				echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
				die('<b>Query Inválida:</b>' . @mysqli_error($conexao));  
			}

			echo "<table border='1px'>";
			echo "<tr>	
					<th width='30px' align='center'>ID</th> 
					<th width='100px'>Nome</th>
					<th width='100px'>Data</th>
					<th width='250px'>Endereço</th>
					<th width='100px'>Departamento</th>
					<th width='30px'>imagem</th> 
				  <tr>";

			while($dados=mysqli_fetch_array($query)) 
			{
				echo "<tr>";
				echo "<td align='center'>". $dados['id']."</td>";
				echo "<td>". $dados['nome']."</td>";
				echo "<td>". $dados['data_nasc']."</td>";
				echo "<td>". $dados['endereco']."</td>";
				echo "<td>". $dados['depto']."</td>";
				
				// buscando na pasta imagem
				if (empty($dados['imagem']))
				{
					$imagem = 'SemImagem.png';
				}
				else
				{
					$imagem = $dados['imagem'];
				}
				$id = base64_encode($dados['id']);
				echo "<td align='center'><a href='verproduto.php?id=$id'><img src='imagens/$imagem' width='50px' heigth='50px'></a>";
				echo "</tr>";
			}
			echo "</table>";
			
			mysqli_close($conexao);
		?>
		<br>
	</body>
</html>
