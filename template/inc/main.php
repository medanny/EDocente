<?php
//SETUP
$title="main";//TITULO
//$isindex=1; //ABILITAR SI ES LOGIN
include("template/inc/head.template.php");
include("template/inc/header.template.php");
include("template/inc/sidebar.template.php");
include("template/inc/contstart.template.php");
//CONTENT HERE       

if(isset($_GET["ejercisios"])){
      include("content/ejercisio.php");  
      }
if (empty($_GET["ejercisios"])) {

      include("content/bienvenido.php"); 
    }


if(isset($_GET["cuentas"])){
      include("content/cuentas.php");  
      }
if(isset($_GET["reportes"])){
      include("content/reportes.php");  
      }



?> 

           
<?php
include("template/inc/contend.template.php");
?>
