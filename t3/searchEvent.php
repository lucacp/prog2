<?php
	session_start();
	if (!isset($_SESSION['usuar'])) {
		header('location:../t3.php');
	}
	else if ($_SESSION['nivel']>2) {
		header('location:t3.php');
	}
	if (isset($_POST['submit'])) {
		$query="SELECT `eid`,`nome` FROM `evento` ";
		$arq=$_POST['nomearq'];
		if($arq==""||$arq==null){
			$_SESSION['busca1']=0;
		}
		else{
			$_SESSION['busca1']=1;	
			$query.=" WHERE `nome` LIKE '%$arq%' ";
		}
		$descr=$_POST['descr'];
		if($descr==""||$descr==null){
			$_SESSION['busca2']=0;
		}
		else{
			if($_SESSION['busca1']==0){
				$query.=" WHERE `descr` LIKE '%$descr%' ";
				$_SESSION['busca2']=1;
			}else{
				$query.=" OR `descr` LIKE '%$descr%' ";
				$_SESSION['busca2']=2;
			};
		};
		$tipo=$_POST['datat'];
		$ano=$_POST['dataa'];
		$mes=$_POST['datam'];
		$dia=$_POST['datad'];
		$Data=$ano."/".$mes."/".$dia;
		if($ano==""||$ano==null||$mes==""||$mes==null||$dia==""||$dia==null||$tipo==""||$tipo==null){
			$_SESSION['busca3']=0;
		}
		else{
			if($_SESSION['busca1']==0){
				if ($_SESSION['busca2']==0) {
					$query.=" WHERE `date` ".$tipo." '$Data' ";
					$_SESSION['busca3']=1;
				}
				else{
					$query.=" OR `date` ".$tipo." '$Data' ";
					$_SESSION['busca3']=2;
				}
			}
			else{
				$query.=" OR `date` ".$tipo." '$Data' ";
				$_SESSION['busca3']=3;
			}
		};
		include_once '../database.php';
		$database="eventbase";
		mysql_select_db($database);
		$query.=";";
		unset($_SESSION['busca1']);
		unset($_SESSION['busca2']);
		unset($_SESSION['busca3']);
		$result=mysql_query($query,$csql);
		$rows=mysql_fetch_assoc($result);
		if($rows!=null) {
			$_SESSION['busca']=1;
		}
		else{
			$_SESSION['busca']=0;
			include_once '../dataout.php';
		};
	};

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../stilo.css">
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
							include '../localImages.php';
							for (;$rows;) {
								$nome=explode(".",$rows['nome']);
								echo '<div class="thumbnail"><a href="detailEvent.php?event='.$rows['eid'].'">'.
								'<img class="img-circle" src="'.$InLocal.$rows['nome'].'" /><h3 class="text-center">';
								for($i3=0;$nome[$i3]!=end($nome);$i3++){
									if($i3!=0)
										echo '.';
							 		echo $nome[$i3];
							 	};
							 	echo '</h3></a></div>';
								$rows=mysql_fetch_assoc($result);
							};
							echo '</div>';
							
						};
						include_once '../dataout.php';
					}
				echo '</div>';
				?>
			</div>
		</div>
	</body>
</html>