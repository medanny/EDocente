<?php 
//Models go here
if(!isset($nivel_dir)){
$nivel_dir="../";  
}
include ($nivel_dir."models/reporte.model.php");

class Reporte_Controller{//Clase



	function Reporte_Controller(){//Constructor


	}
  
  function getDatosMaestro($id){
  global $reporte;
  return $reporte->getDatosMaestro($id);
  }

  function getPromedioMaestro($id){
   global $reporte;
   return $reporte->getPromedioMaestro($id);
  }    

  function getPromedioEscuela($pregunta,$escuela){
   global $reporte;
   return $reporte->getPromedioEscuela($pregunta,$escuela);
  }

  function getPromedioUniversidad($pregunta){
  global $reporte;
   return $reporte->getPromedioUniversidad($pregunta);
  }

  function datosDisponibles($id){
   global $reporte;
   return $reporte->datosDisponibles($id);
  }



  }


$reporte_controller = new Reporte_Controller();
?>