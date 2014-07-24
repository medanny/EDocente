<?php 
if(!isset($nivel_dir)){
$nivel_dir="../";	
}
include_once ($nivel_dir."models/encuesta.model.php");
include_once ($nivel_dir."tutzi/class/template.class.php");

//contenido

global $encuesta;
global $template;
global $database;
$disponible=$encuesta->disponible();
if($disponible==1){

echo "Gracias por contestar la encuesta.";
}
else{
$string1 = "Bienvenido ". $encuesta->nombre."<br>"."Usted tiene: ".$encuesta->materias." Materias.";
echo $template->mostrarAdvertencia("exito", $string1);

?>

<form method="post" action="models/encuesta.model.php">
<input type="hidden" value="<?php echo $encuesta->id_estudiante;?> " name="matricula" />
<input type="hidden" value="<?php echo $encuesta->escuela;?> " name="escuela" />
<input type="hidden" value="encuesta" name="tipo" />
<?php

$rows= $encuesta->getCategorias();
foreach ( $rows as $cate ) {



   $no_catm=$cate['NombreCategoria'];
   $idCate=$cate['id_Categoria']."<br>";

?>

<div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title"><?php echo $no_catm=$cate['NombreCategoria'];?></h3>
                                </div>
                                <div class="box-body">





<div class="table-responsive">
								<table class="table table-bordered table-hover text-center">

<?php
echo "<thead>";
echo "<tr>";
echo "<th>Pregunta</th>";
$x=1;

$content=$encuesta->getMaterias();

foreach ( $content as $rows ) {
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
$materias=$encuesta->materias;

$array1=$encuesta->getMatCat($idCate);
foreach ( (array) $array1 as $preg_array ) {

?>

<tr>
<td>

<?php echo $preg_array['descripcion'];?></td>
<?php


$materias=$encuesta->getMaterias();

foreach ( $materias as $mat_array ) {
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
						



                                    
                                </div><!-- /.box-body -->
</div>
<?php

}
?>
 <button type="submit" class="btn green">Enviar</button>

  </form>
<?php
}
?>




<?php
?>