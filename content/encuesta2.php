<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Encuesta <small>Estudiante</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						
						<li>
							<i class="fa fa-home"></i>
							<a href="#">
							Inicio </a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">
							Encuesta </a>
							<i class="fa fa-angle-right"></i>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">

			
			
<?php

global $database;
$estu_matri=$_SESSION['username'];
$sq="SELECT * FROM `Contestados` WHERE `matricula` = $estu_matri";
$result=$database->query($sq);
if($result->num_rows>=1){?>
<div class="note note-success">
<h4 class="block">Gracias! por contestar la encuesta.</h4>
<p>
 Has formado parte del grupo de estudiantes que decidio participar para mejorar tu universidad.
 </p></div>

<?php
}
else{

$q="SELECT * FROM `Carga`,`Detalle_Clase`,`Estudiante` WHERE `Estudiante_idEstudiante` = $estu_matri AND `Detalle_Clase`.`idMateria_Detalle` = `Carga`.`Detalle_Clase_idMateria_Detalle` AND `Carga`.`Estudiante_idEstudiante`=`Estudiante`.`idEstudiante`";
$content=$database->query($q);
$estudiante = $content->fetch_assoc();
?>

<div class="alert alert-info">
<?php echo "El estudiante ".$estudiante['Nombre']." ".$estudiante['A_Paterno']." ". $estudiante['A_Materno']." tiene: ".$content->num_rows." materias.";?>

</div>
<div class="note note-info">
								<h4 class="block">Evaluaci&oacute;n del alumno</h4>
								<p>
									 
1 =Totalmente en desacuerdo   2 = Desacuerdo 3 = Indeciso   4 = De acuerdo  5 = Totalmente de acuerdo
									 </p>
							</div>
	<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-coffee"></i>Encuesta
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover text-center">
<form method="post" action="insert.php">
<input type="hidden" value="<?php echo $estudiante['idEstudiante'];?> " name="matricula" />
<input type="hidden" value="<?php echo $estudiante['id_Escuela'];?> " name="escuela" />
<?php
echo "<thead>";
echo "<tr>";
echo "<th>Pregunta</th>";
$x=1;
$content2=$database->query($q);
while($rows = $content2->fetch_assoc()){
  echo "<th>";
  echo $rows['descripcion'];
  echo "</th>";
  $x++;
}
echo "</tr>";
echo "</thead>";
echo "</thead>";
echo "<tbody>";
$i="a";
$z=0;

$preguntas=10;
$materias=$content->num_rows;

$q="SELECT * FROM `Pregunta` WHERE `Encuestas_idEncuestas` = 1";
$preguntas=$database->query($q);

while($preg_array = $preguntas->fetch_assoc())
{
?>

<tr>
<td>

<?php echo $preg_array['descripcion'];?></td>
<?php
$q="SELECT * FROM `Carga`,`Detalle_Clase`,`Estudiante` WHERE `Estudiante_idEstudiante` = $estu_matri AND `Detalle_Clase`.`idMateria_Detalle` = `Carga`.`Detalle_Clase_idMateria_Detalle` AND `Carga`.`Estudiante_idEstudiante`=`Estudiante`.`idEstudiante`";
$materias=$database->query($q);

while($mat_array = $materias->fetch_assoc())
{
?>
<td>
    
<select class="form-control input-xsmall" name="<?php echo $preg_array['idPregunta']; ?>,<?php echo $mat_array['idMateria_Detalle']; ?>" required>
<option value=""> </option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
</td>
	
<?php
$z++;



	}
	echo "<tr>";
$i++;	
$z=0;
}

 ?>
 </tbody>
								</table>
							</div>
						</div>
					</div>
  <button type="submit" class="btn green">Enviar</button>

  </form>
<?php }?>