<!DOCTYPE html>
<?php
	if(isset($_POST['posts'])){
		$root="root";
		$pass="";
		$table="myTable";
		$database="myBd";
		$mysql_
		$nome=$_POST['cname'];
		$senha=$_POST['cpass'];
		$query="SELECT name FROM passform WHERE name='$nome' AND pass='$senha';";

	}
?>
	<body>	
		<form method="post" action="">
			<tr>
				<td><label for="cNa">Nome:</label></td>
				<td><input onblur="testNull('cNa')" id="cNa" type="text" name="cname" /></td>
			</tr>
			<tr>
				<td><label for="cBD">Idade:</label></td>
				<td><input id="cBD" type="text" name="cbirth" /></td>
			</tr>
			<tr>
				<td><label for="cPw">Senha:</label></td>
				<td><input id="cPw" type="password" name="cpass" /></td>
			</tr>
			<tr>
				<td><label for="cPW">Confirmar Senha:</label></td>
				<td><input id="cPW" type="password" name="cpass2" /></td>
			</tr>
			<tr><td colspan="2" align="center"><input type="submit" name="posts" value="Enviar" /></td></tr>
		</form>
	</body>