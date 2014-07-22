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

function Persona(){
global $session;
global $tools;
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

function getPermisos(){
 $this->estudiante=$this->esEstudiante();
 $this->maestro=$this->esMaestro();
 $this->grupo=$this->grupo();
 $this->dirFacultad=$this->dirFacultad();
 $this->dirEscuela=$this->dirEscuela();
}

function permiso($grupo){
if($this->grupo==$grupo||$grupo=7){
return 1;
}
else {return 2;}

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
$query="SELECT * FROM `Maestro` WHERE `idMaestro` = = $usuario";
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

function dirFacultad(){
global $database;
$usuario=$_SESSION['username'];
$query="SELECT * FROM `Escuelas` WHERE `id_Director` = $usuario";
if($database->exist($query)){
return $database->selectSingleField("Escuelas","id_Escuelas","id_Director",$usuario);	
}
else {return NULL;}
}

function dirEscuela(){
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