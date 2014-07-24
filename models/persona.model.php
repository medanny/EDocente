<?php
// persona.model.php
// Esta clase es la primera que se encarga de recoger las variables
// de session y tomar las diferentes permisos.
if(!isset($nivel_dir)){
$nivel_dir="../";	
}
include_once($nivel_dir."tutzi/class/session.class.php");
include_once($nivel_dir."tutzi/class/tools.class.php");


class Persona
{

var $grupo;     //Usuario
var $estudiante;       //Contrasena
var $maestro;
var $dirFacultad;
var $dirEscuela;
var $nombre;     //Usuario
var $materias;       //Contrasena
var $id_estudiante;
var $escuela;

function Persona(){
global $session;
global $tools;
global $database;
$check=$session->checkLogin();
if(!$check&&empty($isindex))
{


$tools->safe_redirect("index.php?error=3");
//header("location:index.php?error=3");

}

$this->getPermisos();

if($check&&isset($isindex)){

$tools->safe_redirect("index.php?page=bienvenida");	
//header("location:main.php");

}

}

function getName(){
global $session;
global $tools;
global $database;
$estu_matri=$_SESSION['username'];
$q="SELECT * FROM `Carga`,`Detalle_Clase`,`Estudiante` WHERE `Estudiante_idEstudiante` = $estu_matri AND `Detalle_Clase`.`idMateria_Detalle` = `Carga`.`Detalle_Clase_idMateria_Detalle` AND `Carga`.`Estudiante_idEstudiante`=`Estudiante`.`idEstudiante`";
$content=$database->query($q);
$estudiante = $content->fetch_assoc();
$this->nombre= $estudiante['Nombre']." ".$estudiante['A_Paterno']." ". $estudiante['A_Materno'];
return $this->nombre;
} 

function getPermisos(){
 $this->estudiante=$this->esEstudiante();
 $this->maestro=$this->esMaestro();
 $this->grupo=$this->grupo();
 $this->dirFacultad=$this->dirFacultad();
 $this->dirEscuela=$this->dirEscuela();
}

function permiso($grupo){
if($this->grupo==$grupo||$this->grupo==7){
return TRUE;
}
else {return FALSE;}

}

function printPermisos(){
echo "Maestro?".$this->maestro."<br>";
echo "Estudiante?".$this->estudiante."<br>";
echo "id Grupo".$this->grupo."<br>";
 if ($this->dirFacultad==NULL){
 	echo "Director Facultad:NO <br>";
 }else{echo "Director Faculad:".$this->dirFacultad." <br>";}
 if ($this->dirEscuela==NULL){
 	echo "Director Escuela:NO <br>";
 }else{echo "Director Escuela:".$this->dirEscuela." <br>";}
}

function esEstudiante(){
global $database;
$usuario=$_SESSION['username'];
$query="SELECT * FROM `Estudiante` WHERE `idEstudiante` = $usuario";
if($database->exist($query)){
return 1;	
}else {return 0;}

}
function esMaestro(){
global $database;
$usuario=$_SESSION['username'];
$query="SELECT * FROM `Maestro` WHERE `idMaestro` = $usuario";
if($database->exist($query)){
return 1;	
}else {return 0;}
}

function grupo(){
global $database;
$usuario=$_SESSION['username'];
//$query="SELECT * FROM `Maestro` WHERE `idMaestro` = = $usuario";
return $database->selectSingleField("Usuario","grupo","idUsuario",$usuario);

//$result=$database->query($query);
//$result=$database->toArray($result);
//return $result['grupo'];
}

function dirEscuela(){
global $database;
$usuario=$_SESSION['username'];
$query="SELECT * FROM `Escuelas` WHERE `id_Director` = $usuario";
if($database->exist($query)){
return $database->selectSingleField("Escuelas","idEscuelas","id_Director",$usuario);	
}
else {return NULL;}
}

function dirFacultad(){
global $database;
$usuario=$_SESSION['username'];
$query="SELECT * FROM `Facultades` WHERE `id_Director` = $usuario";
if($database->exist($query)){
return $database->selectSingleField("Facultades","idFacultades","id_Director",$usuario);
}
else {return NULL;}

}


}

$persona = new Persona();


?>