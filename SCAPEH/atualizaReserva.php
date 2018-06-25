<?php
	include_once("verifica.php");
	
	//recede dados do formulário
	$res_cod = $_POST["res_cod"];
	$cli_cod = $_POST["cli_cod"];
	$qua_cod = $_POST["qua_cod"];
	$res_data_entrada = $_POST["res_data_entrada"];
	$res_data_saida = $_POST["res_data_saida"];
	$res_valor = $_POST["res_valor"];
	$fun_cod = $_POST["fun_cod"];
	
			
	//conexao com o banco de dados
	$con= new PDO("mysql:host=localhost;dbname=scapeh", "root", "");
			
	//atualiza dos dados no banco
	$stmt=$con->prepare("UPDATE reserva SET cli_cod = ?, qua_cod = ?, res_data_entrada = ?, res_data_saida = ?, res_valor = ?, fun_cod = ?  WHERE res_cod = ?");
		
	$stmt->bindParam(1,$cli_cod);	
	$stmt->bindParam(2,$qua_cod);	
	$stmt->bindParam(3,$res_data_entrada);	
	$stmt->bindParam(4,$res_data_saida);	
	$stmt->bindParam(5,$res_valor);	
	$stmt->bindParam(6,$fun_cod);	
	$stmt->bindParam(7,$res_cod);	

	if($stmt->execute()) echo"<script> alert('Reserva atualizada com sucesso!');window.location='indexADM.php';</script>";
		else{
			echo"<script> alert('Erro na atualização...');window.location='indexADM.php';</script>";
		}		
?>