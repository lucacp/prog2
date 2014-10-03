<?php 
session_start();
session_destroy();
header('location:../t3.php');
?>