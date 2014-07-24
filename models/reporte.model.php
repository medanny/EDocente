<?php 
//Models go here
if(!isset($nivel_dir)){
$nivel_dir="../";    
}
include_once($nivel_dir."models/persona.model.php");
class Reporte{//Clase

    var $html;

	function Reporte(){//Constructor

    }

	
	function getDatosMaestro($id){
  global $database;
  return $database->toarray($database->query("SELECT * FROM `Maestro` WHERE `idMaestro` = $id"));
  } 
    function getPromedioMaestro($id){
       global $database; 
    $query="SELECT Pregunta_idPregunta, Pregunta.descripcion, AVG(respuesta) as promedio 
    FROM Detalle_Clase, Respuestas, Pregunta where id_Detalle = idMateria_Detalle 
    and Pregunta_idPregunta=idPregunta and Maestro_idMaestro = $id group by Pregunta_idPregunta ";
    return $database->toarray($database->query($query));

    }

    function datosDisponibles($id){
   global $database; 
    $query="SELECT Pregunta_idPregunta, Pregunta.descripcion, AVG(respuesta) as promedio 
    FROM Detalle_Clase, Respuestas, Pregunta where id_Detalle = idMateria_Detalle 
    and Pregunta_idPregunta=idPregunta and Maestro_idMaestro = $id group by Pregunta_idPregunta ";
    if(!$database->query($query)){
        return FALSE;
    }else {
        return TRUE;
    }
  }

    function getPromedioEscuela($pregunta,$escuela){
        global $database;
        $query="SELECT AVG(respuesta) as promedio FROM Detalle_Clase, Respuestas, Pregunta, Maestro where id_Detalle = idMateria_Detalle and Pregunta_idPregunta=idPregunta and Pregunta_idPregunta=$pregunta and `Detalle_Clase`.`Maestro_idMaestro` = `Maestro`.`idMaestro` and `Maestro`.`id_escuela`=$escuela group by Pregunta_idPregunta";
        return $database->singleField($query);
    }
    function getPromedioUniversidad($pregunta){  
        global $database;
        $query="SELECT AVG(respuesta) as promedio FROM Detalle_Clase, Respuestas, Pregunta where id_Detalle = idMateria_Detalle and Pregunta_idPregunta=idPregunta and Pregunta_idPregunta= $pregunta group by Pregunta_idPregunta";

        return $database->singleField($query);

    }
    
    function htmladd($html){
        $this->html=$this->html.$html;

    }
    






	
}

$reporte = new Reporte();
?>