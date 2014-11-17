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
  	$Exts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["arquiv"]["name"]);
	$arq.=$extension = end($temp);
	if ((($_FILES["arquiv"]["type"] == "image/gif")
		|| ($_FILES["arquiv"]["type"] == "image/jpeg")
		|| ($_FILES["arquiv"]["type"] == "image/jpg")
		|| ($_FILES["arquiv"]["type"] == "image/png"))
		&& in_array($extension, $Exts))
	{
		$ext=explode("/", $_FILES["arquiv"]["type"]);
		$Ext=end($ext);
		if ($_FILES["arquiv"]["error"] > 0)
	  	{
	 	 	echo "Error: " . $_FILES["arquiv"]["error"] . "<br>";
		}
		else
		{
			if (file_exists("upload/" . $arq ))
		    {
		    	//echo "Evento ja estava no cadastro";
		    }
		    else
		    {
			    move_uploaded_file($_FILES["arquiv"]["tmp_name"],
			    "upload/".$arq);
			};
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
					echo 'Evento Cadastrado com Sucesso';
				};
			};
			include_once '../dataout.php';
		};
	}
	else
	{
		echo "arquivo não está com uma extenção permitida";
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