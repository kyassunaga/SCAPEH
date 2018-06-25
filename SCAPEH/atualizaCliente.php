<?php
	include_once("verifica.php");
	//recede dados do formulário
	$cli_cod = $_POST["cli_cod"];
	$cli_nome = $_POST["cli_nome"];
	$cli_rg = $_POST["cli_rg"];
	$cli_cpf = $_POST["cli_cpf"];
	$cli_email = $_POST["cli_email"];
	$cli_endereco = $_POST["cli_endereco"];			
	$fun_cod = $_POST["fun_cod"];			
	//conexao com o banco de dados
	$con= new PDO("mysql:host=localhost;dbname=scapeh", "root", "");
			
	//atualiza dos dados no banco
	$stmt=$con->prepare("UPDATE cliente SET cli_nome = ?, cli_rg = ?, cli_cpf = ?, cli_email = ?, cli_endereco = ?, fun_cod = ? WHERE cli_cod = ?");
		
	$stmt->bindParam(1,$cli_nome);	
	$stmt->bindParam(2,$cli_rg);	
	$stmt->bindParam(3,$cli_cpf);	
	$stmt->bindParam(4,$cli_email);	
	$stmt->bindParam(5,$cli_endereco);			
	$stmt->bindParam(6,$fun_cod);			
	$stmt->bindParam(7,$cli_cod);			


	if($stmt->execute()) echo"<script> alert('Cliente atualizazo com sucesso!');window.location='indexADM.php';</script>";
		else{
			echo"<script> alert('Erro na atualização...');window.location='indexADM.php';</script>";
		}		
?>