<?php
	include_once("verifica.php");
?>
<html lang=''>
	<head>
		<meta charset='utf-8'>
		<link rel="stylesheet" href="styles.css">
		<title>Cadastrar Reserva</title>
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
			<form method="POST" action="cadReserva.php" enctype="multipart/form-data" name="addroom">			
				<font size="5" color="06213f">Cadastrar Reserva<br><br>		  
				<table>
					<tr>
						<td align="right">Selecione Cliente:</td>
						<td>
							<?php
								ListaCliente4();
							?>  
							<?php
								function ListaCliente4(){
									//escreve cabeçalho da lista select e da nome em função do campo de retorno
									echo "<select name='cli_cod'>";
									// conecta com o banco
									$conecta = new PDO("mysql:host=localhost;dbname=scapeh", "root","");
									// executa consulta
									$resp = $conecta->query("select cli_cod, cli_nome from cliente order by cli_nome");
									// percorre consulta
									while ($campo=$resp->fetch(PDO::FETCH_OBJ)) {
										// cria item option da select, item de escolha
										// e define valor de retorno
														   
										echo "<option value ='".$campo-> cli_cod ."'>";
										// mostra informação de escolha
										echo $campo-> cli_nome;
									}// retorna ao laço para imprimir restante, caso existam
									echo "</select>";
								}
							?>
						</td>
					</tr>
							
					<tr>
						<td align="right">Selecione Quarto:</td>
						<td>
							<?php
								ListaQuarto2();
							?>  
							<?php
								function ListaQuarto2(){
									//escreve cabeçalho da lista select e da nome em função do campo de retorno
									echo "<select name='qua_cod'>";
									// conecta com o banco
									$conecta = new PDO("mysql:host=localhost;dbname=scapeh", "root","");
									// executa consulta
									$resp = $conecta->query("select qua_cod, qua_numero from quarto order by qua_numero");
									// percorre consulta
									while ($campo=$resp->fetch(PDO::FETCH_OBJ)) {
										// cria item option da select, item de escolha
										// e define valor de retorno
														   
										echo "<option value ='".$campo-> qua_cod ."'>";
										// mostra informação de escolha
										echo $campo-> qua_numero;
									}// retorna ao laço para imprimir restante, caso existam
									echo "</select>";
								}
							?>
						</td>
					</tr>
					<tr>
						<td height="40" align="right">Dada da entrada:</td>
						<td><input type="date" name="res_data_entrada"></td>							
					</tr>
					<tr>
						<td height="40" align="right">Data da saída:</td>
						<td><input type="date" name="res_data_saida"></td>						
					</tr>
					<tr>
						<td height="40" align="right">Valor:</td>
						<td><input type="text"  name="res_valor" size="15"></td>
					</tr>
					<tr>
						<td align="right">Selecione Funcionário:</td>
						<td>
							<?php
								ListaFuncionario3();
							?>
							<?php
								function ListaFuncionario3(){
									//escreve cabeçalho da lista select e da nome em função do campo de retorno
									echo "<select name='fun_cod'>";
									// conecta com o banco
									$conecta = new PDO("mysql:host=localhost;dbname=scapeh", "root","");
									// executa consulta
									$resp = $conecta->query("select fun_cod, fun_nome from funcionario order by fun_nome");
									// percorre consulta
									while ($campo=$resp->fetch(PDO::FETCH_OBJ)) {
										// cria item option da select, item de escolha
										// e define valor de retorno
											   
										echo "<option value ='".$campo-> fun_cod ."'>";
										// mostra informação de escolha
										echo $campo-> fun_nome;
									}// retorna ao laço para imprimir restante, caso existam
									echo "</select>";
								}
							?>
						</td>
					</tr>
				</table>
				</font>
				<br><center><input type=image src="img/botao_cadastrar.png"></center>
			</form>				
		</center>	
	</body>
<html>
