<?php
	session_start();
	if (isset($_GET['uf'])) {
		$uf=$_GET['uf'];
		include_once '../database.php';		
		$uf=$_GET['uf'];
		$query="SELECT `cidade` FROM `local` WHERE `estado`='$uf';";
		$result2=Query($csql,$query);
		if (!$result2) {
			echo '<option value="">Nenhuma Cidade Deste Estado</option>';			
			exit();
		}
		$rows4=Associa($result2);
		for ($i=0;$rows4; $i++) { 
			if ($i>0) {
				if ($cid!=$rows4['cidade']) {
					echo '<option value="'.$rows4['cidade'].'">'.$rows4['cidade'].'</option>';
				};
			}else{
				echo '<option value="'.$rows4['cidade'].'">'.$rows4['cidade'].'</option>';
			};
			$cid=$rows4['cidade'];
			$rows4=Associa($result2);
		}
	}
	else{
		exit();	
	};
?>