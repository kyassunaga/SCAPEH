<?php
	session_start();
	unset( $_SESSION["login"]);
		session_destroy();
		echo "<script>
		alert('Deslogado');
		location.href='index.php';
		</script>";
	exit;
?>