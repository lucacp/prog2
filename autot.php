<!DOCTYPE html>
<html>
	<head>
		<title>Teste</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		
		<style type="text/css">
			body{
				overflow: hidden;
			}
			#wrapper{

			}
			img{
				opacity: 0.7;
			}
			#imgf{
				position: absolute;
				width: 100px;
				height: 100px;
				z-index: -1;
				animation: anibak 10s linear infinite;
			}@keyframes anibak {
				0%  {top: 25vw;left: 50vw;							}
				20% {top: -2vw;left: -5vw;transform:rotate(0deg);	}
				40% {top: -2vw;left: 94vw;transform:rotate(-540deg);}
				60% {top: 40vw;left: 94vw;transform:rotate(-180deg);}
				80% {top: 40vw;left: -5vw;transform:rotate(-720deg);}
				100%{top: 25vw;left: 50vw;							}
			}
			#img0{
				position: absolute;
				animation: anione 10s linear infinite;
			}@keyframes anione {
				0%   { top: 50vw; right:1vw;}
				50%  { top: 20vw; right:3vw;transform:rotate(180deg);}
				100% { top:-10vw; right:5vw;transform:rotate(360deg);}
			}#img5{
				position: absolute;
				animation: anisix 10s linear infinite;
			}@keyframes anisix {
				0%   { top:50vw; right: 3vw;}
				50%  { top:15vw; right:15vw;transform:rotate(180deg);}
				100% { top:-5vw; right:30vw;transform:rotate(360deg);}
			}#img1{
				position: absolute;
				animation: anitwo 10s linear infinite;
			}@keyframes anitwo {
				0%   { top:50vw; right:  2vw;}
				50%  { top:20vw; right: 50vw;transform:rotate(180deg);}
				100% { top:-3vw; right:100vw;transform:rotate(360deg);}
			}#img2{
				position: absolute;
				animation: anithr 10s linear infinite;
			}@keyframes anithr {
				0%   { top:50vw; left:  6vw;}
				50%  { top:20vw; left: 60vw;transform:rotate(180deg);}
				100% { top:-3vw; left:100vw;transform:rotate(360deg);}
			}#img3{
				position: absolute;
				animation: anifor 10s linear infinite;
			}@keyframes anifor {
				0%   { top: 50vw; left:10vw;}
				50%  { top: 20vw; left:25vw;transform:rotate(180deg);}
				100% { top: -7vw; left:40vw;transform:rotate(360deg);}
			}#img4{
				position: absolute;
				animation: anifiv 10s linear infinite;
			}@keyframes anifiv {
				0%   { top: 50vw; left:3vw;}
				50%  { top: 15vw; left:5vw;transform:rotate(180deg);}
				100% { top:-10vw; left:8vw;transform:rotate(360deg);}
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
			
			//$(document).ready(function(){
/*				topi    = [];
				topi[0] = $('#img0').top;
				topi[1] = $('#img1').top;
				topi[2] = $('#img2').top;
				topi[3] = $('#img3').top;
				topi[4] = $('#img4').top;
				topi[5] = $('#img5').top;*/
				/*function update(img){
					$(img).animate({top:"-5vw"},5000,function(){
						$(this).left-=(Math.cos(($(img).top%360)*Math.PI/180))+"vw";
						$(this).top-=window.innerWidth/2+100+"px";
					});
				};
		//		;left:Math.cos(($(img).top%360)*Math.PI/180)*window.innerWidth+$(img).left
				$('#img0').ready(function(){
					update("#img0");
					while($('#img0').top>'0vw'){
						update("#img0");
						$('#img0').css('top','9vw');
					}
				});
				$('#img1').ready(function(){
					update("#img1");
					while($('#img1').top>'0vw'){
						update("#img1");
						$('#img1').css('top','10vw');
					}
				});
				$('#img2').ready(function(){
					update("#img2");
					while($('#img2').top<'0vw'){
						update("#img2");
						$('#img2').css('top','12vw');
					}
				});
				$('#img3').ready(function(){
					update("#img3");
					while($('#img3').top=='-5vw'){
						$('#img3').css('top','15vw');
						update("#img3");
					}
				});
				$('#img4').ready(function(){
					update("#img4");
					while($('#img4').top<'0vw'){
						update("#img4");
						$('#img4').css('top','18vw');
					}
				});
				$('#img5').ready(function(){
					update("#img5");
					while($('#img5').top<'0vw'){
						update("#img5");
						$('#img5').css('top','20vw');
					}
				});*/

			//});

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
			<img id="imgf" class="imgs" src="sakura.gif" />
			<img id="img0" class="imgs" src="sakuram.gif" />
			<img id="img1" class="imgs" src="sakuram.gif" />
			<img id="img2" class="imgs" src="sakuram.gif" />
			<img id="img3" class="imgs" src="sakuram.gif" />
			<img id="img4" class="imgs" src="sakuram.gif" />
			<img id="img5" class="imgs" src="sakuram.gif" />
		</div>

	</body>
</html>
