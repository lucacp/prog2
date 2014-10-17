<?php
	session_start();
	if (!isset($_SESSION['usuar'])) {
		header('location:../t3.php');
	}
	else if ($_SESSION['nivel']>2) {
		header('location:t3.php');
	};
	if (isset($_POST['envio'])) {
		
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<title>Altera Usuario</title>
	</head>
	<body>
		<div id="wrapper">
			<form method="post" action="">
				<div>
					<?php echo '<input type="hidden" name="user" value="'.$_SESSION['usuar'].'" />';?>
					<span>Alterar Senha:</span>
					<label for="old">Senha Atual:</label>
					<input type="password" id="old" size="31" name="old0" />
					<label for="new1">Senha Nova:</label>
					<input type="password" id="new1" size="31" name="old1" />
					<label for="new2">Confirma Senha Nova:</label>
					<input type="password" id="new2" size="31" name="old2" />
					<input type="submit" name="envio" value="Enviar" />
				</div>
			</form>
		</div>
	</body>
</html>