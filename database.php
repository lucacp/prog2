<?php 
	$host="localhost";
	$userMyserv="root";
	$passWords="";
	$csql=mysql_connect($host,$userMyserv,$passWords);
	if (mysqli_connect_errno())
	{
		echo 'A coneção com o DB não foi sucedida';
	};
?>