<?php
	include_once("verifica.php");
?>

<html>
	<head>
		<title>Telefone</title>
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
			<font size=6 color=white><center>Lista Telefônica</center></font>
		</div>
		<br>
		<br>
		<br>
		
		<?php
			$cli_nome = $_POST["cli_nome"];
			
			//conexao com o banco de dados
			$conecta = new PDO("mysql:host=localhost;dbname=scapeh", "root", "");
				
			//colsulta dados no banco
			$registro = $conecta->prepare("
			SELECT 	t.tel_numero,
					t.tel_descricao,
					c.cli_nome
				FROM 	telefone t,
						cliente c
				WHERE c.cli_cod = t.cli_cod and c.cli_nome like ? order by cli_nome");
				
			$registro -> bindValue (1, "%" .$cli_nome. "%");

			if ($registro -> execute()){
				if ($registro -> rowCount() > 0){
					echo '
					<table border=1 cellspacing=0 cellpadding=8 align=center>
						<tr align=center bgcolor="#CCCCCC">
							<th>Nome</th>
							<th>Número</th>
							<th>Descrição</th>
						</tr>';
					while ($campo = $registro -> fetch (PDO::FETCH_OBJ)){
						echo '
						<tr  align=center>
							<td>' .$campo -> cli_nome. '</td>
							<td>' .$campo -> tel_numero. '</td>
							<td>' .$campo -> tel_descricao. '</td>
						</tr>';				
					}
					'</table>';
				}
				else echo "<script> alert('Telefone não encontrado!!!');window.location='formConsultaTelefone.php';</script>";
			}
		?>
		
		<font size=3>Voltar a consulta</font><br>
		<a href="formConsultaTelefone.php"><img src="img/voltar.png" width=5% height=5%></a>		
		</center>
	</body>
</html>
