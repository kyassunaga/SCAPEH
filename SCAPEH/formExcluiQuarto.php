<?php
	include_once("verifica.php");
?>
<html lang=''>
	<head>
		<meta charset='utf-8'>
		<link rel="stylesheet" href="styles.css">
		<title>Excluir Quarto</title>
	</head>
	<body>
		<center><img src="imagens/LogoNovol.png" width=15% height=15%></center><br>
		<div id='cssmenu'>
			<ul class="teste">
				<li class='active has-sub'><a href='indexADM.php'><span>Home</span></a>
				</li>
				<li class='active has-sub'><a href='#'><span>Cliente</span></a>
					<ul>
						<li class='has-sub'><a href='formCadCliente.php'><span>Cadastrar</span></a></li>
						<li class='has-sub'><a href='formConsultaCliente.php'><span>Consultar</span></a></li>
						<li class='has-sub'><a href='formAtualizaCliente.php'><span>Atualizar</span></a></li>
						<li class='has-sub'><a href='formExcluiCliente.php'><span>Excluir</span></a></li>
					</ul>
				</li>
				<li class='active has-sub'><a href='#'><span>Telefone</span></a>
					<ul>
						<li class='has-sub'><a href='formCadTelefone.php'><span>Cadastrar</span></a></li>
						<li class='has-sub'><a href='formConsultaTelefone.php'><span>Consultar</span></a></li>
						<li class='has-sub'><a href='formAtualizaTelefone.php'><span>Atualizar</span></a></li>
						<li class='has-sub'><a href='formExcluiTelefone.php'><span>Excluir</span></a></li>
					</ul>
				</li>
				<li class='active has-sub'><a href='#'><span>Quarto</span></a>
					<ul>
						<li class='has-sub'><a href='formCadQuarto.php'><span>Cadastrar</span></a></li>
						<li class='has-sub'><a href='formConsultaQuarto.php'><span>Consultar</span></a></li>
						<li class='has-sub'><a href='formAtualizaQuarto.php'><span>Atualizar</span></a></li>
						<li class='has-sub'><a href='formExcluiQuarto.php'><span>Excluir</span></a></li>
					</ul>
				</li>
				<li class='active has-sub'><a href='#'><span>Reserva</span></a>
					<ul>
						<li class='has-sub'><a href='formCadReserva.php'><span>Cadastrar</span></a></li>
						<li class='has-sub'><a href='formConsultaReserva.php'><span>Consultar</span></a></li>
						<li class='has-sub'><a href='formAtualizaReserva.php'><span>Atualizar</span></a></li>
						<li class='has-sub'><a href='formExcluiReserva.php'><span>Excluir</span></a></li>
					</ul>
				</li>
				<li class='active has-sub'><a href='#'>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                        
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                        
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                        
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                        
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</a>
				</li>
				<form name="dados" method="POST" action="destroisessao.php">						
					<input type="submit" name="" id="" value="Sair" class="meulink" onClick=window.location="#" align=center />
				</form>	
			</ul>
		</div>
	
		<center>
			<br>
			<form method="POST" action="excluiQuarto.php">
				<font size="5" color="06213f">Excluir Quarto<br><br>
				<table border="0">
					<tr>
						<td align="right">Número do quarto:</td>
						<td>
							<?php
							   ListaQuarto1();
							?>
							<?php
								function ListaQuarto1(){
									//escreve cabeçalho da lista select e da nome em função do campo de retorno
									echo "<center><select name='qua_cod'>";
									// conecta com o banco
									$conecta = new PDO("mysql:host=localhost;dbname=scapeh", "root","");
									// executa consulta
									$resp = $conecta->query("select qua_cod, qua_numero from quarto order by qua_numero");
									// percorre consulta
									while ($campo=$resp->fetch(PDO::FETCH_OBJ)) {
										// cria item option da select, item de escolha
										// e define valor de retorno
														   
										echo "<option value ='".$campo-> qua_cod."'>";
										// mostra informação de escolha
										echo $campo-> qua_numero;
									}// retorna ao laço para imprimir restante, caso existam
									echo "</select></center>";
								}
							?>
						</td>
					</tr>
				</table>
				</font>
				<br><center><input type=image src="img/botao_excluir.png" width=6% height=6%></center>
			</form>	
		</center>	
	</body>
<html>
