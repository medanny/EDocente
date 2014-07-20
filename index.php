<?php 
include ("tutzi/class/template.class.php");



if(isset($_GET["page"])){

include_once ("tutzi/class/session.class.php");
include ("view/inc/head.php");
include ("view/inc/header.php");
include ("view/inc/content.php");

include ("view/".$_GET["page"].".view.php");


include ("view/inc/foot.php");

} else {
include("view/login.view.php");
}

?>