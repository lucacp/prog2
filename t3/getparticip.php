<?php
	session_start();
	if (isset($_SESSION['evento'])) {
		$ev=$_SESSION['evento'];
		include_once '../database.php';
		$database="eventbase";
		mysql_select_db($database);
		$usuario=$_SESSION['usuar'];
		$query="SELECT * FROM `particip` WHERE `uid`='$usuario' AND `eid`='$ev';";
		$result2=mysql_query($query,$csql);
		$rows3=mysql_fetch_assoc($result2);
		if (!$rows3) {
			echo 'Voce Nao Inscreveu Em Nenhum Evento.';
			include '../dataout.php';
			exit();
		}
		else{

		}
		include '../dataout.php';
		exit();
	}
	else{
		echo '<h3>Nao foi possivel Recuperar Dados</h3>';
		exit();	
	};
?>