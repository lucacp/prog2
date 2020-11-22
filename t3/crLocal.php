<?php
	session_start();
	if (!isset($_SESSION['usuar'])) {
		header('location:../t3.php');
	}
	else if ($_SESSION['nivel']>2) {
		header('location:t3.php');
	}
	if (isset($_POST['submit'])) {
	$arq=$_POST['nomelocal'];
	$rua=$_POST['nomerua'];
  	$num=$_POST['nume'];
  	$bair=$_POST['nomebai'];
  	$cep=$_POST['numcep'];
  	$capac=$_POST['numcap'];
  	$cidad=$_POST['nomcida'];
  	$uf=$_POST['nomestad'];
  	$nomeArq=$arq.".";
  	$Exts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["arquiv"]["name"]);
	$nomeArq=$nomeArq . $extension = end($temp);
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
			if (file_exists("uploadL/" . $nomeArq ))
		    {
		    	//echo "Evento ja estava no cadastro";
		    }
		    else
		    {
			    move_uploaded_file($_FILES["arquiv"]["tmp_name"],
			    "uploadL/".$nomeArq);
			};
			include_once '../database.php';
			$database="eventbase";
			
			$query="SELECT `nomel` FROM `local` where `nomel`='$arq';";
			$result=Query($csql,$query);
			if(mysqli_num_rows($result)>0){
				if ($_POST['overwrite']==1) {
					$query2="UPDATE `local` SET `rua`='$rua',`num`='$num', `bairro`='$bair',`nomei`='$nomeArq',CONVERT(`cidade` as UTF-8)='$cidad' Where `nomel`='$arq'";
					$result2=Query($csql,$query2);
					echo '<div class="thumbnail">Local Atualizado Com sucesso.</div>';	
				}else{
					echo '<div class="thumbnail">Local ja existente, PorFavor escolha outro nome para o Local.</div>';
					$rows=Associa($result);
					$_SESSION['localcreat']=$rows['nomel'];
				};
			}
			else{
				$query2="INSERT INTO `local` values(null,'$arq','$rua','$num','$bair','$cep',$capac,'$nomeArq','$cidad','$uf');";
				Query($csql,$query2);
				$query="SELECT `nomel` FROM `local` where `nome`='$arq';";
				$result=Query($csql,$query);
				$rows=Associa($result);
				if($rows>0){
					echo '<div>Local Cadastrado com Sucesso</div>';
				};
			};
			include_once '../dataout.php';
		};
	}
	else
	{
		echo "<div>arquivo não está com uma extenção permitida</div>";
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
		<div class="" aria-hidden="true">
			<div class="container">
				<div class="thumbnail">
					<form class="form col-md-12 center-block" method="post" action="" name="teste" enctype="multipart/form-data" >
						<h1>Inclusão de Locais</h1>
						<div class="form-group">
							<input type="text" class="form-control input-lg" id="nomeA" name="nomelocal" placeholder="Nome do Local" 
							<?php if (isset($_SESSION['localcreat'])) {
								echo 'value="'.$_SESSION['localcreat'].'" ';
							} ?> required />
						</div>
						<div class="form-group">
							<input type="text" class="form-control input-lg" id="nomeA" name="nomerua" placeholder="Nome da Rua" />
						</div>
						<div class="form-group">
							<input type="text" class="form-control input-lg" id="nomeA" name="nume" placeholder="Numero do Estabelecimento" />
						</div>
						<div class="form-group">
							<input type="text" class="form-control input-lg" id="nomeA" name="nomebai" placeholder="Nome do Bairro" />
						</div>
						<div class="form-group">
							<input type="text" class="form-control input-lg" id="nomeA" name="numcep" placeholder="CEP" required />
						</div>
						<div class="form-group">
							<input type="text" class="form-control input-lg" id="nomeA" name="numcap" placeholder="Maximo de Pessoas Que Podem Utilizar" />
						</div>
						<div class="form-group">
							<input type="text" class="form-control input-lg" id="nomeA" name="nomcida" placeholder="Cidade" />
						</div>
						<div class="form-group">
							<input type="text" class="form-control input-lg" id="nomeA" name="nomestad" placeholder="Sigla do Estado (UF)" />
						</div>
						<div>
							<span>Deseja Sobrescrever Caso este local já exista?</span>
							<select name="overwrite">
								<option value="0">Não</option>
								<option value="1">Sim</option>
							</select>	
						</div>
						<div class="form-group">
							<span>Enviar Foto do Local: </span>
							<input type="file" class="btn btn-primary btn-lg btn-block" value="Select Arquivo" name="arquiv" required />
						</div>
						<div>
							<input type="submit" value="Enviar" name="submit" />
						</div>
					</form>
					<a href="t3.php">Pagina Principal</a>
				</div>
			</div>
		</div>
	</body>
</html>