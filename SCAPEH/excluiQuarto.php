<?php
	include_once("verifica.php");
	//recebe dados do formulário
	$qua_cod = $_POST["qua_cod"];
	
	//conexao com o banco de dados
	$con= new PDO("mysql:host=localhost;dbname=scapeh", "root", "");
			
	//exclui dados no banco
	$stmt=$con->prepare("DELETE FROM quarto WHERE qua_cod = ?");
		
	$stmt->bindParam(1,$qua_cod);			
	
	if($stmt->execute()) echo"<script> alert('Quarto excluído com sucesso!');window.location='indexADM.php';</script>";
		else{
			echo"<script> alert('Erro ao excluir...');window.location='indexADM.php';</script>";
		}	
?>