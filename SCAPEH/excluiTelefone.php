<?php
	include_once("verifica.php");
	//recebe dados do formulário
	$tel_cod = $_POST["tel_cod"];
	
	//conexao com o banco de dados
	$con= new PDO("mysql:host=localhost;dbname=scapeh", "root", "");
			
	//exclui dados no banco
	$stmt=$con->prepare("DELETE FROM telefone WHERE tel_cod = ?");
		
	$stmt->bindParam(1,$tel_cod);			
	
	if($stmt->execute()) echo"<script> alert('Telefone excluído com sucesso!');window.location='indexADM.php';</script>";
		else{
			echo"<script> alert('Erro ao excluir...');window.location='indexADM.php';</script>";
		}	
?>