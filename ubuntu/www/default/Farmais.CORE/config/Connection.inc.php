<?php
  $host = "mysql05-farm19.uni5.net";
	$port = "3306";
	$dbname = "lfgmsoftwares";
	$user = "lfgmsoftwares";
	$password = "lfgmsoftwares";
	$con = mysqli_connect($host  ,$user,$password) or die("Não foi Possível Conectar");
  $db_selected = mysqli_select_db($con,$dbname);   
  
  if (!$db_selected) {
    die ('Não pode selecionar o banco farmais : ' . mysql_error());
  }
  
  $raioKM = 2; 
?>