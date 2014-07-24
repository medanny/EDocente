<?php
// encuesta.model.php
// Esta clase es la primera que se encarga de recoger las variables
// de session y tomar las diferentes permisos.
if(!isset($nivel_dir)){
$nivel_dir="../";	
}
include_once($nivel_dir."tutzi/class/session.class.php");
include_once($nivel_dir."tutzi/class/tools.class.php");


class Encuesta
{

var $nombre;     //Usuario
var $materias;       //Contrasena
var $id_estudiante;
var $escuela;


function Encuesta(){

	if(isset($_POST['tipo'])){
		$this->save2db();

	}
global $session;
global $tools;
global $database;
$estu_matri=$_SESSION['username'];
$q="SELECT * FROM `Carga`,`Detalle_Clase`,`Estudiante` WHERE `Estudiante_idEstudiante` = $estu_matri AND `Detalle_Clase`.`idMateria_Detalle` = `Carga`.`Detalle_Clase_idMateria_Detalle` AND `Carga`.`Estudiante_idEstudiante`=`Estudiante`.`idEstudiante`";
$content=$database->query($q);
$estudiante = $content->fetch_assoc();
$this->nombre= $estudiante['Nombre']." ".$estudiante['A_Paterno']." ". $estudiante['A_Materno'];
$this->materias=$content->num_rows;
$this->id_estudiante=$_SESSION['username'];
$this->escuela=$estudiante['id_Escuela'];

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
function getMaterias(){
global $database;
$estu_matri=$_SESSION['username'];	
$q="SELECT * FROM `Carga`,`Detalle_Clase`,`Estudiante` WHERE `Estudiante_idEstudiante` = $estu_matri AND `Detalle_Clase`.`idMateria_Detalle` = `Carga`.`Detalle_Clase_idMateria_Detalle` AND `Carga`.`Estudiante_idEstudiante`=`Estudiante`.`idEstudiante`";
$content=$database->query($q);
return $database->toArray($content);

}

function getMatCat($categoria){
global $database;
$estu_matri=$_SESSION['username'];	
$q="SELECT * FROM `Pregunta` WHERE `Encuestas_idEncuestas` = 1 AND `id_Categoria` ='".$categoria."' ORDER BY `Pregunta`.`idPregunta` ASC";
$content=$database->query($q);
return $database->toArray($content);

}

function getCategorias(){
global $database;	
$q="SELECT * FROM `Categorias` WHERE `id_Encuesta` = 1";
$cat=$database->query($q);
return $database->toArray($cat);


}

function save2db(){
global $database;
$escuela=$_POST['escuela'];
$matricula=$_POST['matricula'];

$query="INSERT INTO `Respuestas` (`idRespuestas`, `respuesta`, `T_Repuesta`, `Pregunta_idPregunta`, `Encuestas_idEncuestas`, `matricula`, `id_Detalle`) VALUES ";
$q="SELECT * FROM `Pregunta` WHERE `Encuestas_idEncuestas` = 1";
$preguntas=$database->query($q);
while($preg_array = $preguntas->fetch_assoc())
{
$q="SELECT * FROM `Carga`,`Detalle_Clase`,`Estudiante` WHERE `Estudiante_idEstudiante` = $matricula AND `Detalle_Clase`.`idMateria_Detalle` = `Carga`.`Detalle_Clase_idMateria_Detalle` AND `Carga`.`Estudiante_idEstudiante`=`Estudiante`.`idEstudiante`";
$materias=$database->query($q);
while($mat_array = $materias->fetch_assoc())
{
$id=$preg_array['idPregunta'].",".$mat_array['idMateria_Detalle'];
//echo "Respuesta de pregunta: ".$preg_array['idPregunta']." Materia: ".$mat_array['idMateria_Detalle'];
//echo " ".$_POST[$id];

$idPregunta=$preg_array['idPregunta'];
$idMateria=$mat_array['idMateria_Detalle'];
$respuesta=$_POST[$id];
$query = $query . "(NULL, '".$respuesta."', '1', '".$idPregunta."', '1', '".$matricula."', '".$idMateria."'),";

//echo $query;
}
}
if($this->disponible()==2){
$query=substr($query, 0, -1);
//echo $query;
$database->query($query);
$final_query="INSERT INTO `Contestados` (`matricula`, `id_Encuesta`, `id_Periodo`, `id_Escuela`) VALUES ('$matricula', '1', '1', '$escuela');";
$database->query($final_query);
echo $final_query;
}
else {
echo "ERROR";

}
header("location:main.php?encuesta");

}



}

$encuesta = new Encuesta();


?>