<html>
	<head>
		<title>SCAPEH - Alto do Morro</title>
		<meta charset='utf-8'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="styles.css">
		
		<style type="text/css">
			div.titulo{
				background-color:#363738;
				font-family: Times, Times New Roman, serif;
				width:100%;
				height:40px;
				top:120px;
				left:0px;
				position:absolute;
				visibility:visible;
			}
		</style>
	</head>

	<body>
		<center><img src="imagens/LogoNovol.png" width=15% height=15%></center><br>
		<center>
		<div id="titulo" class="titulo">
			<font size=6 color=white>Tela de Login</font>
		</div>
		<br>
		<br>
		<br>
		<form name="dados" method="POST" action="logar.php">
			<font color="363738"><b>Usuário:<br></font>
				<input type="text" name="fun_user" id="fun_user" size="20" value=""><br><br>
			<font color="363738"><b>Senha:<br></font>
				<input type="password" id="fun_senha" name="fun_senha" size="20" value=""><br><br>
				<input type="submit" value="Entrar">
		</form>
		</center>
	</body>
</html>
