<?php 
	$host="localhost";
	$user="root";
	$pass="";
	$csql=mysql_connect($host,$user,$pass);
	if (mysqli_connect_errno())
	{
		echo 'A coneção com o DB não foi sucedida';
	};
?>