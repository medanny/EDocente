<?php
/**
 * Editar.php
 * Esta vista es para editar los diferentes, catalogos, recibe variables GET del url y las manda al controlador.
 * primero busca acciones y luego tipo.
 */
//Si aun no se define nivel dir definirlo a este directorio.
if(!isset($nivel_dir)){
$nivel_dir="../";	
}
//incluir controlador.
include ($nivel_dir."controller/reporte.controller.php");
//variable global del controlador
global $reporte_controller;


if($_GET['tipo']=="maestro"){
	
	if(isset($_GET['id'])){
	 $id=$_GET['id'];

	}else{
	$id=$_SESSION['username'];

	}
if(!$reporte_controller->datosDisponibles($id)){
echo "LO SENTIMOS NO TENEMOS DATOS SOBRE ".$id;
}else{

$data=$reporte_controller->getDatosMaestro($id);
foreach ($data as $maestro) {
	# code...
	$nombre=$maestro['Nombre']." ".$maestro['A_Paterno']." ".$maestro['A_Materno'];
	$escuela=$maestro['id_escuela'];
}

$maestro_promedio=0;
$escuela_promedio=0;
$uni_promedio=0;
$count=0;

$info=$reporte_controller->getPromedioMaestro($id);




?>

<div class="box box-solid box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Reporte de <?php echo $nombre;?>:</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                   
                                	<table class="table table-bordered" style="text-align: center;">
                                        <tbody><tr>
                                            <td ><b>Pregunta</b></td>
                                            <td style="widtd: 20px"><b>Promedio</b></td>
                                            <td style="widtd: 20px"><b>Escuela</b></td>
                                            <td style="widtd: 20px"><b>Universidad</b></td>
                                        </tr>
                                        <?php 
                                        foreach ($info as $row) { $count++; ?>
                                        <tr>
                                            <td><?php echo $row['descripcion'];?></td>
                                            <td><span class="label label-primary"><?php echo $row['promedio']; $maestro_promedio=$maestro_promedio+$row['promedio'];?></span></td>
                                            <td><span class="label label-primary"><?php echo $t_esc=$reporte_controller->getPromedioEscuela($row['Pregunta_idPregunta'],$escuela); $escuela_promedio=$escuela_promedio+$t_esc;?></span></td>
                                            <td><span class="label label-primary"><?php echo $t_uni=$reporte_controller->getPromedioUniversidad($row['Pregunta_idPregunta']); $uni_promedio=$uni_promedio+$t_uni;?></span></td>
                                        </tr>
                                        <?php }?>
                                        <tr>
                                        <td>TOTAL</td>
                                        <td><span class="label label-primary"><? echo $maestro_promedio/$count;?></span></td>
                                        <td><span class="label label-primary"><? echo $escuela_promedio/$count;?></span></td>
                                        <td><span class="label label-primary"><? echo $uni_promedio/$count;?></span></td>
                                        <tr>
                                        
                                    </tbody></table>


                                </div><!-- /.box-body -->
                            </div>

  <?php }}?>