<?php
	session_start();
	if (!isset($_SESSION['usuar'])) {
		header('location:../t3.php');
	}
	else if (isset($_SESSION['nivel'])) {
		if ($_SESSION['nivel']>=2) {
			header('location:t3.php');
		};
	}
	if (isset($_POST['enviadopr'])) {
		include_once '../database.php';
		$database="eventbase";
		mysql_select_db($database);
		$usuario=$_POST['nomeusuario'];
		$query="SELECT `id`,`nome` FROM `usuario` WHERE `nome`LIKE'%$usuario%';";
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
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
	<script src="../jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="thumbnail">
			<form method="post" action="">
				<?php 
					if (isset($_SESSION['registro'])) {
						echo '<input name="evento" value="'.$_SESSION['registro'].'" type="hidden" />';
					};
				?>
			</form>
		</div>
	</div>
</body>
</html>
