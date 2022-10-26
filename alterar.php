<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title> CRUD - PHP com mysqli </title>
	</head>
	<body>
		<h3>CRUD - PHP com mysqli - Alteração</h3>
		<?php
			include_once("conexao.php");
			// recuperando
			$id = $_POST['id'];
			$nome = $_POST['nome'];
			$endereco = $_POST['endereco'];
			$data_nasc = $_POST['data_nasc'];
			$depto = $_POST['depto'];
			$imagem = $_FILES['imagem'];


			$target_dir = "imagens/";
			$target_file = $target_dir . basename($_FILES["imagem"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) 
			{
				$check = getimagesize($_FILES["imagem"]["tmp_name"]);
				if($check !== false) {
					echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} 
				else 
				{
					echo "File is not an image.";
					$uploadOk = 0;
				}
			}

			// Check file size
			if ($_FILES["imagem"]["size"] > 30000000) 
			{
				echo "<h3>Sorry, your file is too large.</h3>";
				$uploadOk = 0;
			}

			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) 
			{
				echo "<h3>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</h3>";
				$uploadOk = 0;
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) 
			{
				$sqlupdate =  "update gerente set nome='$nome',data_nasc='$data_nasc',endereco='$endereco',depto='$depto' where id=$id";
				echo "<h3>your file was not uploaded.</h3>";

			}
			else 
			{
				if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) 
				{
					echo "The file ". htmlspecialchars( basename( $_FILES["imagem"]["name"])). " has been uploaded.";
					$imagem = basename($_FILES["imagem"]["name"]);
					$sqlupdate =  "update gerente set nome='$nome',data_nasc='$data_nasc',endereco='$endereco',depto='$depto',imagem='$imagem' where id=$id";
				} 
				 else 
				{
					echo "Sorry, there was an error uploading your file.";
				}
			}

			// executando instrução SQL
			$resultado = @mysqli_query($conexao, $sqlupdate);
			if (!$resultado) {
				echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
				die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
			} else {
				echo "<h3>Registro Alterado com Sucesso</h3>";
			} 
			mysqli_close($conexao);
		?>
		<br><br>
		<input type='button' onclick="window.location='alteracao.php';" value="Voltar">
	</body>
</html>
