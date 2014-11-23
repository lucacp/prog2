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
			$query2="INSERT INTO `particip` values(null,'$ev','$usuario',null,null);";
			$result3=mysql_query($query2,$csql);
			$result4=mysql_query($query,$csql);
			$rows4=mysql_fetch_assoc($result4);
			if (!$rows4) {
				echo 'Problemas com o ingresso.';
			}
			else{
				echo 'Sua Participacao foi Cadastrada com Sucesso, Tenha um Bom Evento';
			}
			include '../dataout.php';
			exit();
		}
		echo '<h3>Voce ja se inscreveu para este evento.</h3>';
		include '../dataout.php';
		exit();
	}
	else{
		echo '<h3>Nao foi possivel Inscrever</h3>';
		exit();	
	};
?>