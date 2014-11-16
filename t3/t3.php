<?php
	session_start();
	if (!isset($_SESSION['usuar'])) {
		header('location:../t3.php');
	}
	else{
		include_once '../database.php';
		$database="eventbase";
		mysql_select_db($database);
		$query="SELECT `eid`,`nome` FROM `evento` where `nivel`>='".$_SESSION['nivel']."';";
		$result=mysql_query($query,$csql);

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
				<div id="slid1" class="carousel slide">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#slid1" data-slide-to="0" class="active"></li>
						<li data-target="#slid1" data-slide-to="1"></li>
						<li data-target="#slid1" data-slide-to="2"></li>
						<li data-target="#slid1" data-slide-to="3"></li>
					</ol>
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<?php	
						include '../localImages.php';
						$rows=mysql_fetch_assoc($result);
						echo '<div class="item active">';
						for($i=1,$max=4;$rows&&$max!=0;$i++,$max--) {
							if($max!=4)
								echo '<div class="item">';
							echo '<a href="detailEvent.php?event='.$rows['eid'].'"><img class="fill" src="'.$InLocal.$rows['nome'].'"  /></a>';
							$nom=$rows['nome'];
							$no=explode(".", $nom);
							echo '<div class="carousel-caption"><h3>';
							for($i2=0;$no[$i2]!=end($no);$i2++) {
								if($i2!=0)
									echo '.';
								echo $no[$i2];
							};
							echo '</h3></div>';
							$rows=mysql_fetch_assoc($result);
							if ($i==3) {
								$i=0;
							};
						};
						include_once '../dataout.php';
						?>
					</div>
					
					<!-- Controls -->
					<a class="left carousel-control" href="#slid1" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#slid1" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div>
			</div>
			<div>
				<a href="crEvent.php">Criar Novo Evento</a>
			</div>
			<div>
				<a href="altUser.php">Alterar Perfil</a>
			</div>
			<div class="log">
				<a href="logout.php">Sair.</a>
			</div>
			<script type="text/javascript">
		$('.carousel').carousel({
			interval:10000;
		});
		</script>
		</div>
	</body>
</html>
