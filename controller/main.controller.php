<?php
/**
 * Process.php
 * 
 * Esta clase cumple con el trabajo de procesar todas las formas.
 * */
if(!isset($nivel_dir)){
$nivel_dir="../";  
}
include($nivel_dir."models/editar.model.php");
include_once($nivel_dir."tutzi/class/tools.class.php");

class MainController
{
   /* Constructor de clase */
   function MainController(){
   if($_GET['tipo']=="update"){
   	$this->update();
   	 } 
   
      
      }

function update(){
global $editar;
global $tools;
$editar->update($_GET['tabla'],$_GET['campo'],$_GET['value'],$_GET['where'],$_GET['id']);
$tools->safe_redirect($_GET['url']);
}


      

   
  
};

$mainController = new MainController;

?>