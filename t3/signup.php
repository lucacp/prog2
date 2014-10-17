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
		include_once '../database.php';
		$database="eventbase";
		mysql_select_db($database);
		$query="SELECT `id`,`nome`,`senha`,`nivel` FROM `usuario` WHERE `nome`='$login' AND `senha`='".md5($pass)."';";
		$result=mysql_query($query,$csql);
		$rows=mysql_fetch_assoc($result);
		if($rows>0){
			include_once '../dataout.php';
			$_SESSION['usuar']=$rows['nome'];
			$_SESSION['nivel']=$rows['nivel'];
			header('location:t3.php');
		}
		else{ 
			$query="SELECT `id`,`nome` FROM `usuario` WHERE `nome`='$login';";
			$result=mysql_query($query,$csql);
			$rows=mysql_fetch_assoc($result);
			if($rows>0){
				$_SESSION['erro']=3;
			}
			else{
				$insert="INSERT INTO `usuario` values(null,'$login',md5('$pass'),2);";
				$result=mysql_query($insert,$csql);
				$query="SELECT `id`,`nome`,`senha`,`nivel` from `usuario` where `nome`='$login';";
				$result2=mysql_query($query,$csql);
				$rows2=mysql_fetch_assoc($result2);
				include_once '../dataout.php';
				if($rows2>0){
					$_SESSION['usuar']=$rows2['nome'];
					$_SESSION['nivel']=$rows2['nivel'];
					header('location:t3.php');
				};
			};
		};
		include_once '../dataout.php';
	}else{
		unset($_SESSION['erro']);
	};
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de Usuario</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script type="text/javascript">
		function testUser(usua){
			if(usua==""||usua==null){
				return "Usuario não pode estar Vazio.\n";
			}
			else if(usua.length<4){
				return "Usuario deve possuir pelo menos 4 characteres.\n";
			}
			return "";

		}
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
			fail = testUser(form.login.value);
			fail += testPass(form.pass.value,form.pass2.value);
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
	<div class="container">
		<?php 
		if(isset($_SESSION['erro'])&&$_SESSION['erro']==1)
			echo'<span class="erro">Usuario não pode estar Vazio.</span>';
		if(isset($_SESSION['erro'])&&$_SESSION['erro']==2)
			echo '<span class="erro">Senha não pode ser Vazia.</span>';
		if(isset($_SESSION['erro'])&&$_SESSION['erro']==3)
			echo '<span class="erro">Usuario já Cadastrado.</span>';
		?>
		<form method="post" action="" onsubmit="return valida(this);">
			<table class="formul">
				<tr><th colspan="2">Ragistro de Usuario</th></tr>
				<tr><td><label for="usuario">Usuario:</label></td><td><input id="usuario" type="text" size="30" name="login" /></td></tr>
				<tr><td><label for="senha">Senha:</label></td><td><input type="password" id="senha" name="pass" /></td></tr>
				<tr><td><label for="senha">Confirmação de Senha:</label></td><td><input type="password" id="senha" name="pass2" /></td></tr>
				<tr><td colspan="2"><input type="submit" name="envio" value="Enviar" /></td></tr>
			</table>
		</form>
		<a href="../t3.php">Voltar</a>
	</div>
</body>
</html>