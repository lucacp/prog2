<?php 
	session_start();
	if (!isset($_SESSION['usuar'])) {
		header('location:../t3.php');
	}
	if (isset($_GET['event'])) {
		$ev=$_GET['event'];
		
		include_once '../database.php';
		$query="SELECT `nome`,`descr`,`date`,`lid` FROM `evento` where `eid`='$ev';";
		$result=Query($csql,$query);
		$rows=Associa($result);
		$lid=$rows['lid'];
		$query2="SELECT * FROM `local` where `lid`='$lid';";
		$result2=Query($csql,$query2);
		if (mysqli_num_rows($result2)>0) {
			$rowsl=Associa($result2);
			$_SESSION['local']=1;
		}
		else
			$_SESSION['local']=0;
		include_once '../dataout.php';
	}
	else{
		header('location:t3.php');
	};
	if (isset($_SESSION['busca'])) {
		unset($_SESSION['busca']);
	}
	
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Detalhes dos Eventos</title>
	<meta charset="utf-16e" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
	<script src="../jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#participar').click(function(){
			$('#getp').load('setparticip.php');
		});
	});
	</script>
	<style type="text/css">
	</style>	
</head>
<body>
	<div class="container">
		<div class="thumbnail">
			<a href="t3.php">Voltar</a>
			<?php include_once '../localImages.php'; 
			echo '<div class="thumbnail fill"><img class="fill" src="'.$InLocal.$rows['nome'].'" /></div>';?>
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
					<?php 	
					$data 	= $rows['date'];
					$data2	= new DateTime($data);
//					$ano=$data2[0];
//					$mes=$data2[1];
//					$dia=$data2[2];
					echo '<h3 class="text-center">'.$data2->format('d/m/Y').'</h3>';
					if ($rows['date']!=null) {
						echo '<button id="participar" class="btn btn-primary btn-lg btn-block">Quero Participar</button>';
					}
					 ?>
				</div>
				<?php echo '<div id="getp" class="thumbnail"></div>';


				?>
			</div>
			
			<div class="fill thumbnail">
				<?php
					include_once '../localImages.php';
					if (isset($_SESSION['local'])){
						if ($_SESSION['local']==1) {
							echo '<span>Local</span><img class="fill" src="'.$InLocalL.$rowsl['nomei'].'" />';
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
						}
						else{
							echo '<h1 class="text-center">Local do Evento Não foi Selecionado</h1>';
						}
					}
					
				?>
			</div>
			
		</div>
	</div>
</body>
</html>