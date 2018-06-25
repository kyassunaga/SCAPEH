<?php
	include_once("verifica.php");
?>

<html>
	<head>
		<title>Cliente</title>
		<meta charset='utf-8'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="styles.css">

		<style type="text/css">
			.titulo{
				background-color: #363738;
				font-family: Times, Times New Roman, serif;
				width: 100%;
				height: 40px;
				top: 120px;
				left: 0px;
				position: absolute;
				visibility: visible;
			}
		</style>
	</head>

	<body>
		<center><img src="imagens/LogoNovol.png" width=15% height=15%></center><br>
		<center>
		<div class="titulo">
			<font size=6 color='white'><center>Clientes Cadastrados</center></font>
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
			SELECT 	c.cli_nome,
					c.cli_email,
					t.tel_numero,
					t.tel_descricao,
					c.cli_rg,
					c.cli_cpf,					
					c.cli_endereco
				FROM 	cliente c left outer join telefone t
				on(c.cli_cod = t.cli_cod)
				where cli_nome like ? order by cli_nome");
				
			$registro -> bindValue (1, "%" .$cli_nome. "%");

			if ($registro -> execute()){
				if ($registro -> rowCount() > 0){
					echo '
					<table border=1 cellspacing=0 cellpadding=8 align=center>
						<tr align=center bgcolor="#CCCCCC">
							<th>Nome</th>
							<th>Telefone</th>
							<th>Descrição</th>
							<th>Email</th>
							<th>RG</th>
							<th>CPF</th>
							<th>Endereço</th>
						</tr>';
					while ($campo = $registro -> fetch (PDO::FETCH_OBJ)){
						echo ' 
						<tr  align=center>
							<td>' .$campo -> cli_nome. '</td>
							<td>' .$campo -> tel_numero. '</td>
							<td>' .$campo -> tel_descricao. '</td>
							<td>' .$campo -> cli_email. '</td>
							<td>' .$campo -> cli_rg. '</td>
							<td>' .$campo -> cli_cpf. '</td>
							<td>' .$campo -> cli_endereco. '</td>
						</tr>';					
					}
					'</table>';
				}
				else echo "<script> alert('Cliente não encontrado!!!');window.location='formConsultaCliente.php';</script>";
			}
		?>
		<font size=3>Voltar a consulta</font><br>
		<a href="formConsultaCliente.php"><img src="img/voltar.png" width=5% height=5%></a>	
		</center>
	</body>
</html>