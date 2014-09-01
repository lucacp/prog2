<!DOCTYPE html>
<html>
	<head>
		<title>Teste</title>
		<meta charset="UTF-16LE">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript">
			function testNull(id){
				var x=document.getElementById(id).blur();
				if(x==null||x==""){
					return "Campo Obrigatório.\\n";
				}
				return "";
			}
			function testPass(id,id2){
				var x=document.getElementById(id);
				var y=document.getElementById(id2).blur();
				if(x==y){
					return "Senha deve ser igual.\\n";
				}
				return "";	
			}
			function validateName(field){
				if(field == "") return "No Name was entered.\n";
				return "";
			}
			function validateAge(field){
				if(isNaN(field)) return "No Age was entered.\n";
				if(field<18||field>110) return "Age must be between 18 and 110.\n";
				return "";
			}
			function validatePW(field){
				if(field == "") return "No Password was entered.\n";
				else if (field.length<6)
					return "Passwords must be at least 6 characters.\n";
				else if(!/[a-z]/.test(field)||!/[A-Z]/.test(field) || ! /[0-9]/.test(field))
					return "Passwords require one each of a-z, A-Z and 0-9.\n";
				return "";
			}
			function validatePW2(field1,field2){
				if(field1==field2)
					return "";
				return "Passwords is no equals.\n";
			}
			function testeValid(form){
				var fail;
				fail = validateName(form.cname.value);
				fail += validateAge(form.cbirth.value);
				fail += validatePW(form.cpass.value);
				fail += validatePW2(form.cpass.value,form.cpass2.value);
				if(fail == "") 
					return true;
				else{
					alert(fail);
					return false;
				}
			}
			$(document).ready(function(){
				$('img').ready(function ani(){
				if($('img').top<'0px')
					$('img').top='600px';
				$('img').animate({
					top:'-=4px'
				},"fast");
				ani();
				});
			});
		</script>
		<style type="text/css">
			body{
				background: url("sakura.gif");
			}
			img{
				opacity: 0.5;
			}
			.img0{
				position: absolute;
				top: 600px;
				left: 0px;
			}.img1{
				position: absolute;
				top: 400px;
				left: 800px;
			}.img2{
				position: absolute;
				top: 100px;
				left: 300px;
			}.img3{
				position: absolute;
				top: 500px;
				left: 100px;
			}.img4{
				position: absolute;
				top: 300px;
				left: 0px;

			}
		</style>
	</head>
	<body>
		<div style="position:relative" id="wrapper">
			<div>
				<table class="signup" border="0" cellpadding="2" cellspacing="5" bgcolor="#fafafa">
					<th colspan="2" align="center">Signup Form</th>
					<form method="post" action="" onSubmit="return testeValid(this)">
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
				</table>
			</div>
			<img class="img1" src="sakuram.gif" />
			<img class="img2" src="sakuram.gif" />
			<img class="img3" src="sakuram.gif" />
			<img class="img4" src="sakuram.gif" />
			<img class="img0" src="sakuram.gif" />
			
		</div>
	</body>
</html>
