<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title> CRUD - PHP com mysqli </title>
	</head>
		<body>
		<h3>TABELA - GERENTES - Consulta Geral - Datelhes do funcionário</h3>
		<?php

			function convertedata($data){
				$data_vetor = explode('-', $data);
				$novadata = implode('/', array_reverse ($data_vetor));
				return $novadata;
			}

			include_once('conexao.php');
			// recuperando a informação da URL
			// verifica se parâmetro está correto e dento da normalidade 
			if(isset($_GET['id']) && is_numeric(base64_decode($_GET['id'])))
			{
					$id = base64_decode($_GET['id']);
			} 
			else 
			{
				header('Location: index.php');
			}
			// realizando a pesquisa com o id recebido
			$resultado = mysqli_query($conexao,"select * from gerente where id = $id");

			if (!$resultado) 
			{
				echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
				die('<b>resultado Inválida:</b>' . @mysqli_error($conexao)); 
			}

			$dados=mysqli_fetch_array($resultado);
			
			echo "<table boreder='1px'><tr><td width='250px'>";
			if (empty($dados['imagem'])){
					$imagem = 'SemImagem.png';
				}else{
					$imagem = $dados['imagem'];
				}
			echo "<img src='imagens/$imagem' >";
			echo "</td><td width='250px'>";
			echo "<b>Id: </b >".$dados['id']."<br>";
			echo "<b>Nome: </b>".$dados['nome']."<br>";
			echo "<b>Endereço: </b>".$dados['endereco']."<br>";	
			echo "<b>Departamento: </b>".$dados['depto']."<br>";	
			echo "<b>Data de nascimento: </b>  ".$dados['data_nasc']."<br>";
			echo "</td></tr></table>";
			
			mysqli_close($conexao);
		?>
		<br>
		<input type='button' onclick="window.location='geral.php';" value="Voltar">
	</body>
</html>
