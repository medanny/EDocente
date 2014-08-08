 <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Edocente
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                       
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $_SESSION['username'];?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="/view/inc/img/fotos/<?php echo $_SESSION['username'];?>.jpg" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $persona->getName();?>
                                        <small><? if($persona->esEstudiante()==1){echo "ESTUDIANTE";}
                                                 if($persona->isMaestro()==1){echo "MAESTRO";}?>
                                        </small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="https://apps.unav.edu.mx/academico/">Academico</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="http://mail.unav.edu.mx">Correo</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Conf</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="http://www.unav2.edu.mx/" class="btn btn-default btn-flat">UNAV</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="controller/process.controller.php?logout=1" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>