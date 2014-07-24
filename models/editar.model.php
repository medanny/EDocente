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
<a class="btn btn-app">
                                        <i class="fa fa-edit"></i> Docente sin Escuela
                                    </a>
                                    <a class="btn btn-app">
                                        <i class="fa fa-edit"></i> Administradores 
                                    </a>
                                    <a class="btn btn-app">
                                        <i class="fa fa-save"></i> otro
                                    </a>
                                    <a class="btn btn-app">
                                        <span class="badge bg-yellow">3</span>
                                        <i class="fa fa-edit"></i> otro
                                    </a>       
                                    
                                


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
       $html=$html. '<td><span class="label label-success">'.$maestro['nombre'].'</span></td>';
       $html=$html.'<td><a href="index.php?page=editar&tipo=maestro&accion=MaestroEscuela&id='.$maestro['idMaestro'].'" ><span class="label label-success">'.$maestro['descripcion'].'</span></td></a>';
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
    global $persona;
    echo $persona->printPermisos();
    //echo $persona->esEstudiante();

    //echo "HELLO WORLD";


	}
	function facultad(){


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