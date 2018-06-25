<?php
	include_once("verifica.php");
	
	//recede dados do formulário
	$tel_cod = $_POST["tel_cod"];
	$tel_numero = $_POST["tel_numero"];
	$tel_descricao = $_POST["tel_descricao"];
	$cli_cod = $_POST["cli_cod"];
			
	//conexao com o banco de dados
	$con= new PDO("mysql:host=localhost;dbname=scapeh", "root", "");
			
	//atualiza dos dados no banco
	$stmt=$con->prepare("UPDATE telefone SET tel_numero = ?, tel_descricao = ?, cli_cod = ? WHERE tel_cod = ?");
		
	$stmt->bindParam(1,$tel_numero);	
	$stmt->bindParam(2,$tel_descricao);	
	$stmt->bindParam(3,$cli_cod);	
	$stmt->bindParam(4,$tel_cod);	

	if($stmt->execute()) echo"<script> alert('Telefone atualizado com sucesso!');window.location='indexADM.php';</script>";
		else{
			echo"<script> alert('Erro na atualização...');window.location='indexADM.php';</script>";
		}		
?>