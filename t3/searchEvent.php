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
		$estado=$_POST['estado'];
		if ($estado==""||$estado==null) {
			$_SESSION['busca4']=0;
		}
		else{
			if ($_SESSION['busca1']==0) {
				if ($_SESSION['busca2']==0) {
					if ($_SESSION['busca3']==0) {
						$query.=" WHERE `estado`='$estado' ";
						$_SESSION['busca4']=1;
					}
					else{
						$query.=" OR `estado`='$estado' ";
						$_SESSION['busca4']=2;
					};
				}
				else{
					$query.=" OR `estado`='$estado' ";
					$_SESSION['busca4']=3;
				};
			}
			else{
				$query.=" OR `estado`='$estado' ";
				$_SESSION['busca4']=4;
			};
		};
		if (isset($_POST['cidade'])) {
			$cidade=$_POST['cidade'];
			if ($cidade==""||$cidade==null) {
				$_SESSION['busca5']=0;
			}
			else{
				if ($_SESSION['busca1']==0) {
					if ($_SESSION['busca2']==0) {
						if ($_SESSION['busca3']==0) {
								$query.=" OR `cidade`='$cidade' ";
								$_SESSION['busca5']=2;
						}
						else{
							$query.=" OR `cidade`='$cidade' ";
							$_SESSION['busca5']=3;
						};
					}
					else{
						$query.=" OR `cidade`='$cidade' ";
						$_SESSION['busca5']=4;
					};
				}
				else{
					$query.=" OR `cidade`='$cidade' ";
					$_SESSION['busca5']=5;
				};
			};
		};
		
		include_once '../database.php';
		$database="eventbase";
		
		$query.=";";
		unset($_SESSION['busca1']);
		unset($_SESSION['busca2']);
		unset($_SESSION['busca3']);
		unset($_SESSION['busca4']);
		unset($_SESSION['busca5']);
		$result0=Query($csql,$query);
		$rows0=Associa($result0);
		if($rows0!=null) {
			$_SESSION['busca']=1;
		}
		else{
			$_SESSION['busca']=0;
		};
		include_once '../dataout.php';
	};

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../stilo.css">
		<meta name="generator" content="Bootply" />
		<script src="../jquery.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<script type="text/javascript">
		$(document).ready(function(){
			$('#divcidad').hide();

			$('#estad').change(function(){
				var estados= $("#estad option:selected").text();
				$("#cidad").load("getcidades.php?uf="+estados);
				$('#divcidad').show("slow");
			});
		});
		</script>
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
						<label for="estad">Estado:</label>
							<?php
								include '../database.php';
								$database="eventbase";
								
								$query1="SELECT `estado` FROM `local` ;";
								$result3=Query($csql,$query1);
								$rows1=Associa($result3);
								echo '<select id="estad" name="estado"><option value="">Escolha um</option>';
								for ($i=0; $rows1; $i++) { 
									
									if ($i!=0) {
										if ($uf!=$rows1['estado']) {
											echo '<option value="'.$rows1['estado'].'">'.$rows1['estado'].'</option>';
										};
									}
									else{
										echo '<option value="'.$rows1['estado'].'">'.$rows1['estado'].'</option>';
									};
									$uf=$rows1['estado'];
									$rows1=Associa($result3);
								};
								include '../dataout.php';
								echo '</select>';
							?>
					</div>
					<div id="divcidad" class="form-group">
						<label for="cidad">Cidades:</label>
						<select id="cidad" name="cidade">
							<option value="">Selecione</option>
						</select>
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
							include '../database.php';
							$database="eventbase";
							
							include '../localImages.php';
							for (;$rows0;) {
								$nome=explode(".",$rows0['nome']);
								echo '<div class="thumbnail"><a href="detailEvent.php?event='.$rows0['eid'].'">'.
								'<img class="img-circle" src="'.$InLocal.$rows0['nome'].'" /><h3 class="text-center">';
								for($i3=0;$nome[$i3]!=end($nome);$i3++){
									if($i3!=0)
										echo '.';
							 		echo $nome[$i3];
							 	};
							 	echo '</h3></a></div>';
								$rows0=Associa($result0);
							};
							echo '</div>';
							
						include '../dataout.php';
						};
						
					}
				echo '</div>';
				?>
			</div>
		</div>
	</body>
</html>