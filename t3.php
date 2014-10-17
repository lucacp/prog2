<?php
	session_start();
	if (isset($_SESSION['usuario'])) {
		header('location:t3/index.php');
	}
	if(isset($_POST['enviou'])){
		$login=$_POST['login'];
		$pass=$_POST['pass'];
		
	}else{

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
			});
		</script>
	</head>
	<body>
		<div class="container">
			<div id="cabeca">
				<a href="t3/signup.php">Cadastre-se</a>
				<form method="post" action="t3/signup.php" onSubmit="return testValid(this)">
					<span>Login:</span>
					<input type="text" id="logi" name="login" size="8" class="validate[required]" />
					<span>Senha:</span>
					<input type="password" name="pass" size="10" />
					<input type="submit" name="envio" value="Enviar" />
				</form>
			</div>
			<div class="eventos">
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
						for($i=1;$rows&&$i<=5;$i++){
							echo '<div class="ev'.$i.'"><a href=""><img src="'.$OutLocal.$rows['nome'].'" /></a></div>';
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
