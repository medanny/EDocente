<?php


if(!isset($nivel_dir)){
$nivel_dir="../";	
}

include_once ($nivel_dir."models/buscar.model.php");

if(isset($_GET['a'])){
echo "Resultados de <b>". $_GET['a']."</b> :";
?>
<div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Maestros</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <th>Matricula</th>
                                            <th>Nombre</th>
                                            <th>Status</th>
                                            <th>Grupo</th>
                                            <th>Escuela</th>
                                            <th>Reporte</th>
                                            
                                        </tr>
                                        <?php 
                                        	global $buscar;
                                        	$resultados=$buscar->buscarMaestros($_GET['a']);
                                        	foreach ($resultados as $result) {
                                        		# code...
                                        	
                                        ?>
                                        <tr>
                                        <td><?php echo $result['idMaestro'];?></td>
                                        <td><?php echo $result['Nombre']." ".$result['A_Paterno']." ".$result['A_Materno']." ";?></td>
                                        <td><a href="index.php?page=editar&amp;tipo=maestro&amp;accion=MaestroEstatus&amp;id=<?php echo $result['idMaestro'];?>"><span class="label label-danger">Estitar Estatus</span></a></td>
                                        <td><span class="label label-success">Editar Grupo</span></td>
                                        <td><a href="index.php?page=editar&amp;tipo=maestro&amp;accion=MaestroEscuela&amp;id=<?php echo $result['idMaestro'];?>"><span class="label label-success">Editar Escuela</span></a></td>
                                        <td><a href="index.php?page=reporte&tipo=maestro&id=<?php echo $result['idMaestro'];?>">VER REPORTE</a></td>
                                        </tr>

                                        <?php }?>
                                        
                                    </tbody></table>
                                </div><!-- /.box-body -->
                               
                            </div>
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Alumnos</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <th>Matricula</th>
                                            <th>Nombre</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                        <?php 
                                        $resultados=$buscar->buscarEstudiante($_GET['a']);
                                        	foreach ($resultados as $result) {
                                        ?>
                                        <tr>
                                        <td><?php echo $result['idEstudiante'];?></td>
                                        <td><?php echo $result['Nombre']." ".$result['A_Paterno']." ".$result['A_Materno']." ";?></td>
                                        <td><?php if($buscar->yaContesto($result['idEstudiante'])){?><span class="label label-success">YA CONESTO</span><?php } else {?><span class="label label-danger">NO CONTESTO</span> <?php }?>  </td>
                                        </tr>
                                        <?php }?>
                                        
                                    </tbody></table>
                                </div><!-- /.box-body -->
                               
                            </div>



<?php

}

?>