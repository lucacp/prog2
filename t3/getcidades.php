<?php
	session_start();
	if (isset($_GET['uf'])) {
		$uf=$_GET['uf'];
		include_once '../database.php';
		$database="eventbase";
		mysql_select_db($database);
		$uf=$_GET['uf'];
		$query="SELECT `cidade` FROM `local` WHERE `estado`='$uf';";
		$result2=mysql_query($query,$csql);
		if (!$result2) {
			echo '<option value="">Nenhuma Cidade Deste Estado</option>';			
			exit();
		}
		$rows4=mysql_fetch_assoc($result2);
		for ($i=0;$rows4; $i++) { 
			if ($i>0) {
				if ($cid!=$rows4['cidade']) {
					echo '<option value="'.$rows4['cidade'].'">'.$rows4['cidade'].'</option>';
				};
			}else{
				echo '<option value="'.$rows4['cidade'].'">'.$rows4['cidade'].'</option>';
			};
			$cid=$rows4['cidade'];
			$rows4=mysql_fetch_assoc($result2);
		}
	}
	else{
		exit();	
	};
?>