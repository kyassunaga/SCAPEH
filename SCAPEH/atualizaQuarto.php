<?php
	include_once("verifica.php");
	
	//recede dados do formulário
	$qua_cod= $_POST["qua_cod"];
	$qua_numero = $_POST["qua_numero"];
	$qua_situacao = $_POST["qua_situacao"];			
	$fun_cod = $_POST["fun_cod"];			
	//conexao com o banco de dados
	$con= new PDO("mysql:host=localhost;dbname=scapeh", "root", "");
			
	//atualiza dos dados no banco
	$stmt=$con->prepare("UPDATE quarto SET qua_numero = ?, qua_situacao = ?, fun_cod = ? WHERE qua_cod = ?");
		
	$stmt->bindParam(1,$qua_numero);	
	$stmt->bindParam(2,$qua_situacao);				
	$stmt->bindParam(3,$fun_cod);			
	$stmt->bindParam(4,$qua_cod);			

	if($stmt->execute()) echo"<script> alert('Quarto atualizazo com sucesso!');window.location='indexADM.php';</script>";
		else{
			echo"<script> alert('Erro na atualização...');window.location='indexADM.php';</script>";
		}		
?>