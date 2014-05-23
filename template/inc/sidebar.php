<!-- BEGIN CONTAINER -->
<div class="page-container">
<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu" data-auto-scroll="false" data-auto-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search" action="#" method="POST">
						<a href="javascript:;" class="remove">
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<!-- DOC: value=" ", that is, value with space must be passed to the submit button -->
							<input class="btn submit" type="button" type="button" value=" "/>
							</span>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
<?php 
global $database;
$estu_matri=$_SESSION['username'];
$sq="SELECT * FROM `Usuario` WHERE `idUsuario` = $estu_matri";
//echo $sq;
$content=$database->query($sq);
$estu=$content->fetch_assoc();
//echo $estu['tipo'];
$permiso=$estu['tipo'];
?>

				</li>

				<?php if ($permiso==null){?>
				<li class="start ">
					<a href="main.php?encuesta">
					<i class="fa fa-home"></i>
					<span class="title">
					Encuesta </span>
					</a>
				</li>

				<?php }
				else if($permiso==5){


				?>
				<li>
					<a href="javascript:;">
					<i class="fa fa-shopping-cart"></i>
					<span class="title">
					Reportes </span>
					<span class="arrow ">
					</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="#">
							<i class="fa fa-bullhorn"></i>
							x Maestro </a>
						</li>
						<li>
							<a href="#">
							<i class="fa fa-shopping-cart"></i>
							x Escuela </a>
						</li>
						<li>
							<a href="#">
							<i class="fa fa-tags"></i>
							x Materia </a>
						</li>

					</ul>
				</li>
				<?php }?>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->