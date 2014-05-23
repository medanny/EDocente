<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="main.php">
			<img src="template/assets/admin/layout/img/logo.png" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<div class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</div>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				
			<?php if($permiso==5){?>
				<!-- BEGIN TODO DROPDOWN -->
				<li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
					<a href="layout_blank_page.html#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="fa fa-tasks"></i>
					<span class="badge badge-default">
					3 </span>
					</a>
					<ul class="dropdown-menu extended tasks">
						<li>
							<p>
								 Porcentaje de Cumplimiento x Carrera
							</p>
						</li>
						<li>
							<ul class="dropdown-menu-list scroller" style="height: 250px;">
								






									<?php



global $database;
$estu_matri=$_SESSION['username'];
$sq="select `id_Escuela`,`Escuelas`.`descripcion` as nombre, count(*) as alumnos from Estudiante,Escuelas where `Estudiante`.`id_Escuela`= `Escuelas`.`idEscuelas` group by `id_Escuela`";
$result=$database->query($sq);
while($rows = $result->fetch_assoc()){
$id=$rows['id_Escuela'];
$q="SELECT count(*) as contestados FROM `Contestados` WHERE `id_Escuela` = $id";
$content=$database->query($q);
$cont=$content->fetch_assoc();
$totalalu=$rows['alumnos'];

$porcentaje=($cont['contestados']/$totalalu)*100;
$porcentaje = sprintf("%01.2f", $porcentaje);



?>


<li>

									<a href="#">
									<span class="task">
									<span class="desc">
									<?php echo $rows['nombre'];?></span>
									<span class="percent">
									<?php echo $porcentaje; ?>%</span>
									</span>
									<span class="progress">
									<span style="width: <?php echo $porcentaje; ?>%;" class="progress-bar progress-bar-success" aria-valuenow="<?php echo $porcentaje; ?>" aria-valuemin="0" aria-valuemax="100">
									<span class="sr-only">
									<?php echo $porcentaje; ?>% Complete </span>
									</span>
									</span>
									</a>
								</li>
								<?php }?>
								
							</ul>
						</li>
						<li class="external">
							<a href="#">
							Ver todas <i class="m-icon-swapright"></i>
							</a>
						</li>
					</ul>
				</li>
				<!-- END TODO DROPDOWN -->
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<?php }?>
				<li class="dropdown dropdown-user">
					<a href="layout_blank_page.html#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" width="29px" height="29px" src="fotos/<?php echo $_SESSION['username'];?>.jpg"/>
					<span class="username">
					<?php echo $_SESSION['username'];?>
					</span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="#">
							<i class="fa fa-user"></i> Facebook </a>
						</li>
						<li>
							<a href="http://unav2.edu.mx/">
							<i class="fa fa-calendar"></i> UNAV</a>
						</li>
						<li>
							<a href="http://mail.unav.edu.mx">
							<i class="fa fa-envelope"></i> Mi Correo <span class="badge badge-danger">
							3 </span>
							</a>
						</li>
						<li>
							<a href="#">
							<i class="fa fa-tasks"></i> ISC <span class="badge badge-success">
							7 </span>
							</a>
						</li>
						<li class="divider">
						</li>
						<li>
							<a href="class/process.class.php?logout=1">
							<i class="fa fa-key"></i> Salir</a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				<!-- END USER LOGIN DROPDOWN -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->

<div class="clearfix">
</div>

