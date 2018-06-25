	
	
	<?php
		session_start(); // cria sessão
		$fun_user = $_POST["fun_user"];// recupera dados do formulário
		$fun_senha = $_POST["fun_senha"];
			
		$conecta = mysql_connect("localhost","root","");// conecta
		mysql_select_db("scapeh",$conecta);//seleciona base de dados
		//define sql para verificar autenticação
		$sql = "select * from funcionario where fun_user = '".$fun_user."' and fun_senha = '".$fun_senha."'";
		$registro = mysql_query($sql,$conecta);//executa sql
		$cont = mysql_num_rows($registro);//conta quantos registros foram retornados pela consulta
		if ($cont == 0)
		{ 
			echo "<script> alert('Acesso negado');window.location='index.php';</script>"; 
		}// se 0 então não existe usuario ou senha está incorreta
		else{	
			// recuperar informações
			$campo = mysql_fetch_array($registro);
			// armazena informações na sessão
			$_SESSION["login"] = $fun_user;
			$_SESSION["senha"] = $fun_senha;
				
			header("location:indexADM.php");		 		
		}
		mysql_close($conecta);//fecha conexão
	?> 