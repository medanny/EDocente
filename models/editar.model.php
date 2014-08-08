<?php 
//Models go here
if(!isset($nivel_dir)){
$nivel_dir="../";    
}
include_once($nivel_dir."models/persona.model.php");
class Editar{//Clase 

    var $html;

	function Model(){//Constructor
}
	function maestro(){
    $html= '
     
                                    
                                


<div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Docentes</h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tbody><tr>
                                            <th>Matricula</th>
                                            <th>Nombre</th>
                                            <th>Status</th>
                                            <th>Grupo</th>
                                            <th>Escuela</th>
                                        </tr>
                                        ';
                                    

    $data=$this->getMaestros();
    foreach ($data as $maestro) {
       $html=$html. "<tr>";
       $html=$html."<td>".$maestro['idMaestro']."</td>";
       $html=$html."<td>".$maestro['Nombre']." ".$maestro['A_Paterno']." ".$maestro['A_Materno']."</td>";
       $html=$html. '<td><a href="index.php?page=editar&tipo=maestro&accion=MaestroEstatus&id='.$maestro['idMaestro'].'" >';
       if($maestro['estatus']==0){
        $html=$html.'<span class="label label-danger">Inactivo';
       }else if($maestro['estatus']==1){
        $html=$html.'<span class="label label-success">Activo';
       }
        $html=$html.'</span></a></td>';
       $html=$html. '<td><a href="index.php?page=editar&tipo=maestro&accion=MaestroGrupo&id='.$maestro['idMaestro'].'" ><span class="label label-success">'.$maestro['nombre'].'</span></a></td>';
       $html=$html.'<td><a href="index.php?page=editar&tipo=maestro&accion=MaestroEscuela&id='.$maestro['idMaestro'].'" ><span class="label label-success">'.$maestro['descripcion'].'</span></a></td>';
       $html=$html. "</tr>"; 

    }

                                    $html=$html.'    
                                    </tbody></table>
                                </div><!-- /.box-body -->
                            </div>

    ';
    return $html;

	}
	function escuela(){
         $html= '
    
              <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Nueva Escuela</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form action="controller/main.controller.php" method="get">
                                    <div class="box-body">
                                        
                                        <input type="hidden" name="id" value="9700001">
                                      
                                        
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                                        </div>



                                        <div class="form-group">
                                            <label>Facultad</label>
                                            <select class="form-control" name="value"><option value="20000">No Asignada</option><option value="20101">Ingeniería en Sistemas Computacionales</option><option value="20201">Licenciatura en Contaduría Publica</option><option value="20202">Licenciatura en Administración de Empresas</option><option value="20203">Licenciatura en Contaduría y Finanzas</option><option value="20204">Licenciatura en Contaduría e Impuestos</option><option value="20205">Maestría en Administración, especialidad en Finanzas</option><option value="20206">Maestría en Administración, especialidad en Mercadotecnia</option><option value="20207">Maestría en Administración, especialidad en Recursos Humanos</option><option value="20208">Maestría en Administración, especialidad en Liderazgo</option><option value="20301">Licenciatura en Nutrición</option><option value="20401">Licenciatura en Ciencias de la Educación en el área de Lengua y Literatura Esp</option><option value="20402">Licenciatura en Ciencias de la Educación en el área de Física y Matemáticas</option><option value="20403">Licenciatura en Ciencias de la Educación en el área de Ciencias Sociales</option><option value="20404">Licenciatura en Ciencias de la Educación en el área de Química y Biología</option><option value="20405">Licenciatura en Ciencias de la Educación en el área de Psicología Educativa</option><option value="20406">Maestría en Educación, en el área de Administración Educativa</option><option value="20407">Maestría en Educación, en el área de Desarrollo Curricular e Instrucción</option><option value="20408">Maestría en Educación, en el área de Enseñanza Superior</option><option value="20409">Licenciatura en Ciencias de la Educación con Acentuación en Inglés</option><option value="20501">Ejecución Instrumental de Piano</option><option value="20502">Ejecución Instrumental de Violín</option><option value="20601">Licenciatura en Teología</option><option value="20701">Educación Media Superior en el Área de Económico Administrativo</option><option value="20702">Educación Media Superior en el Área de Químico Biólogo</option><option value="20703">Educación Media Superior en el Área de Ciencias Sociales y Humanidades</option><option value="20704">Educación Media Superior en el Área de Físico Matemático</option><option value="20705">Educación Secundaria</option><option value="20801">Educación Primaria</option><option value="20802">Educación Preescolar</option><option value="20901">Licenciatura en Diseño Gráfico</option><option value="20902">Licenciatura en Diseño Gráfico con acentuación en Diseño Publicitario</option><option value="20903">Licenciatura en Diseño Gráfico con acentuación en Diseño Multimedia</option><option value="20904">Lic. en Diseño Gráfico con acentuación en Diseño de Imagen Empresarial</option><option value="20905">Licenciatura en Diseño Gráfico con acentuación en Diseño de Packaging</option><option value="20906">Licenciatura en Diseño Gráfico con acentuación en Diseño Editorial</option><option value="21001">Curso Preuniversitario</option><option value="21101">Modulos Cocurriculares</option><option value="21201">Enfermería</option><option value="21301">Licenciatura en Gastronomia</option><option value="21401">Curso de música</option><option value="21402">No Asignada</option> </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Director</label>
                                            <input type="text" class="form-control" placeholder="Matricula del Director" name="matricula">
                                        </div>



                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Crear</button>
                                    </div>
                                </form>
                            </div>                      
                                


<div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Escuelas</h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tbody><tr>
                                            <th>Nombre</th>
                                            <th>Facultad</th>
                                            <th>Director</th>
                                            
                                        </tr>
                                        ';
                                    

    $data=$this->getEscuelas();
    foreach ($data as $escuela) {
       $html=$html. "<tr>";
       $html=$html."<td>".$escuela['descripcion']."</td>";
       $html=$html.'<td><a href="index.php?page=editar&tipo=escuela&accion=escuelaFacultad&id='.$escuela['idEscuelas'].'"><span class="label label-success">'.$escuela['id_Facultad'].'</span></a></td>';
       $html=$html.'<td><a href="index.php?page=editar&tipo=escuela&accion=escuelaDirector&id='.$escuela['idEscuelas'].'"><span class="label label-success">'.$escuela['id_Director'].'</span></a></td>';
       $html=$html. "</tr>"; 

    }

                                    $html=$html.'    
                                    </tbody></table>
                                </div><!-- /.box-body -->
                            </div>

    ';
    return $html;

    }
	function facultad(){
         $html= '
     <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Nueva Facultad</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form action="controller/main.controller.php" method="get">
                                    <div class="box-body">
                                        
                                        <input type="hidden" name="tipo" value="insertarFacultad">
                                      
                                        
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                                        </div>


                                        <div class="form-group">
                                            <label>Director</label>
                                            <input type="text" class="form-control" placeholder="Matricula del Director" name="matricula">
                                        </div>



                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Crear</button>
                                    </div>
                                </form>
                            </div>    
                                    
                                


<div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Facultades</h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tbody><tr>
                                            <th>Nombre</th>
                                            <th>Director</th>
                                            
                                        </tr>
                                        ';
                                    

    $data=$this->getFacultades();
    foreach ($data as $facultad) {
       $html=$html. "<tr>";
       $html=$html."<td>".$facultad['descripcion']."</td>";
       $html=$html.'<td><a href="index.php?page=editar&tipo=facultad&accion=facultadDirector&id='.$facultad['idFacultades'].'"><span class="label label-success">'.$facultad['id_Director'].'</span></a></td>';
       $html=$html. "</tr>"; 

    }

                                    $html=$html.'    
                                    </tbody></table>
                                </div><!-- /.box-body -->
                            </div>

    ';
    return $html;

	}
    function getMaestros(){
    global $database;
    $data=$database->query("SELECT * FROM `Maestro`,`Usuario`,`grupos`,`Escuelas` WHERE `idMaestro`=`idUsuario` AND `Usuario`.`grupo` = `grupos`.`id_Grupo` AND `Escuelas`.`idEscuelas`=`Maestro`.`id_escuela`");
    return $database->toArray($data);
    }

