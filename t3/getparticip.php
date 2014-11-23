<?php
	if (isset($_GET['evento'])) {
		$ev=$_GET['evento'];
		include_once '../database.php';
		$database="eventbase";
		mysql_select_db($database);
		$usuario=$_SESSION['usuar'];
		echo '<h1>'.$usuario." ".$ev." eu.</h1>";
		$query="SELECT * FROM `particip` WHERE `uid`='$usuario' AND `eid`='$ev';";
		$result2=mysql_query($query,$csql);
		if (!$result2) {
			$query2="INSERT INTO `particip` values(null,'$ev','$usuario',null,null);";
			$result3=mysql_query($query2,$csql);
			$result4=mysql_query($query,$csql);
			if (!$result4) {
				echo 'Problemas com o ingresso.';
			}
			else{
				echo 'Sua Participacao foi Cadastrada com Sucesso, Tenha um Bom Evento';
			}
			exit();
		}
	}
	else{
		exit();	
	};
?>