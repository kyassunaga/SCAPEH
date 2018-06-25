<?php
	include_once("verifica.php");
?>

<html>
	<head>
		<title>Reserva</title>
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
			<font size=6 color=white><center>Lista de Reserva</center></font>
		</div>
		<br>
		<br>
		<br>
		
		<?php
			$res_data_entrada = $_POST["res_data_entrada"];
			
			//conexao com o banco de dados
			$conecta = new PDO("mysql:host=localhost;dbname=scapeh", "root", "");
				
			//colsulta dados no banco
			$registro = $conecta->prepare("
			SELECT 	c.cli_nome,
					q.qua_numero,
					r.res_data_entrada,
					r.res_data_saida,
					r.res_valor,
					f.fun_nome
				FROM 	cliente c,
						reserva r,
						quarto q,
						funcionario  f 
				where c.cli_cod = r.cli_cod and q.qua_cod = r.qua_cod and f.fun_cod = r.fun_cod and res_data_entrada like ?
			 order by res_data_entrada");
				
			$registro -> bindValue (1, "%" .$res_data_entrada. "%");

			if ($registro -> execute()){
				if ($registro -> rowCount() > 0){
					echo '
					<table border=1 cellspacing=0 cellpadding=8 align=center>
						<tr align=center  bgcolor="#CCCCCC">
							<th>Cliente</th>
							<th>Quarto nº</th>
							<th>Entrada</th>
							<th>Saída</th>
							<th>Valor</th>
							<th>Funcionário</th>
						</tr>';
					while ($campo = $registro -> fetch (PDO::FETCH_OBJ)){
						echo '
						<tr  align=center>
							<td>' .$campo ->cli_nome. '</td>
							<td>' .$campo ->qua_numero. '</td>
							<td>' .$campo -> res_data_entrada . '</td>
							<td>' .$campo -> res_data_saida . '</td>
							<td>R$ ' .$campo -> res_valor. '</td>
							<td>' .$campo -> fun_nome. '</td>
						</tr>';				
					}
					'</table>';
				}
				else echo "<script> alert('Reserva não encontrada!!!');window.location='formConsultaReserva.php';</script>";
			}
		?>
		
		<font size=3>Voltar a consulta</font><br>
		<a href="formConsultaReserva.php"><img src="img/voltar.png" width=5% height=5%></a>		
	
		</center>
	</body>
</html>