    function maestroEscuela($id){
    global $database;
    $data=$this->getEscuelas();
    $maestro=$database->query("SELECT * FROM `Maestro` WHERE `idMaestro` = $id");
    $maestro=$database->toArray($maestro);
    $nombre="";
    $idEscuela="";
    foreach ($maestro as $key) {
    $nombre=$key['Nombre'];
    $idEscuela=$key['id_escuela'];
    }
    $this->htmladd('<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Editar Maestro</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form action="controller/main.controller.php" method="get">
                                    <div class="box-body">
                                        
                                        <input type="hidden" name="id" value="'.$id.'">
                                        <input type="hidden" name="tipo" value="update">
                                        <input type="hidden" name="campo" value="id_escuela">
                                        <input type="hidden" name="tabla" value="Maestro">
                                        <input type="hidden" name="where" value="idMaestro">
                                        <input type="hidden" name="url" value="../index.php?page=editar&tipo=maestro">
                                        
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control" placeholder="'.$nombre.'" disabled="">
                                        </div>



                                        <div class="form-group">
                                            <label>Escuela</label>
                                            <select class="form-control" name="value">');
    foreach ($data as $escuela) {
        # code...

        $this->htmladd('<option value="'.$escuela['idEscuelas'].'"');
        if($escuela['idEscuela']==$idEscuela){
            $this->htmladd("selected");
        }
            $this->htmladd('>'.$escuela['descripcion'].'</option>');
        
    }

    $this->htmladd(' </select>
                                        </div>

                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>');
    return $this->html;
    $this->html="";

    }

    function maestroGrupo($id){
    global $database;
    $data=$this->getEscuelas();
    $maestro=$database->query("SELECT * FROM `Maestro` WHERE `idMaestro` = $id");
    $maestro=$database->toArray($maestro);
    $nombre="";
    $idEscuela="";
    foreach ($maestro as $key) {
    $nombre=$key['Nombre'];
    $idEscuela=$key['id_escuela'];
    }
    $this->htmladd('<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Editar Maestro</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form action="controller/main.controller.php" method="get">
                                    <div class="box-body">
                                        
                                        <input type="hidden" name="id" value="'.$id.'">
                                        <input type="hidden" name="tipo" value="update">
                                        <input type="hidden" name="campo" value="grupo">
                                        <input type="hidden" name="tabla" value="Usuario">
                                        <input type="hidden" name="where" value="idUsuario">
                                        <input type="hidden" name="url" value="../index.php?page=editar&tipo=maestro">
                                        
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control" placeholder="'.$nombre.'" disabled="">
                                        </div>



                                        <div class="form-group">
                                            <label>Grupo</label>
                                            <select class="form-control" name="value">
                                            <option value="0">Usuario</option>
                                            <option value="1">Calidad Docente</option>
                                            <option value="2">VR Academica</option>
                                            <option value="3">Admin</option>
                                            <option value="7">Desarrollador</option>
                                            
                                            
                                            
                                            ');
    
    $this->htmladd(' </select>
                                        </div>

                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>');
    return $this->html;
    $this->html="";

    }



    function maestroEstatus($id){
    global $database;
    $data=$this->getEscuelas();
    $maestro=$database->query("SELECT * FROM `Maestro` WHERE `idMaestro` = $id");
    $maestro=$database->toArray($maestro);
    $nombre="";
    $idEscuela="";
    foreach ($maestro as $key) {
    $nombre=$key['Nombre'];
    $idEscuela=$key['id_escuela'];
    }
    $this->htmladd('<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Editar Maestro</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form action="controller/main.controller.php" method="get">
                                    <div class="box-body">
                                        
                                        <input type="hidden" name="id" value="'.$id.'">
                                        <input type="hidden" name="tipo" value="update">
                                        <input type="hidden" name="campo" value="estatus">
                                        <input type="hidden" name="tabla" value="Usuario">
                                        <input type="hidden" name="where" value="idUsuario">
                                        <input type="hidden" name="url" value="../index.php?page=editar&tipo=maestro">
                                        
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control" placeholder="'.$nombre.'" disabled="">
                                        </div>



                                        <div class="form-group">
                                            <label>Estatus</label>
                                            <select class="form-control" name="value">
                                            <option value="0">NO ACTIVO</option>
                                            <option value="1">ACTIVO</option>
                                            ');
    
    $this->htmladd(' </select>
                                        </div>

                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>');
    return $this->html;
    $this->html="";

    }

  function escuelaFacultad($id){
    global $database;
    
    $this->htmladd('<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Editar Escuela Director</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form action="controller/main.controller.php" method="get">
                                    <div class="box-body">
                                        
                                        <input type="hidden" name="id" value="'.$id.'">
                                        <input type="hidden" name="tipo" value="update">
                                        <input type="hidden" name="campo" value="id_Facultad">
                                        <input type="hidden" name="tabla" value="Escuelas">
                                        <input type="hidden" name="where" value="idEscuelas">
                                          <input type="hidden" name="url" value="../index.php?page=editar&tipo=escuela">
                                        
                                        

                                        <div class="form-group">
                                            <label>Director</label>
                                            <input type="text" class="form-control" placeholder="id Facultad" name="value">
                                        </div>
                                            ');
    
    $this->htmladd('
                                       

                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>');
    return $this->html;
    $this->html="";

    }
    function facultadDirector($id){
    global $database;
    
    $this->htmladd('<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Editar Facultad Director</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form action="controller/main.controller.php" method="get">
                                    <div class="box-body">
                                        
                                        <input type="hidden" name="id" value="'.$id.'">
                                        <input type="hidden" name="tipo" value="update">
                                        <input type="hidden" name="campo" value="id_Director">
                                        <input type="hidden" name="tabla" value="Facultades">
                                        <input type="hidden" name="where" value="idFacultades">
                                          <input type="hidden" name="url" value="../index.php?page=editar&tipo=facultad">
                                        
                                        

                                        <div class="form-group">
                                            <label>Director</label>
                                            <input type="text" class="form-control" placeholder="Matricula del Director" name="value">
                                        </div>
                                            ');
    
    $this->htmladd('
                                       

                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>');
    return $this->html;
    $this->html="";

    }

    function escuelaDirector($id){
    global $database;
    
    $this->htmladd('<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Editar Escuela Director</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form action="controller/main.controller.php" method="get">
                                    <div class="box-body">
                                        
                                        <input type="hidden" name="id" value="'.$id.'">
                                        <input type="hidden" name="tipo" value="update">
                                        <input type="hidden" name="campo" value="id_Director">
                                        <input type="hidden" name="tabla" value="Escuelas">
                                        <input type="hidden" name="where" value="idEscuelas">
                                          <input type="hidden" name="url" value="../index.php?page=editar&tipo=escuela">
                                        
                                        

                                        <div class="form-group">
                                            <label>Director</label>
                                            <input type="text" class="form-control" placeholder="Matricula del Director" name="value">
                                        </div>
                                            ');
    
    $this->htmladd('
                                       

                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>');
    return $this->html;
    $this->html="";

    }




    function getFacultades(){
    global $database;
    $data=$database->query("SELECT * FROM `Facultades`");
    return $database->toArray($data);

    }
    function getEscuelas(){
    global $database;
    $data=$database->query("SELECT * FROM `Escuelas`");
    return $database->toArray($data);

    }
    function htmladd($html){
        $this->html=$this->html.$html;

    }
    function updatemaestro($campo,$valor,$id){
        global $database;
        $query="UPDATE `Maestro` SET `$campo` = '$valor' WHERE `idMaestro` = $id";
        echo $query;
        $database->query("UPDATE `Maestro` SET `$campo` = '$valor' WHERE `idMaestro` = $id");
    }
    function update($tabla,$campo,$valor,$where,$id){
    	global $database;
        $query="UPDATE `$tabla` SET `$campo` = '$valor' WHERE `$where` = $id";
        //echo $query;
    //    echo $query;
        $database->query($query);


    }








	
}

$editar = new Editar();
?>