<?php
	session_start();
	if (!isset($_SESSION['usuar'])) {
		header('location:../t3.php');
	}
	else if ($_SESSION['nivel']>2) {
		header('location:t3.php');
	}
	if (isset($_POST['submit'])) {
	$query="SELECT * FROM `evento` WHERE ";
	$arq=$_POST['nomearq'];
	if($arq==""||$arq==null){
		$_SESSION['busca1']=0;
	}
	else
		$query.="`nome` like '$arq' ";
	$descr=$_POST['descr'];
	if($descr==""||$descr==null){
		$_SESSION['busca2']=0;
	}
	else
		$query.="`descr` like '$descr' ";
	$tipo=$_POST['datat'];

	$Data=
	$_POST['dataa']."/"
	.$_POST['datam']."/"
	.$_POST['datad'];
	if($Data=="//"||$Data==null||$Data==""||$tipo==""||$tipo==null){
		$_SESSION['busca3']=0;
	}
	else
		$query.="`date`".$tipo."'$Data' ";

	include_once '../database.php';
	$database="eventbase";
	mysql_select_db($database);
	$query.=";";
	$result=mysql_query($query,$csql);
	$rows=mysql_fetch_assoc($result);
	if($rows>0){
		$_SESSION['busca']=1;
	}
	else{
		$_SESSION['busca']=0;
		include_once '../dataout.php';
	};
	
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>Procura Eventos</title>

	</head>
	<body>
		<div class="container">
			<div class="thumbnail" aria-hidden="true">

				<form class="" method="post" action="" name="teste" enctype="multipart/form-data" >
					<h1>Procura de Eventos</h1>
					<div class="form-group">
						<input type="text" class="form-control input-lg" name="nomearq" placeholder="Nome do Evento" />
					</div>
					<div class="form-group">
						<textarea class="form-control input-lg" placeholder="Descricao do Evento" name="descr"></textarea>
					</div>
					<div class="form-group">

						<select name="datat">
							<option value="">Selecione</option>
							<option value='='>Igual</option>
							<option value=">">Após de</option>
							<option value=">=">Desde</option>
							<option value="<">Antes de</option>
							<option value="<=">Até</option>
						</select>
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
							echo '<div class="fill>';
							for ($i2=0;$rows[$i2]; $i2++) { 
							 	echo '<h3>'.$rows[$i2].'</h3>';
							};
							echo '</div>';
							include_once '../dataout.php';
						}
					}
				echo '</div>';
				?>
			</div>
		</div>
	</body>
</html>