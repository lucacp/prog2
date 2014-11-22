<?php
	session_start();
	if (!isset($_SESSION['usuar'])) {
		header('location:../t3.php');
	}
	else{
		include_once '../database.php';
		$database="eventbase";
		mysql_select_db($database);
		$uf=$_GET['uf'];
		$query="SELECT `cidade` FROM `local` WHERE `uf`='$uf';";
		$result=mysql_query($query,$csql);
		if ($j=mysql_num_rows($result)>0) {
			$result=mysql_query($query,$csql);
			echo '<option value="">Selecione a Cidade</option>';
			$rows=mysql_fetch_assoc($result);
			for ($i=0; $i < $j; $i++) { 
				if ($i>0) {
					if ($cid!=$rows['cidade']) {
						echo '<option value="'.$rows['cidade'].'">'.$rows['cidade'].'</option>';
					};
				}else{
					echo '<option value="'.$rows['cidade'].'">'.$rows['cidade'].'</option>';
				};
				$cid=$rows['cidade'];
				$rows=mysql_fetch_assoc($result);
			}
		}else{
			echo '<option value="">Nenhuma Cidade Deste Estado</option>';
		};
	};
?>