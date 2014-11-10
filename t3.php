<?php
	session_start();
	if (isset($_POST['envio'])) {
		$login=$_POST['login'];
		$pass=$_POST['pass'];
		if(!isset($login)){
			$_SESSION['erro']=1;
		}
		if(!isset($pass)){
			$_SESSION['erro']=2;
		}
		include_once 'database.php';
		$database="eventbase";
		mysql_select_db($database);
		$query="SELECT `id`,`nome`,`senha`,`nivel` FROM `usuario` WHERE `nome`='$login' AND `senha`=MD5('$pass');";
		$result=mysql_query($query,$csql);
		$rows=mysql_fetch_assoc($result);
		include_once 'dataout.php';
		if($rows>0){
			$_SESSION['usuar']=$rows['nome'];
			$_SESSION['nivel']=$rows['nivel'];
			header('location:t3.php');
		}else{
			$_SESSION['erro']=4;
			
		}
	};
	if (isset($_SESSION['usuario'])) {
		header('location:t3/index.php');
	}
	else{
		include_once 'database.php';
		$database="eventbase";
		mysql_select_db($database);
		$query="SELECT `nome` FROM `evento` where `nivel`>='2';";
		$result=mysql_query($query,$csql);	
	};
	
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
				$('input').focus(function(){
					$(this).css("background-color","ff0000");
				});
				$('input').blur(function(){
					$(this).css("background-color","ffffff")
				});
				function alerta(id){
					if (id==4) {
						alert("Senha Incorreta");
					};
				}
			});
		</script>
	</head>
	<body>
		<div class="container">
			<div id="cabeca">
				<a href="t3/signup.php">Cadastre-se</a>
				<form method="post" action="" onSubmit="return testValid(this)">
					<div><?php if (isset($_SESSION['erro'])) {
					if ($_SESSION['erro']==4) {
						$i=$_SESSION['erro'];
						function alerta($i);
					};
				}?></div>
					<span>Login:</span>
					<input type="text" id="logi" name="login" size="8" class="validate[required]" />
					<span>Senha:</span>
					<input type="password" name="pass" size="10" />
					<input type="submit" name="envio" value="Enviar" />
				</form>
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
							echo '<div class="ev'.$i.'"><a href="?event='.$i.'"><img src="'.$OutLocal.$rows['nome'].'" /></a></div>';
							$rows=mysql_fetch_assoc($result);
						};
					}
					else if($_SESSION['view']==0){
						echo '<label for="logi">Você precisa Logar para Ver os Eventos Existentes.</label>';
					};

				};
				include_once 'dataout.php';

				?>
			</div>
		</div>
	</body>
</html>
