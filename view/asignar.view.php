<?php 
if(!isset($nivel_dir)){
$nivel_dir="../";	
}

//incluir controlador.
include_once($nivel_dir."models/asignar.model.php");
global $asignar;

$encuestas=$asignar->getEncuestas();
$periodos=$asignar->getPeriodos();
$asignadas=$asignar->getAsignadas();


?>
 <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Asignar Encuesta</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form action="controller/main.controller.php" method="get">
                                    <div class="box-body">
                                        
                                        <input type="hidden" name="tipo" value="insertarEvaluacion">
                                      
                                        
                                        <div class="form-group">
                                            <label>Encuesta</label>
                                            <select class="form-control" name="encuesta">
                                            <?php
                                             foreach ($encuestas as $encuesta) {
                                            	echo '<option value="'.$encuesta['idEncuestas'].'">'.$encuesta['descripcion'].'</option>';
                                            }
                                            ?>

                                            </select>


                                        </div>




                                        <div class="form-group">
                                            <label>Periodo</label>
                                            <select class="form-control" name="periodo">
                                            <?php
                                             foreach ($periodos as $periodo) {
                                            	echo '<option value="'.$periodo['idPeriodo'].'">'.$periodo['descripcion'].'</option>';
                                            }
                                            ?>

                                            </select>


                                        </div>

                                        <div class="input-group">
                                            <label>Comineza</label>
                                            <input type="date" name="comienza" class="form-control" >
                                        </div>

                                        	<div class="input-group">
                                            <label>Termina</label>
                                            <input type="date" name="termina" class="form-control" >
                                        </div>

                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Crear</button>
                                    </div>
                                </form>
                            </div>      


                        <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Encuestas</h3>
                                   
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                            <th>Encuesta</th>
                                            <th>Periodo</th>
                                            <th>Comienza</th>
                                            <th>Termina</th>
                                            
                                        </tr>
                                         <?php
                                             foreach ($asignadas as $asignada) {
                                                  ?>
                                        <tr>
                                            <td><?php echo $asignada['Encuestas_idEncuestas'];?> </td>
                                            <td><?php echo $asignada['Periodo_idPeriodo'];?></td>
                                            <td><?php echo $asignada['FechaIni'];?></td>
                                            <td><?php echo $asignada['FechaFin'];?></td>
                                            
                                        </tr>

                                        <?php   }
                                            ?>
                                    </tbody></table>
                                </div><!-- /.box-body -->
                            </div>                
