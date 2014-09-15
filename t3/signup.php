<?php
	session_start();
	if (isset($_POST['enviou'])) {
		$login=$_POST['login'];
		$pass=$_POST['pass'];
		if(!isset($login)){
			$_SESSION['erro1']=1;
			header("location:login.php");
		}
		if(!isset($pass)){
			$_SESSION['erro2']=1;
			header("location:login.php");
		}
		
	}
	
?>