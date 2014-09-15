<?php
	session_start();
	if (isset($_SESSION['usuario'])) {
		header('location:index.php');
	}
	if(isset($_POST['enviou'])){
		
	}
?>
<html>
	<head>
		<title>Pagina de Login</title>
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
			<div id="signup">
				<a href="signup.php">Cadastre-se</a>
				<form method="post" action="" onSubmit="return testValid(this)">
					<label for="log">Login:</label>
					<input id="log" type="text" name="login" size="8" />
					<label for="pw">Senha:</label>
					<input id="pw" type="password" name="pass" size="10" />
					<input type="submit" name="enviou" value="Enviar" />
				</form>
			</div>
		</div>
	</body>
</html>
