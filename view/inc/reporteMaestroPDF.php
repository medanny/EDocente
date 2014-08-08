<?php
/**
 * Editar.php
 * Esta vista es para editar los diferentes, catalogos, recibe variables GET del url y las manda al controlador.
 * primero busca acciones y luego tipo.
 */
//Si aun no se define nivel dir definirlo a este directorio.
if(!isset($nivel_dir)){
$nivel_dir="../../";	
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


$html=$html. '<div class="box box-solid box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Reporte de  '.$nombre.':</h3>
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
                                        </tr>';



                                        foreach ($info as $row) { $count++; 
                                             number_format($number, 2, '.', '');
                                            $personal=number_format($row['promedio'],2, '.', '');
                                            $t_esc=number_format($reporte_controller->getPromedioEscuela($row['Pregunta_idPregunta'],$escuela),2, '.', ''); 
                                            $t_uni=number_format($reporte_controller->getPromedioUniversidad($row['Pregunta_idPregunta']),2, '.', ''); 
                                            $maestro_promedio=$maestro_promedio+$row['promedio'];
                                            $escuela_promedio=$escuela_promedio+$t_esc;
                                            $uni_promedio=$uni_promedio+$t_uni;

                                            
                                       $html=$html. '<tr>
                                            <td>'. $row['descripcion'].'</td>
                                            <td><span class="label label-primary">'. $personal.'</span></td>
                                            <td><span class="label label-primary">'. $t_esc.'</span></td>
                                            <td><span class="label label-primary">'.$t_uni.'</span></td>
                                        </tr>';
                                        


                                         }

                                         $html=$html. '<tr>
                                        <td>TOTAL</td>

                                        <td><span class="label label-primary">'. number_format($maestro_promedio/$count,2, '.', '').'</span></td>
                                        <td><span class="label label-primary">'. number_format($escuela_promedio/$count,2, '.', '').'</span></td>
                                        <td><span class="label label-primary">'. number_format($uni_promedio/$count,2, '.', '').'</span></td>
                                        <tr>
                                        
                                    </tbody></table>


                                </div><!-- /.box-body -->
                            </div>';

  }}

include_once($nivel_dir."tutzi/class/tools.class.php");
global $tools;

$tools->toPDF(utf8_encode($html),$nivel_dir);


echo  "<script type='text/javascript'>";
echo "closeCurrentWindow()";
echo "</script>";;



?>






