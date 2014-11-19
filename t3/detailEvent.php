<?php 
	session_start();
	if (!isset($_SESSION['usuar'])) {
		header('location:../t3.php');
	}
	if (isset($_GET['event'])) {
		$ev=$_GET['event'];

		include_once '../database.php';
		$database="eventbase";
		mysql_select_db($database);
		$query="SELECT `nome`,`descr`,`date`,`lid` FROM `evento` where `eid`='$ev';";
		$result=mysql_query($query,$csql);
		$rows=mysql_fetch_assoc($result);
		$lid=$rows['lid'];
		$query2="SELECT * FROM `local` where `lid`='$lid';";
		$result2=mysql_query($query2,$csql);
		$rowsl=mysql_fetch_assoc($result2);
		include_once '../dataout.php';
	}
	else{
		header('location:t3.php');
	}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Detalhes dos Eventos</title>
	<meta charset="utf-16e" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
	<style type="text/css">
	img{
		width: auto;
		height: auto;
	}
	</style>	
</head>
<body>
	<div class="container">
		<div class="thumbnail">
			<?php include_once '../localImages.php'; 
			echo '<div class="fill text-center"><img class="fill" src="'.$InLocal.$rows['nome'].'" /></div>';?>
			<div class="thumbnail fill"><span>Nome do Evento:</span>
				<?php $nom=$rows['nome'];
				$no=explode(".", $nom);
				echo '<h3 class="text-center">';
				for($i=0;$no[$i]!=end($no);$i++) { 
					if($i!=0)
						echo '.';
					echo $no[$i];
				};
				echo'</h3>'; ?>
			</div>
			<div class="fill thumbnail"><span>Detalhes:</span>	
				<?php echo '<h3 class="text-center">'.$rows['descr'].'</h3></div>'; ?>
				<div class="thumbnail"><span>Data do Evento:</span>
					<?php 	$data=$rows['date'];
					$data2=explode("-", $data);
					$ano=$data2[0];
					$mes=$data2[1];
					$dia=$data2[2];
					echo '<h3 class="text-center">'.$dia.'/'.$mes.'/'.$ano.'</h3>'; ?>
				</div>
			</div>
			<div class="fill thumbnail">
				<span>Local</span>
				<?php
					include_once '../localImages.php';
					echo '<img class="fill" src="'.$InLocalL.$rowsl['nomei'].'" />';
					echo '<h3 class="text-center">'
					.'Nome: '.$rowsl['nomel'].'<br />'
					.'Rua: '.$rowsl['rua'].'<br />'
					.'Numero: '.$rowsl['num'].'<br />'
					.'Bairro: '.$rowsl['bairro'].'<br />'
					.'CEP: '.$rowsl['cep'].'<br />'
					.'Capacidade: '.$rowsl['capac'].'<br />'
					.'Cidade: '.$rowsl['cidade'].'<br />'
					.'UF: '.$rowsl['estado'].'<br />'.'</h3>';
					echo '</div>';
				?>
			</div>
			<a href="t3.php">Voltar</a>
		</div>
	</div>
</body>
</html>