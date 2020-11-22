<?php
	session_start();
	if (isset($_SESSION['evento'])) {
		$ev=$_SESSION['evento'];
		include_once '../database.php';
		$database="eventbase";
		
		$usuario=$_SESSION['usuar'];
		$query="SELECT * FROM `particip` WHERE `uid`='$usuario' AND `eid`='$ev';";
		$result2=Query($csql,$query);
		$rows3=Associa($result2);
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