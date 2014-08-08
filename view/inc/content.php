       
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="/view/inc/img/fotos/<?php echo $_SESSION['username'];?>.jpg" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hola, <?php echo $_SESSION['username'];?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> En Linea</a>
                        </div>
                    </div>
                    <!-- search form -->
                   <?php if($persona->permiso(2)||$persona->permiso(3)||$persona->permiso(4)){?>
                    <form action="index.php" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="hidden" name="page" value="buscar">
                            <input type="text" name="a" class="form-control" placeholder="Buscar..."/>
                            <span class="input-group-btn">
                                <button type='submit' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <?php }?>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <?php if($persona->esEstudiante()==1){?>
                       <li class="active">
                            <a href="index.php?page=encuesta">
                                <i class="fa fa-dashboard"></i> <span>Encuesta</span>
                            </a>
                        </li> 
                        <?php } if($persona->esMaestro()==1){ ?>
                        <li class="active">
                            <a href="index.php?page=reporte&tipo=maestro">
                                <i class="fa fa-dashboard"></i> <span>Resultados</span>
                            </a>
                        </li> 
                        <?php } if($persona->permiso(3)){?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Editar</span><small class="badge pull-right bg-green">Admin</small>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                
                                <li><a href="http://tutzi.medanny.com/index.php?page=editar&tipo=maestro"><i class="fa fa-angle-double-right"></i> Docente</a></li>
                                <li><a href="http://tutzi.medanny.com/index.php?page=editar&tipo=escuela"><i class="fa fa-angle-double-right"></i> Escuela</a></li>
                                <li><a href="http://tutzi.medanny.com/index.php?page=editar&tipo=facultad"><i class="fa fa-angle-double-right"></i> Facultad</a></li>
                            </ul>
                        </li>
                        <?php } if($persona->permiso(2)){?>
                        <li class="active">
                            <a href="index.php?page=asignar">
                                <i class="fa fa-dashboard"></i> <span>Asignar Encuesta</span>
                            </a>
                        </li> 
                        
                        <?php } if($persona->permiso(4)){?>
                        
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Reportes</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="index.php?page=reporte"><i class="fa fa-angle-double-right"></i> x Maestro</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> x Escuela</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> x Facultad</a></li>
                            </ul>
                        </li>
                        <?php }?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Bienvenida
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                        <li class="active">Pagina Principal</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">


                