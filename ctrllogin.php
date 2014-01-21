<?php
session_start();
require ('acces_login.php');
$_SESSION['login'] = "";
$_SESSION['nom_role']="";
$txt = login("", $_POST['login'], $_POST['password'], "", "r");
if($txt != ""){
	echo $txt;
}
else
header("Location:./index.php");
?>