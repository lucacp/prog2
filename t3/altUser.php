<?php
	session_start();
	if (!isset($_SESSION['usuar'])) {
		header('location:../t3.php');
	}
	else if ($_SESSION['nivel']>2) {
		header('location:t3.php');
	};
	if (isset($_POST['envio'])) {
		unset($_SESSION['erro']);
		$useri=$_POST['user'];
		if ($useri==""||$useri==null||$useri!=$_SESSION['usuar']) {
			$useri=$_SESSION['usuar'];
		};
		$passA=$_POST['old0'];
		$passN1=$_POST['old1'];
		$passN2=$_POST['old2'];
		if ($passN1!=$passN2) {
			$_SESSION['erro']=1;
		}
		else{
			include_once '../database.php';
			//echo $useri;
			$query3="SELECT `id`,`nome`,`nivel` FROM `usuario` WHERE `id`='$useri';";
			$result1=Query($query3);
			$rows=Associa($result1);
			if ($rows>0) {
				$user=$rows['id'];
				$query1="UPDATE `usuario` SET `senha`='$passN1' WHERE `id`='$useri';";
				$result1=Query($csql,$query1);
				$query="SELECT `id`,`nome`,`senha`,`nivel` from `usuario` where `id`='$useri' and `senha`='$passN1';";
				$result=Query($csql,$query);
				$rows2=Associa($result);
				if ($rows2>0) {
					echo 'OK';
				}
				else{
					$_SESSION['erro']=2;
				};
			}
			else{
				$_SESSION['erro']=3;
			};
			include_once '../dataout.php';
		};
	}
	else{
		unset($_SESSION['erro']);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<title>Altera Perfil</title>
		<script type="text/javascript">
		function testPass(x,y){
			if(x==""||x==null){
				return "primeira senha não pode estar vazia.\n";
			};
			if(y==""||y==null){
				return "segunda senha não pode estar vazia.\n";
			};
			if(x.length<6){
				return "A Senha deve possuir pelo menos 6 characteres.\n";
			};
			if(x!=y){
				return "Senha deve ser igual.\n";
			};
			return "";	
		}
		function valida(form){
			var fail;
			fail = testPass(form.old1.value,form.old2.value);
			if(fail==""||fail==null){
				return true;
			}
			else{
				alert(fail);
				return false;
			}
		}
		</script>
	</head>
	<body>
		<div id="wrapper">
			<form method="post" action="" onsubmit="return valida(this);">
				<div class="container">
					<?php if (isset($_SESSION['erro'])) {
						if ($_SESSION['erro']==1) {
							echo '<span>As senhas nao correspondem!.</span>';
						}
						else if ($_SESSION['erro']==2) {
							echo 'Erro de Alteracao! Digite Novamente.';
						}
						else if($_SESSION['erro']==3){
							echo 'Erro na Busca';
						}
					}
					echo '<input type="hidden" name="user" value="'.$_SESSION['usuar'].'" />';?>
					<h1>Alterar Senha:</h1><br />
					<label for="old">Senha Atual:</label>
					<input type="password" id="old" size="31" name="old0" /><br />
					<label for="new1">Senha Nova:</label>
					<input type="password" id="new1" size="31" name="old1" /><br />
					<label for="new2">Confirma Senha Nova:</label>
					<input type="password" id="new2" size="31" name="old2" />
					<input type="submit" name="envio" value="Enviar" /><br />
					<a href="t3.php">Voltar</a>
				</div>
			</form>
		</div>
	</body>
</html>