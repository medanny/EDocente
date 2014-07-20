<?php
// encuesta.model.php
// Esta clase es la primera que se encarga de recoger las variables
// de session y tomar las diferentes permisos.

include_once("tutzi/class/session.class.php");
include_once("tutzi/class/tools.class.php");


class Encuesta
{

var $nombre;     //Usuario
var $materias;       //Contrasena

function Encuesta(){
global $session;
global $tools;
global $database;
$estu_matri=$_SESSION['username'];
$q="SELECT * FROM `Carga`,`Detalle_Clase`,`Estudiante` WHERE `Estudiante_idEstudiante` = $estu_matri AND `Detalle_Clase`.`idMateria_Detalle` = `Carga`.`Detalle_Clase_idMateria_Detalle` AND `Carga`.`Estudiante_idEstudiante`=`Estudiante`.`idEstudiante`";
$content=$database->query($q);
$estudiante = $content->fetch_assoc();
$this->nombre= $estudiante['Nombre']." ".$estudiante['A_Paterno']." ". $estudiante['A_Materno'];
$this->materias=$content->num_rows;

}

function disponible(){
global $session;
global $tools;
global $database;
$estu_matri=$_SESSION['username'];
$sq="SELECT * FROM `Contestados` WHERE `matricula` = $estu_matri";
$result=$database->query($sq);
if($result->num_rows>=1){
return 1;

}

else{
return 2;
}

}

function getCategorias(){
global $database;	
$q="SELECT * FROM `Categorias` WHERE `id_Encuesta` = 1";
$cat=$database->query($q);
return $database->toArray($cat);


}



}

$encuesta = new Encuesta();


?>