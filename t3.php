<?php
	session_start();
	if (isset($_SESSION['usuar'])) {
		header('location:t3/index.php');
	}
	else{
		if (isset($_GET['envio'])) {
			$login=$_POST['login'];
			$pass1=$_POST['pass'];
			if($login==""||$login==null){
				$_SESSION['erro']=1;
			}
			//echo $login."ss";
			if($pass1==""||$pass1==null){
				$_SESSION['erro']=2;
			}
			//echo $pass1."se";
			include 'database.php';
			$database="eventbase";
			mysql_select_db($database);
			$query2="SELECT `id`,`nome`,`senha`,`nivel` FROM `usuario` WHERE `nome`='$login' AND `senha`='$pass1';";
			$result2=mysql_query($query2,$csql);
			$rows1=mysql_fetch_assoc($result2);
			include 'dataout.php';
			if($rows1>0){
				$_SESSION['usuar']=$rows1['id'];
				$_SESSION['nivel']=$rows1['nivel'];
				header('location:t3/t3.php');
			}else{
				$_SESSION['erro']=4;
				
			}
		}else{
			unset($_SESSION['erro']);
		};
	
	
		include 'database.php';
		$database="eventbase";
		mysql_select_db($database);
		$query="SELECT `nome` FROM `evento` where `nivel`>='2';";
		$result=mysql_query($query,$csql);
	};
	function alerta($id){
		if($id==4)
		echo '<span>Senha Incorreta.</span>';
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Registro de eventos gerais</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="stilo.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		<script src="jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#loginForm').click(function(){
					
					$('body').load('index1.php');
				});
			});
		</script>
	</head>
	<body>
		<div class="container">
			<div id="cabeca">
				<div id="loginForm1" class="container"><?php if (isset($_SESSION['erro'])) {
					if ($_SESSION['erro']==4) {
						$i=$_SESSION['erro'];
						alerta($i);
					};
				}?>
				</div>	
				<button id="loginForm">Logar</button>
			</div>
			<div class="eventos">
				<?php if (isset($_GET['event'])) {
					echo 'O evento '.$_GET['event'].', precisa que voce faça login para visualizar.<br />';
				}?>
				<h1 id="tit">Eventos</h1>
				<?php
				$rows=mysql_fetch_assoc($result);
				if($rows>0){
					$_SESSION['view']=1;
				}
				else{
					$_SESSION['view']=0;
				};
				if (isset($_SESSION['view'])) {
					include 'localImages.php';
					
					if($_SESSION['view']==1){
						for($i=1;$rows&&$i<5;$i++){
							echo '<div class="ev1"><a href="?event='.$i.'"><img class="img-circle" src="'.$OutLocal.$rows['nome'].'" /></a></div>';
							$rows=mysql_fetch_assoc($result);
						};
					}
					else if($_SESSION['view']==0){
						echo '<label for="logi">Você precisa Logar para Ver os Eventos Existentes.</label>';
					};

				};
				include 'dataout.php';

				?>
			</div>
		</div>
	</body>
</html>
