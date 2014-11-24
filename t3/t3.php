<?php
	session_start();
	if (!isset($_SESSION['usuar'])) {
		header('location:../t3.php');
	}
	else{
		include_once '../database.php';
		$database="eventbase";
		mysql_select_db($database);
		$query="SELECT `eid`,`nome` FROM `evento` WHERE `nivel`>='".$_SESSION['nivel']."';";
		$result=mysql_query($query,$csql);
		$uid=$_SESSION['usuar'];
		$query2="SELECT `pid`,`eid` FROM `particip` WHERE `uid`='$uid';";
		$result2=mysql_query($query2,$csql);
		$rows5=mysql_fetch_assoc($result2);
		if ($rows5) {
			$_SESSION['even']=1;
		}
		else{
			$_SESSION['even']=0;
		};
	};
	if (isset($_SESSION['registro'])) {
		unset($_SESSION['registro']);
		
	}


?>
<!DOCTYPE html>
<html>
	<head>
		<title>Eventos Principais</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../stilo.css" />
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="../css/full-slider.css">
		<script src="../js/bootstrap.min.js"></script>
		<script src="../jquery.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="eventos">
				<h1 id="tit">Eventos</h1>
				
					<?php	
					include '../localImages.php';
					$rows=mysql_fetch_assoc($result);
					for($i=1,$max=5;$rows&&$max!=0;$i++,$max--) {
						echo '<a href="detailEvent.php?event='.$rows['eid'].'">';
						echo '<img class="img-rounded" src="'.$InLocal.$rows['nome'].'" />';
						$nom=$rows['nome'];
						$no=explode(".", $nom);
						for($i2=0;$no[$i2]!=end($no);$i2++) {
							if($i2!=0)
								echo '.';
							echo $no[$i2];
						};
						echo '</a>';
						$rows=mysql_fetch_assoc($result);
						if ($i==3) {
							$i=0;
						};
					};
					if (isset($_SESSION['even'])){
						if ($_SESSION['even']==1) {
							
							echo '<br /><div class="fill thumbnail">';
							echo '<h1 class="text-center">Meus Eventos</h1>';
							for ($i=0; $rows5;$i++) { 
								echo '<a href="detailEvent.php?event='.$rows5['eid'].'">';
								$evid=$rows5['eid'];
								$query4="SELECT `eid`,`nome` FROM `evento` WHERE `eid`='$evid';";
								$result=mysql_query($query4,$csql);
								$rows0=mysql_fetch_assoc($result);
								echo '<img src="'.$InLocal.$rows0['nome'].'" />';
								$rows5=mysql_fetch_assoc($result2);
								echo '</a>';
							};
							echo '</div>';	
						}
					}
					include_once '../dataout.php';
					?>
				</div>
			<div>
				<a href="crEvent.php">Criar Novo Evento</a>
			</div>
			<div>
				<a href="crLocal.php">Criar Novo Local</a>
			</div>
			<div>
				<a href="searchEvent.php">Procurar Eventos</a>
			</div>
			<div>
				<a href="altUser.php">Alterar Perfil</a>
			</div>
			<?php 
				if ($_SESSION['nivel']<2) {
					echo '<div>'
					.'<a href="registparticip.php">Registro dos Participantes.</a>'
					.'</div>';
				};
			?>
			<div class="log">
				<a href="logout.php">Sair.</a>
			</div>
			
		</div>
	</body>
</html>
