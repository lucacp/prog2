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
		if (mysql_num_rows($result2)>0) {
			$_SESSION['even']=1;
		}
		else{
			$_SESSION['even']=0;
		};
	};


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
							echo '<div class="fill thumbnail">';
							
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
			<div class="log">
				<a href="logout.php">Sair.</a>
			</div>
			
		</div>
	</body>
</html>
