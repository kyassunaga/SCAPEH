<?php
	include_once("verifica.php");
?>

<html>
	<head>
		<title>Quarto</title>
		<meta charset='utf-8'>
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
			<font size=6 color=white><center>Quarto Cadastrados</center></font>
		</div>
		<br>
		<br>
		<br>
		
		<?php
			$qua_numero = $_POST["qua_numero"];
			
			//conexao com o banco de dados
			$conecta = new PDO("mysql:host=localhost;dbname=scapeh", "root", "");
				
			//colsulta dados no banco
			$registro = $conecta->prepare("SELECT * FROM quarto WHERE qua_numero like ? order by qua_numero");
				
			$registro -> bindValue (1, "%" .$qua_numero. "%");

			if ($registro -> execute()){
				if ($registro -> rowCount() > 0){
					echo '
					<table border=1 cellspacing=0 cellpadding=8 align=center>
						<tr align=center bgcolor="#CCCCCC">
							<th>Quarto nº</th>
							<th>Situação</th>
						</tr>';
					while ($campo = $registro -> fetch (PDO::FETCH_OBJ)){
						echo '
						<tr  align=center>
							<td>' .$campo -> qua_numero. '</td>
							<td>' .$campo -> qua_situacao. '</td>
						</tr>';				
					}
					'</table>';
				}
				else echo "<script> alert('Quarto não encontrado!!!');window.location='formConsultaQuarto.php';</script>";
			}
		?>
		
		<font size=3>Voltar a consulta</font><br>
		<a href="formConsultaQuarto.php"><img src="img/voltar.png" width=5% height=5%></a>		
		</center>
	</body>
</html>
