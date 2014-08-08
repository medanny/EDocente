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
   	else if ($_GET['tipo']=="insertarFacultad"){
   	$this->insertarFacultad();
   	 }
   	 else if ($_GET['tipo']=="insertarEvaluacion"){
   	$this->insertarEvaluacion();
   	 }
   
      
      }

function update(){
global $editar;
global $tools;
$editar->update($_GET['tabla'],$_GET['campo'],$_GET['value'],$_GET['where'],$_GET['id']);
$tools->safe_redirect($_GET['url']);
}

function insertarFacultad(){
global $database;
global $tools;
$nombre=$_GET['nombre'];
$matricula=$_GET['matricula'];

$database->query("INSERT INTO `Facultades` (`idFacultades`, `descripcion`, `id_Director`) VALUES (NULL, '$nombre', '$matricula')");
$tools->safe_redirect("../index.php?page=editar&tipo=facultad");
}

function insertarEvaluacion(){
global $database;
global $tools;

$periodo=$_GET['periodo'];
$encuesta=$_GET['encuesta'];
$comienza=$database->toMysqlDate($_GET['comienza']);
$termina=$database->toMysqlDate($_GET['termina']);


$database->query("INSERT INTO `Evaluacion` (`idEvaluacion`, `FechaIni`, `FechaFin`, `Periodo_idPeriodo`, `Encuestas_idEncuestas`) 
   VALUES (NULL, '$comienza', '$termina', '$periodo', '$encuesta');");
$tools->safe_redirect("../index.php?page=asignar");
}


      

   
  
};

$mainController = new MainController;

?>