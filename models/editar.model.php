<?php 
//Models go here


class Editar{//Clase

	function Model(){//Constructor
}
	function maestro(){
    return '
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
                                            <th>Derechos</th>
                                            <th>Escuela</th>
                                        </tr>
                                        <tr>
                                            <td>1110155</td>
                                            <td>Daniel Lozano</td>
                                            <td><span class="label label-success">Activo</span></td>
                                            <td><span class="label label-success">Editar</span></td>
                                            <td><span class="label label-success">ISC</span></td>
                                        </tr>
                                        <tr>
                                            <td>9800003</td>
                                            <td>Amado Victor Fragoso</td>
                                            <td><span class="label label-success">Activo</span></td>
                                            <td><span class="label label-success">Editar</span></td>
                                            <td><span class="label label-success">ISC</span></td>
                                        </tr>
                                        
                                        
                                    </tbody></table>
                                </div><!-- /.box-body -->
                            </div>

    ';

	}
	function escuela(){


	}
	function facultad(){


	}








	
}

$editar = new Editar();
?>