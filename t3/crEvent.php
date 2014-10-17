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
				$query2="INSERT INTO `evento` values(null,'$arq','$descr','".$_SESSION['nivel']."');";
				mysql_query($query2,$csql);
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
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<title>Criar Evento</title>

	</head>
	<body>
		<div class="container">
			<form method="post" action="" name="teste" enctype="multipart/form-data" >
				<label for="nomeA">Nome do Evento:</label>
				<input type="text" id="nomeA" name="nomearq" size="20" />
				<label for="descris">Descrisão do evento: (opcional)</label>
				<textarea name="descr"></textarea>
				<span>Enviar Foto do Evento: </span>
				<input type="file" name="arquiv" required />
				<input type="submit" name="submit" />
			</form>
			<a href="t3.php">Pagina Principal</a>
		</div>
	</body>
</html>