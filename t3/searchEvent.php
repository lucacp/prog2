<?php
	session_start();
	if (!isset($_SESSION['usuar'])) {
		header('location:../t3.php');
	}
	else if ($_SESSION['nivel']>2) {
		header('location:t3.php');
	}
	if (isset($_POST['submit'])) {
	$arq=$_POST['nomearq'].".";
	$descr=$_POST['descr'];
	$Data=
	$_POST['dataa']."/"
	.$_POST['datam']."/"
	.$_POST['datad'];
	include_once '../database.php';
	$database="eventbase";
	mysql_select_db($database);
	$query="SELECT `nome` FROM `evento` where `nome`='$arq';";
	$result=mysql_query($query,$csql);
	if($rows=mysql_fetch_assoc($result)){
		echo 'Evento ja existente.\n Por favor escolha outro nome de evento';
	}
	else{
		$query="SELECT `nome` FROM `evento` where `nome`='".$arq."';";
		$result=mysql_query($query,$csql);
		if($rows=mysql_fetch_assoc($result)){
			//echo 'Evento Cadastrado com Sucesso';
		};
	};
	include_once '../dataout.php';
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>Criar Evento</title>

	</head>
	<body>
		<div class="container">
			<div class="thumbnail" aria-hidden="true">

				<form class="form col-md-12 center-block" method="post" action="" name="teste" enctype="multipart/form-data" >
					<h1>Procura de Eventos</h1>
					<div class="form-group">
						<input type="text" class="form-control input-lg" name="nomearq" placeholder="Nome do Evento" />
					</div>
					<div class="form-group">
						<textarea class="form-control input-lg" placeholder="Descricao do Evento" name="descr"></textarea>
					</div>
					<div class="form-group">
						<input type="date" class="input-lg" name="datad" placeholder="Dia" />
						<input type="date" class="input-lg" name="datam" placeholder="Mes" />
						<input type="date" class="input-lg" name="dataa" placeholder="Ano" />
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-lg btn-block" value="Procurar Evento" name="submit" />
					</div>
					
				</form>
				<a href="t3.php">Pagina Principal</a>
				<?php
				echo '<div id="resultados">';
					if (isset($_SESSION['busca'])) {
						if ($_SESSION['busca']==0) {
							echo '<h2>Nenhum Evento Foi Encontrado.</h2>';
						}
						else{


						}
					}
				echo '</div>';
				?>
			</div>
		</div>
	</body>
</html>