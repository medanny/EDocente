<?php 
//Models go here


include_once($nivel_dir."tutzi/class/session.class.php");
include_once($nivel_dir."tutzi/class/tools.class.php");
class Buscar{//Clase


	function Buscar(){//Constructor






	}


	function buscarMaestros($palabras){
    global $database;


    if(empty($palabras)){
    	echo "NO SE ENCONTRO NINGUNA PALABARA!";
    }
    $partes = explode(" ",trim($palabras));
    $clauses=array();
    foreach ($partes as $part){
    $clauses[]="`idMaestro` LIKE '%" . $part . "%'";
    $clauses[]="`Nombre` LIKE '" . $part . "%'";
    $clauses[]="`A_Paterno` LIKE '%" . $part . "%'";
    $clauses[]="`A_Materno` LIKE '%" . $part . "%'";
    $clauses[]="`id_escuela` LIKE '%" . $part . "%'";

    }

    $clause=implode(' OR ' ,$clauses);

    $query="SELECT * FROM `Maestro` WHERE  $clause";
    //echo $query;
    return $database->toArray($database->query($query));
	

	}

	function buscarEstudiante($palabras){
    global $database;

    if(empty($palabras)){
    	echo "NO SE ENCONTRO NINGUNA PALABARA!";
    }
    $partes = explode(" ",trim($palabras));
    $clauses=array();
    foreach ($partes as $part){
    $clauses[]="`idEstudiante` LIKE '%" . $part . "%'";
    $clauses[]="`Nombre` LIKE '" . $part . "%'";
    $clauses[]="`A_Paterno` LIKE '%" . $part . "%'";
    $clauses[]="`A_Materno` LIKE '%" . $part . "%'";
    $clauses[]="`id_Escuela` LIKE '%" . $part . "%'";

    }

    $clause=implode(' OR ' ,$clauses);

    $query="SELECT *  FROM `Estudiante` WHERE $clause";
    return $database->toArray($database->query($query));
	}


	function yaContesto($matricula){
	global $database;
	return $database->exist("SELECT *  FROM `Contestados` WHERE `matricula` = $matricula");	


	}
	

}

$buscar = new Buscar();
?>