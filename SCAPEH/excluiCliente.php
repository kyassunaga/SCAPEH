<?php
	include_once("verifica.php");
	//recebe dados do formulário
	$cli_cod = $_POST["cli_cod"];
	
	//conexao com o banco de dados
	$con= new PDO("mysql:host=localhost;dbname=scapeh", "root", "");
			
	//exclui dados no banco
	$stmt=$con->prepare("DELETE FROM cliente WHERE cli_cod = ?");
		
	$stmt->bindParam(1,$cli_cod);			
	
	if($stmt->execute()) echo"<script> alert('Cliente excluído com sucesso!');window.location='indexADM.php';</script>";
		else{
			echo"<script> alert('Erro ao excluir...');window.location='indexADM.php';</script>";
		}	
?>