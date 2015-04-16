<?php
	session_start();

	if(isset($_POST['envia'])) {
		if(isset($_SESSION['use'])){
			unset($_SESSION['use']);
			unset($_SESSION['colega']);
		};
		if(!isset($_SESSION['colega'])&&!isset($arr)) {
			$arr=$_POST['coleg'];
			$_SESSION['colega']=$arr;
		}
		else{
			$arr += $_POST['coleg'];
			$_SESSION['colega']+=$_POST['coleg'];
		}
		$size=count($_SESSION['colega']);
		$ran=rand(0,$size);
	};

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
<title>Colegas</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript">
	function validei(field){
		if(field==""||field==null){
			return "Qual Colega?";
		}
		return "";
	}
	function valida(form){
		var fail;
		fail = validei(form.coleg.value);
		if(fail==""||fail==null)
			return true;
		else{
			alert(fail);
			return false;
		}
	}
	$(document).ready(function(){
		$("#texto").click(function(){
			$("#texto:text").val(null);
		});
		$('#reseta').click(function(){
			<?php $_SESSION['use']=0; ?>
		});
	});
	</script>
</head>
<body>
	<span>Digite o nome do seu colega:</span>
	<form method="post" action="" onsubmit="return valida(this)">
		<input id="texto" name="coleg" type="text" value="Digite aqui" />
		<input  type="submit" name="envia" value="Enviar" />
		<button id="reseta">Reset</button>
	</form>
	<?php
		if(isset($_POST['envia'])){
			if(isset($_SESSION['colega'])){
				if(($_SESSION['colega']))
					echo '<span>'.'Parabéns '.$_SESSION['colega'][$ran].' você foi sorteado</span>';
				else
					echo '<span>'.'Parabéns '.$arr.'você foi sorteado</span';
			}
			else
				echo '<span>Não existe nenhum colega para mostrar </span>';
		}
	?>
	
</body>
</html>
