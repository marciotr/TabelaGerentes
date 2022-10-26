<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title> CRUD - PHP com mysqli </title>
	</head>
	<body>
		<h3>CRUD - PHP com mysqli - Inclusão</h3>
		<form name="gerente" action="incluir.php" method="post" enctype="multipart/form-data">
			<b>Nome:</b> <input type="text"  name="nome" required="required"> <br><br>
			<b>Data: </b> <input type="date" name="data_nasc" required="required"> <br><br>
			<b>Endereço:</b> <input type="text" name="endereco" maxlength='80' style="width:550px" required="required"> <br><br>
			<b>Departamento: </b> <input type="text" name="depto" maxlength='30' required="required"> <br><br> 
			<b>imagem: </b> <input type="file" name="imagem"> <br><br>
			<input type="submit" value="Ok">
			<input type="reset" value="Limpar">
			<input type="button" onclick="window.location='index.php';" value="Voltar">
		</form>
	</body>
</html>