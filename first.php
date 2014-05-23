<?php 
include("class/session.class.php");
global $session;

$check=$session->checkLogin();
if(!$check&&empty($isindex))
{

header("location:index.php?error=3");
}
if($check&&isset($isindex)){
header("location:main.php");
}
if(empty($isindex)){
global $database;
$estu_matri=$_SESSION['username'];
$sq="SELECT * FROM `Usuario` WHERE `idUsuario` = $estu_matri";
//echo $sq;
$content=$database->query($sq);
$estu=$content->fetch_assoc();
//echo $estu['tipo'];
$permiso=$estu['tipo'];}
?>
