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
    echo $_GET['tipo'];  
      if(isset($_GET['tipo'])){
      switch ($_GET['tipo']) {
        case "maestro":
        $this->updatemaestro();
          break;
        
        default:
          # code...
          break;
      }
    }
      
      }

function updatemaestro(){
global $editar;
global $tools;
//echo " ".$_GET['tipo']." ".$_GET['campo']." ".$_GET['value']." ".$_GET['id'];
$editar->updatemaestro($_GET['campo'],$_GET['value'],$_GET['id']);
$tools->safe_redirect("../index.php?page=editar&tipo=maestro");
}
      

   
  
};

$mainController = new MainController;

?>