<?php
// persona.model.php
// Esta clase es la primera que se encarga de recoger las variables
// de session y tomar las diferentes permisos.

include_once("tutzi/class/session.class.php");
include_once("tutzi/class/tools.class.php");


class Persona
{

var $grupo;     //Usuario
var $estudiante;       //Contrasena
var $maestro;
var $dirFacultad;
var $dirEscuela;

function Persona(){
echo $isindex;
echo "HELLO WORLD";
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


function esEstudiante(){

}
function esMaestro(){

}

function grupo(){


}

function dirFacultad(){

}

function dirEscuela(){


}


}

$persona = new Persona();


?>