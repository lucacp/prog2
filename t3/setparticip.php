<?php
	session_start();
	if (isset($_SESSION['evento'])) {
		$ev=$_SESSION['evento'];
		include_once '../database.php';
		$usuario=$_SESSION['usuar'];
		$query="SELECT * FROM `particip` WHERE `uid`='$usuario' AND `eid`='$ev';";
		$result2=Query($csql,$query);
		$rows3=Associa($result2);
		if (!$rows3) {
			$query2="INSERT INTO `particip` values(null,'$ev','$usuario',null,null);";
			$result3=Query($csql,$query2);
			$result4=Query($csql,$query);
			$rows4=Associa($result4);
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