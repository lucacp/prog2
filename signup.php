<?php
	session_start();
	if (isset($_POST['enviou'])) {
		$login=$_POST['login'];
		$pass=$_POST['pass'];
		if(is_null($login)){
			$_SESSION['erro1']=1;
		}
		if(is_null($pass)){
			$_SESSION['erro2']=1;	
		}
		
	}
?>