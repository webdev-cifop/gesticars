<?php
session_start();
require ('acces_login.php');
$_SESSION['login'] = "";
$_SESSION['nom_role']="";
login("", $_POST['login'], $_POST['password'], "", "r");
header("Location: ./index.php");
?>