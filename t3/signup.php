<?php
	session_start();

	if (isset($_POST['envio1'])) {
		$login=$_POST['login'];
		$pass=$_POST['pass'];
		$email=$_POST['email'];
		$cpf=$_POST['cpf'];
		if(!isset($login)){
			$_SESSION['erro']=1;
		}
		if(!isset($pass)){
			$_SESSION['erro']=2;
		}
		include_once '../database.php';
		$database="eventbase";
		mysql_select_db($database);
		$query="SELECT `id`,`nome`,`senha`,`nivel` FROM `usuario` WHERE `nome`='$login' AND `senha`=MD5('$pass');";
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
				$insert="INSERT INTO `usuario` values(null,'$login','".md5($pass)."',2,'$email','$cpf');";
				$result=mysql_query($insert,$csql);
				$query="SELECT `id`,`nome`,`senha`,`nivel` from `usuario` where `nome`='$login' and `senha`=\'MD5($pass)\';";
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
	<link rel="stylesheet" type="text/css" href="../stilo.css">
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
		function testEmail(mail){
			if(mail==""||mail==null){
				return "E-Mail nao pode estar Vazia.\n";
			}else if(mail.length<10){
				return "E-Mail deve ter mais de 10 digitos.\n";
			}
			return "";
		}
		function testCpf(cpf){
			if (cpf==""||cpf==null) {
				return "CPF nao pode estar Vazio.\n";
			}
			else if (cpf.length<11||cpf.length>11) {
				return "CPF deve possuir 11 Digitos.\n";
			};
			return "";
		}
		function valida(form){
			var fail;
			fail = testUser(form.login.value);
			fail += testPass(form.pass.value,form.pass2.value);
			fail += testEmail(form.email.value);
			fail += testCpf(form.cpf.value);
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
			echo'<span class="error">Usuario não pode estar Vazio.</span>';
		if(isset($_SESSION['erro'])&&$_SESSION['erro']==2)
			echo '<span class="error">Senha não pode ser Vazia.</span>';
		if(isset($_SESSION['erro'])&&$_SESSION['erro']==3)
			echo '<span class="error">Usuario já Cadastrado.</span>';
		?>
		<div class="eventos">
			<form method="post" action="" onsubmit="return valida(this);">
				<table class="formul">
					<tr><th colspan="2" ><h1>Registro de Usuario</h1></th></tr>
					<tr><td class="row"><label for="usuario">Usuario:</label></td><td><input id="usuario" type="text" size="30" name="login" /></td></tr>
					<tr><td class="row"><label for="senha">Senha:</label></td><td><input type="password" id="senha" name="pass" /></td></tr>
					<tr><td class="row"><label for="senha">Confirmação de Senha:</label></td><td><input type="password" id="senha" name="pass2" /></td></tr>
					<tr><td class="row"><label for="emai">E-Mail:</label></td><td><input type="text" id="emai" name="email" size="48" /></td></tr>
					<tr><td class="row"><label for="cp">CPF ou Numero de Registro:</label></td><td><input type="text" id="cp" name="cpf" size="14" /></td></tr>
					<tr><td colspan="2"><input type="submit" name="envio1" value="Enviar" /></td></tr>
				</table>
			</form>
		</div>
		<a href="logout.php">Voltar</a>
	</div>
</body>
</html>