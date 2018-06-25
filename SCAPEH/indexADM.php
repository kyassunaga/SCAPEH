<?php
	include_once("verifica.php");
?>
<html lang=''>
	<head>
		<meta charset='utf-8'>
		<link rel="stylesheet" href="styles.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="script.js"></script>
		<title>Painel de Gerenciamento</title>
		
		<style>
			.mySlides {display:none;}
		</style>
				
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
		<br>
		<center>

		<div class="w3-content w3-section" style="max-width:800px">
			<img class="mySlides" src="imagens/Alto_do_Morro1.jpg" style="width:100%">
			<img class="mySlides" src="imagens/Alto_do_Morro2.jpg" style="width:100%">
			<img class="mySlides" src="imagens/Alto_do_Morro3.jpg" style="width:100%">
			<img class="mySlides" src="imagens/Alto_do_Morro6.jpg" style="width:100%">
			<img class="mySlides" src="imagens/Alto_do_Morro7.jpg" style="width:100%">
			<img class="mySlides" src="imagens/Alto_do_Morro4.jpg" style="width:100%">
			<img class="mySlides" src="imagens/Alto_do_Morro5.jpg" style="width:100%">
		</div>
		</center>
		<script>
			var myIndex = 0;
			carousel();

			function carousel() {
				var i;
				var x = document.getElementsByClassName("mySlides");
				for (i = 0; i < x.length; i++) {
				   x[i].style.display = "none";  
				}
				myIndex++;
				if (myIndex > x.length) {myIndex = 1}    
				x[myIndex-1].style.display = "block";  
				setTimeout(carousel, 2500); // Change image every 2 seconds
			}
		</script>
	</body>
<html>
