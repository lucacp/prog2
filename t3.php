<?php
	session_start();
	if (isset($_SESSION['usuario'])) {
		header('location:t3/index.php');
	}
?>
<html>
	<head>
		<title>Registro de eventos gerais</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="stilo.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		<script type="text/javascript">
			function testNull(name,id){
				if(id==""||id==null)
					return name+" Invalido.\n";
				else
					return "";
			}
			function testValid(form){
				var fail;
				fail = testNull("Usuario",form.login.value);
				fail += testNull("Senha",form.pass.value);
				if(fail == "")
					return true;
				else{
					alert(fail);
					return false;
				}

			}
		</script>
	</head>
	<body>
		<div id="wrapper">
			<div id="cabeca">
				<a href="signup.php">Cadastre-se</a>
				<form method="post" action="" onSubmit="return testValid(this)">
					<span>Login:</span>
					<input type="text" name="login" size="8" />
					<span>Senha:</span>
					<input type="password" name="pass" size="10" />
					<input type="submit" name="enviou" value="Enviar" />
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
