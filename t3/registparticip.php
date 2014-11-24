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
	if (isset($_POST['enviadopru'])) {
		include_once '../database.php';
		$database="eventbase";
		mysql_select_db($database);
		$ev=$_POST['eventos'];
		$usuario=$_POST['nameuser'];
		$query="SELECT `id`,`nome` FROM `usuario` WHERE `nome`LIKE'%$usuario%';";
		$result2=mysql_query($query,$csql);
		$rows3=mysql_fetch_assoc($result2);
		if (!$rows3) {
			echo '<h3>Nao fez inscrição.</h3>';
			include '../dataout.php';
		}
		else{
			$uid=$rows3['id'];
			$query0="SELECT * FROM `particip` WHERE `uid`='$uid' AND `eid`='$ev';";
			$result3=mysql_query($query0,$csql);
			$rows4=mysql_fetch_assoc($result3);
			if (!$rows4) {
				echo 'Usuario nao se cadastrou no evento.';
			}
			else{
				$tim=time();
			}
		}
	}
	else if (isset($_POST['enviadopre'])) {
		include_once '../database.php';
		$database="eventbase";
		mysql_select_db($database);
		$ev=$_POST['namevent'];
		$query="SELECT `eid` FROM `evento` WHERE `nome` LIKE '%$ev%';";
		$result1=mysql_query($query,$csql);
		$rows0=mysql_fetch_assoc($result1);
		if (!$rows0) {
			echo 'Erro na Busca';
		}else{
			$_SESSION['registro']=$rows0['eid'];
		};
	
	};
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
	<script src="../jquery.min.js"></script>
	<script type="text/javascript">

	</script>
</head>
<body>
	<div class="container">
		<div class="thumbnail">
			<a href="t3.php">Voltar</a>
			<form method="post" action="">
				<?php 
					if (isset($_SESSION['registro'])) {
						echo '<input name="eventos" value="'.$_SESSION['registro'].'" type="hidden" />';
						echo '<div class="form-group"><input type="text" class="form-control input-lg" placeholder="Nome do Usuario" name="nameuser" /></div>';
					}
					else{
						echo '<div class="form-group"><input  class="form-control input-lg" type="text" placeholder="Nome do Evento" name="namevent" /></div>';
					};
				?>
				<?php
					if (isset($_SESSION['registro'])) {
						echo '<div class="form-group">'
						.'<input type="submit" class="btn btn-primary btn-lg btn-block" '
						.' value="Procurar Usuario" name="enviadopru" />'
						.'</div>';
					}
					else{
						echo '<div class="form-group">'
						.'<input type="submit" class="btn btn-primary btn-lg btn-block"'
						.' value="Procurar Evento" name="enviadopre" />'
						.'</div>';
					};
				?>
			</form>

		</div>
	</div>
</body>
</html>
