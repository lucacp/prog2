<?php
	session_start();
	if (!isset($_SESSION['usuar'])) {
		header('location:../t3.php');
	}
	else if ($_SESSION['nivel']>=2) {
		header('location:t3.php');
	}
	if (isset($_POST['submit'])) {
  	$Exts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["arquiv"]["name"]);
	$extension = end($temp);
	if ((($_FILES["arquiv"]["type"] == "image/gif")
		|| ($_FILES["arquiv"]["type"] == "image/jpeg")
		|| ($_FILES["arquiv"]["type"] == "image/jpg")
		|| ($_FILES["arquiv"]["type"] == "image/png"))
		&& in_array($extension, $Exts))
	{
		$ext=explode("/", $_FILES["arquiv"]["type"]);
		$Ext=end($ext);
		if ($_FILES["arquiv"]["error"] > 0)
	  	{
	 	 	echo "Error: " . $_FILES["arquiv"]["error"] . "<br>";
		}
		else
		{
			if (file_exists("upload/" . $_FILES["arquiv"]["name"]))
		    {
		    	echo "Ok<br />";
		    }
		    else
		    {
			    move_uploaded_file($_FILES["arquiv"]["tmp_name"],
			    "upload/" . $_FILES["arquiv"]["name"]);
			};
			$arq='upload/'.$_FILES["arquiv"]["name"];
		};
	}
	else
	{
		echo "arquivo não está com uma extenção permitida";
	};
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Criar Evento</title>

	</head>
	<body>
		<div id="wrapper">
			<form method="post" action="" name="teste" enctype="multipart/form-data" >

			</form>
		</div>
	</body>
</html>