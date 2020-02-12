<!DOCTYPE html>
<html>
	<head>
		<title>Teste</title>
		<meta charset="UTF-8">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		
		<style type="text/css">
			body{
				background: url("sakura.gif");
				background-repeat: no-repeat;
				overflow: hidden;
			}
			#wrapper{

			}
			img{
				opacity: 0.7;
			}
			#img0{
				position: absolute;
				top: 700px;
				right: 10px;
			}#img1{
				position: absolute;
				top: 600px;
				right: 40px;
			}#img2{
				position: absolute;
				top: 1000px;
				left: 60px;
			}#img3{
				position: absolute;
				top: 500px;
				left: 100px;
			}#img4{
				position: absolute;
				top: 300px;
				left: 50px;
			}#img5{
				position: absolute;
				top: 1100px;
				right: 15px;
			}
			#upside{
				/*z-index: 5;*/
			}
		</style>
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
			

		</script>
	</head>
	<body>
		<div style="position:relative" id="wrapper">
			<div id="upside">
				<table class="signup" border="0" cellpadding="2" cellspacing="5" bgcolor="#fafafa">
					<tr><td colspan="2"><center>TESTE de Login com javascript animado.</center></td></tr>
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
			<img id="img0" class="imgs animado" src="sakuram.gif" />
			<img id="img1" class="imgs animado" src="sakuram.gif" />
			<img id="img2" class="imgs animado" src="sakuram.gif" />
			<img id="img3" class="imgs animado" src="sakuram.gif" />
			<img id="img4" class="imgs animado" src="sakuram.gif" />
			<img id="img5" class="imgs animado" src="sakuram.gif" />
		</div>

	</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		
		function update(){
			for (var n = 0; n < topi.length; n++) {
				if($("#img"+n).top < -5)
					$("#img"+n).top = Math.random()*1000;
				$("#img"+n).animate({
					top:-0.1;left:Math.cos(Math.random()*Math.PI/180)+this.left
				},1);
			};
		};
		$('#img0').ready(function(){
			update();
		})
		$
	});
</script>
