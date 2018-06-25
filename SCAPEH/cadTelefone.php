<?php  
	include_once("verifica.php");
	//recebe dados do formulário

	$tel_numero=$_POST["tel_numero"];
	$tel_descricao=$_POST["tel_descricao"];
	$cli_cod=$_POST["cli_cod"];

	//conexao com o banco de dados
    $con = new PDO ("mysql:host=localhost;dbname=scapeh", "root" , "");
  
	//insere dados no banco
    $stmt=$con->prepare ("insert into telefone (tel_numero, tel_descricao, cli_cod) values (?, ?, ?)");
		
	$stmt->bindParam(1,$tel_numero);	
	$stmt->bindParam(2,$tel_descricao);	
	$stmt->bindParam(3,$cli_cod);	
		
	if($stmt->execute()) echo"<script> alert('Telefone cadastrado com sucesso!');window.location='indexADM.php';</script>";
		else{
			echo"<script> alert('Erro ao cadastrar');window.location='indexADM.php';</script>";
		}
  ?>
  
  