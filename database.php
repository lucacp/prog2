<?php 
	$host="localhost";
	$userMyserv="root";
	$passWords="";
	$database="eventbase";
	$csql=mysqli_connect($host,$userMyserv,$passWords,$database);
	if (mysqli_connect_errno())
	{
		echo 'A coneção com o DB não foi sucedida';
	};
	function Query($csql,$sql){
		return mysqli_query($csql,$sql);
	};
	function Associa($sql){
		return mysqli_fetch_assoc($sql);
	};

?>