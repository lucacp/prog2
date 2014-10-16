<?php
	session_start();
	if (isset($_SESSION['usuario'])) {
		header('location:t3/index.php');
	}
	if(isset($_POST['enviou'])){
		$login=$_POST['login'];
		$pass=$_POST['pass'];
		$root="root";
		$pas="";
		$database="teste";
		$db=mysql_connect($root,$pas,$database);
		
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Registro de eventos gerais</title>
		<meta charset="UTF-8" />
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
		<div id="wrapper">
			<div id="cabeca">
				<a href="t3/signup.php">Cadastre-se</a>
				<form method="post" action="t3/signup.php" onSubmit="return testValid(this)">
					<span>Login:</span>
					<input type="text" name="login" size="8" class="validate[required]" />
					<span>Senha:</span>
					<input type="password" name="pass" size="10" />
					<input type="submit" name="envio" value="Enviar" />
				</form>
			</div>
			<div class="eventos">
				<h1 id="tit">Eventos</h1>
				<div class="ev1"><a href=""><img src="sakuram.gif" /></a></div>
				<div class="ev2"><a href=""><img src="sakura.gif" /></a></div>
				<div class="ev3"><a href=""><img src="sakuram.gif" /></a></div><br />
				<div class="ev1"><a href=""><img src="sakura.gif" /></a></div>
				<div class="ev2"><a href=""><img src="sakuram.gif" /></a></div>
			</div>
		</div>
	</body>
</html>
