<?php 
include("class/database.class.php");
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
$query=substr($query, 0, -1);
//echo $query;
$database->query($query);
$final_query="INSERT INTO `Contestados` (`matricula`, `id_Encuesta`, `id_Periodo`, `id_Escuela`) VALUES ('$matricula', '1', '1', '$escuela');";
$database->query($final_query);
//echo $final_query;
header("location:main.php?encuesta");
?>