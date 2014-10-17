<?php
	session_start();
	if (!isset($_SESSION['usuar'])) {
		header('location:../t3.php');
	}
	else{
		include_once '../database.php';
		$database="eventbase";
		mysql_select_db($database);
		$query="SELECT `eid`,`nome` FROM `evento` where `nivel`>='".$_SESSION['nivel']."';";
		$result=mysql_query($query,$csql);

	};


?>
<!DOCTYPE html>
<html>
	<head>
		<title>Eventos Principais</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../stilo.css" />
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
		<script src="../jquery.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="eventos">
				<h1 id="tit">Eventos</h1>
				<?php
				include '../localImages.php';
				for($i=1;$rows=mysql_fetch_assoc($result);$i++){
					echo '<div class="ev'.$i.'"><a href="detailEvent.php?event='.$rows['eid'].'"><img src="'.$InLocal.$rows['nome'].'" /></a></div>';
					if ($i>4) {
						$i=1;
					};
				};
				include_once '../dataout.php';
				?>
			</div>
			<div>
				<a href="crEvent.php">Criar Novo Evento</a>
			</div>
			<div class="log">
				<a href="logout.php">Sair.</a>
			</div>
				
			<div></div>	
		</div>
	</body>
</html>
