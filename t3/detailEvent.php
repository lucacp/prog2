<?php 
	session_start();
	if (!isset($_SESSION['usuar'])) {
		header('location:../t3.php');
	}
	if (isset($_GET['event'])) {
		$ev=$_GET['event'];

		include_once '../database.php';
		$database="eventbase";
		mysql_select_db($database);
		$query="SELECT `nome`,`descr` FROM `evento` where `eid`='$ev';";
		$result=mysql_query($query,$csql);
		$rows=mysql_fetch_assoc($result);
		include_once '../dataout.php';
	}
	else{
		header('location:t3.php');
	}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Detalhes dos Eventos</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
</head>
<body>
	<div class="container">
		<?php include_once '../localImages.php'; echo '<img src="'.$InLocal.$rows['nome'].'" /><br />';?>
		<span>Nome do Evento:</span>
		<?php echo '<span>'.$rows['nome'].'</span><br />'; ?>
		<span>Detalhes:</span>
		<?php echo '<div>'.$rows['descr'].'</div>' ?>
		<a href="t3.php">Voltar</a>
	</div>
</body>
</html>