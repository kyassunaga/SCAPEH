<?php  
	include_once("verifica.php");
	//recebe dados do formulário
	$qua_numero=$_POST["qua_numero"];
	$qua_situacao=$_POST["qua_situacao"];
	$fun_cod=$_POST["fun_cod"];

	//conexao com o banco de dados
    $con = new PDO ("mysql:host=localhost;dbname=scapeh", "root" , "");
  
	//insere dados no banco
    $stmt=$con->prepare ("insert into quarto (qua_numero , qua_situacao, fun_cod) values (?, ?, ? )");
		
	$stmt->bindParam(1,$qua_numero);	
	$stmt->bindParam(2,$qua_situacao);	
	$stmt->bindParam(3,$fun_cod);	
	
	if($stmt->execute()) echo"<script> alert('Quarto cadastrado com sucesso!');window.location='indexADM.php';</script>";
		else{
			echo"<script> alert('Erro ao cadastrar');window.location='indexADM.php';</script>";
		}
  ?>
  
  