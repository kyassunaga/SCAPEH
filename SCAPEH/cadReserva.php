<?php  
	include_once("verifica.php");
	//recebe dados do formulário

	$res_data_entrada=$_POST["res_data_entrada"];
	$res_data_saida=$_POST["res_data_saida"];
	$res_valor=$_POST["res_valor"];
	$cli_cod=$_POST["cli_cod"];
	$qua_cod=$_POST["qua_cod"];
	$fun_cod=$_POST["fun_cod"];

	//conexao com o banco de dados
    $con = new PDO ("mysql:host=localhost;dbname=scapeh", "root" , "");
  
	//insere dados no banco
    $stmt=$con->prepare ("insert into reserva (res_data_entrada, res_data_saida, res_valor, cli_cod, qua_cod, fun_cod) values (?, ?, ?, ?, ?, ?)");
		
	$stmt->bindParam(1,$res_data_entrada);	
	$stmt->bindParam(2,$res_data_saida);	
	$stmt->bindParam(3,$res_valor);	
	$stmt->bindParam(4,$cli_cod);	
	$stmt->bindParam(5,$qua_cod);	
	$stmt->bindParam(6,$fun_cod);	
		
	if($stmt->execute()) echo"<script> alert('Reserva realizada com sucesso!');window.location='indexADM.php';</script>";
		else{
			echo"<script> alert('Erro na reserva');window.location='indexADM.php';</script>";
		}
  ?>
  
  