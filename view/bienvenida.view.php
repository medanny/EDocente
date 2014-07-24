<?php
/**
 * bienvenida.php
 * La vista de bienvenida no tiene interaccion y simplemente es para darle la bienvenida al estudiante
 * o al maestro, dependiendo del tipo de usuario, te informa de que es lo que hace la pagina y te pide 1 
 * inicies la evaluacion si eres alumno o en que mires tus resultados en el caso del maestro.
 */


if(!isset($nivel_dir)){
$nivel_dir="../";	
}


?>
<div style="text-align:center;"> 
<?php if($persona->esEstudiante()==1){?>

                            

<h2>Bienvenido al proceso de evaluaci&oacute;n de tus docentes<h2>

										<!--h2>Universidad de Navojoa<br-->
										<img src="view/inc/img/Logo2.png" />
										<h3>
										Vicerrector&iacute;a acad&eacute;mica<br>
										Direcci&oacute;n de calidad educativa<br>
										</h3>
										<p class="lead">
											 Para nosotros es muy valiosa tu opini&oacute;n de manera responsable, 
										</p>
										<p >
											  ya que as&iacute; podemos mejorar la calidad de la ense&#328;anza en nuestra instituci&oacute;n.
										</p>
										<p>
											 Por favor sigue las siguientes recomendaciones para el correcto llenado de esta evaluaci&oacute;n a tus docentes.</p>
										<p>
											1.- Deber&aacute; responder la totalidad de los &iacute;tems y/o preguntas para poder guardar su evaluaci&oacute;n.
										</p>
										<p>
											2.- Si por alguna raz&oacute;n deja sin responder alg&uacute;n campo, el sistema le indicara cual de ellos debe llenar o falta.
										</p>

										<p>
											
3.- Una vez llenados todos los campos o preguntas deber&aacute;s presionar el bot&oacute;n enviar. 
</p>
								<blockquote>
									<p>
										 A uno dio 5 talentos, y a otro 2, y a otro 1, a cada uno dio conforme a su capacidad; y luego se fue lejos
									</p>
									<small>Mateo 25:15</small>
								</blockquote>
 								



                                
<?php } if($persona->esMaestro()==1){?>

<h2>Bienvenido al Sistema de evaluacion Docente<h2>

										<!--h2>Universidad de Navojoa<br-->
										<img src="view/inc/img/Logo2.png" />
										<h3>
										Vicerrector&iacute;a acad&eacute;mica<br>
										Direcci&oacute;n de calidad educativa<br>
										</h3>
										<p class="lead">
											 Aqui podras ver los resultados de tu evaluacion docente. 
										</p>
										
										
							
								<blockquote>
									<p>
										 A uno dio 5 talentos, y a otro 2, y a otro 1, a cada uno dio conforme a su capacidad; y luego se fue lejos
									</p>
									<small>Mateo 25:15</small>
								</blockquote>
<?php }?>
</div><!-- /.box -->  