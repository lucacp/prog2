<?php
	session_start();
?>
<html>
	<head>
		<title>Registro de eventos gerais</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="stilo.css">
		<script type="text/javascript">
			function testNull(name,id){
				if(id==""||id==null)
					return name+" Invalido";
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
			<?php 

				if(!isset($_SESSION['usuario'])){ 
					echo '<div id="cabeca">
							<form method="post" action="" onSubmit="return testValid(this)">
								<span>Login:</span>
								<input type="text" name="login" size="8" />
								<span>Senha:</span>
								<input type="password" name="pass" size="10" />
								<input type="submit" name="enviou" value="Enviar" />
							</form>
						</div>';
				}?>
			<div class="eventos">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>
	</body>
</html>
