<?php 
//Models go here

if(!isset($nivel_dir)){
$nivel_dir="../";	
}
//incluir controlador.");
class Asignar{//Clase

	function Asignar(){//Constructor






	}


    function getEncuestas(){
    global $database;
    return $database->toArray($database->query("SELECT * FROM `Encuestas`"));

    }

    function getPeriodos(){
    global $database;
    return $database->toArray($database->query("SELECT * FROM `Periodo`"));

    }

    function getAsignadas(){
    global $database;
    return $database->toArray($database->query("SELECT * FROM `Evaluacion`"));

    }

    





}

$asignar = new Asignar();
?>