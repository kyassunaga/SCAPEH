<?php
	include_once("verifica.php");
	//recebe dados do formulário
	$cli_nome = $_POST["cli_nome"];
	
	//conexao com o banco de dados
	$con= new PDO("mysql:host=localhost;dbname=scapeh", "root", "");
			
	//exclui dados no banco
	$stmt=$con->prepare("DELETE c.cli_cod FROM reserva r, cliente c WHERE c.cli_cod = ?");
		
	$stmt->bindParam(1,$tel_cod);			
	
	if($stmt->execute()) echo"<script> alert('Reserva excluída com sucesso!');window.location='indexADM.php';</script>";
		else{
			echo"<script> alert('Erro ao excluir...');window.location='indexADM.php';</script>";
		}	
?>