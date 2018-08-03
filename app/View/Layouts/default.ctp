<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.4 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="es" class="no-js">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>Portal Sistemas</title>
		<!-- start: META -->
		<meta charset="utf-8" />
		<!--[if IE]>
			<meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" />
		<![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link rel="shortcut icon" type="image/x-icon" href="/ico.ico" />
		<link rel="icon" type="image/png" href="/ico.png" />
		
		<!-- end: META -->
		<?php echo $this->element('General.archivos_css'); ?>
		<?php echo $this->Html->css('assets/css/theme_light.css',array('id'=>'skin_color'));?>
		<?php echo $this->Html->css('assets/plugins/jqwidgets/jqwidgets/styles/jqx.base.css');?>
		
		<script type="text/javascript">
			base_url = "<?php echo $this->Html->Url('/',true); ?>"
		</script>
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body class="<?php echo isset($bodyClass)?$bodyClass:''; ?>">
		<div class="navbar navbar-inverse navbar-fixed-top">
			<!-- start: TOP NAVIGATION CONTAINER -->
			<div class="container off-p-left">
				<div class="navbar-header col-md-2 off-p-left off-p-right">
					<!-- start: RESPONSIVE MENU TOGGLER -->
					<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
						<span class="clip-list-2"></span>
					</button>
					<!-- end: RESPONSIVE MENU TOGGLER -->
					<!-- start: LOGO -->
					<a class="navbar-brand current-user" href="#">
						<?php 
							$c = $this->Session->read('Auth.User.empresa_cliente.GeneralMaestroCliente');
							$urlLogo = Router::Url('/', true).'img/GeneralMaestroCliente/'.$c['id']."/".$c['logo'];
							echo $this->Html->image($urlLogo,array('height' => 50,  'class'=>'imgLogo '));
						?>
					</a>
					<!-- end: LOGO -->
				</div>
				<div class="navbar-tools col-md-10 off-p-left off-p-right" style="padding-left: 2.5px !important;">
					<ul class="nav navbar-left col-md-8">
						<?=$this->Element("General.menuSistemas");?>
					</ul>
					<!-- start: TOP NAVIGATION MENU -->
					<ul class="nav navbar-right col-md-4 off-p-left off-p-right">
						<?php
							echo $this->Element("General.sel_cliente_empresa");

							if($this->Session->read('Auth.User.sistema_activo.empresa_activa.cantidad_grupos_ccs') > 1){
								echo $this->Element("Remuneraciones.sel_grupo_ccs");
							}
							echo $this->Element("Remuneraciones.notificaciones_superior");
						?>
						<!-- start: USER DROPDOWN -->
						<?=$this->Element("General.accionesUsuarioLogeado");?>
						<!-- end: USER DROPDOWN -->
					</ul>
					<!-- end: TOP NAVIGATION MENU -->
				</div>
			</div>
			<!-- end: TOP NAVIGATION CONTAINER -->
		</div>
		<!-- end: HEADER -->
		<!-- start: MAIN CONTAINER -->
		<div class="main-container">
			<div class="navbar-content">
				<!-- start: SIDEBAR -->
				<div class="main-navigation navbar-collapse collapse">
					<!-- start: MAIN MENU TOGGLER BUTTON -->
					<div class="navigation-toggler">
						<i class="clip-chevron-left"></i>
						<i class="clip-chevron-right"></i>
					</div>
					<!-- end: MAIN MENU TOGGLER BUTTON -->
					<!-- start: MAIN NAVIGATION MENU -->

					<ul class="main-navigation-menu">
						<?php
							echo $this->Element('Remuneraciones.menu-admin');
						?>
					</ul>
					<!-- end: MAIN NAVIGATION MENU -->
				</div>
				<!-- end: SIDEBAR -->
			</div>
			<!-- start: PAGE -->
			<div class="main-content">
				<!-- start: PANEL CONFIGURATION MODAL FORM -->
				<!-- /.modal -->
				<!-- end: SPANEL CONFIGURATION MODAL FORM -->
				<div class="container">
					<!-- start: PAGE HEADER -->
					<div class="row">
						<div class="col-sm-12">
							<!-- start: PAGE TITLE & BREADCRUMB -->
							<ol class="breadcrumb">
								<li>
									<?php 
										$nombreEmpresa = $this->Session->read('empresa.nombre');
										if(!empty($nombreEmpresa )){?>
										<p style="color:#007AFF;" >
											<i class="fa fa-building-o"></i>
											
											<?php echo $this->Session->read('empresa.nombre');?>
										</p>
									<?php }?>
									
								</li>

								<li class="active" style="color:#007AFF;">
									<?php 
										$GrupoCentroCosto = $this->Session->read('Auth.User.sistema_activo.empresa_activa.grupo_centro_costo_nombre');
										if(!empty($GrupoCentroCosto)){?>
											<i class="fa fa-object-group"></i>
											G.C.C. <?php echo $GrupoCentroCosto; ?>
									<?php }?>
								</li>

								<li class="active" style="color:#007AFF;">
									<?php 
										$nombrePeriodo = $this->Session->read('Auth.User.sistema_activo.empresa_activa.periodo_grupo');
										if(!empty($nombrePeriodo)){?>
											<i class="fa fa-calendar"></i>
											Periodo <?php echo $nombrePeriodo; ?>
									<?php }?>
								</li>
								<!--<li class="search-box">
									<form class="sidebar-search">
										<div class="form-group">
											<input type="text" placeholder="Iniciar la búsqueda...">
											<button class="submit">
												<i class="clip-search-3"></i>
											</button>
										</div>
									</form>
								</li>-->
							</ol>
							<div class="page-header" style="margin: 20px 0px 3px;">
								<h1>
									<i class="<?php if(isset($icono_for_layout)){echo $icono_for_layout;} ?>  circle-icon circle-green"></i>
									<?php echo $title_for_layout; ?>
									<small>
										<b>
											<?php if(isset($subTitle_for_layout)){echo $subTitle_for_layout;} ?>
										</b>
									</small>
								</h1>
								<?php
									if($this->fetch("info-resumen"))
										echo $this->fetch("info-resumen");
								?>
							</div>
							<!-- modal pequeños-->
							<div class="modal fade" id="myModalNormal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							        	<span aria-hidden="true">&times;</span>
							        </button>
							        <h4 class="modal-title" id="myModalLabel">Titulo del modal</h4>
							      </div>
							      <div class="modal-body">
							        ...
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							      </div>
							    </div>
							  </div>
							</div>

							<!-- Modal grande -->
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog modal-lg" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							        	<span aria-hidden="true">&times;</span>
							        </button>
							        <h4 class="modal-title" id="myModalLabel">Titulo del modal</h4>
							      </div>
							      <div class="modal-body" style="max-height: calc(100vh - 210px); overflow-y: auto;">
							        ...
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							      </div>
							    </div>
							  </div>
							</div>


							<!-- end: PAGE HEADER -->
							<!-- start: PAGE CONTENT -->
							
							<?php echo $this->Session->flash(); ?>
							<?php echo $this->Session->flash('auth'); ?>
							<?php echo $this->fetch('content'); ?>
							<!-- end: PAGE TITLE & BREADCRUMB -->
						</div>
					</div>
					
					<!-- end: PAGE CONTENT-->
				</div>
			</div>
			<!-- end: PAGE -->
		</div>
		<!-- end: MAIN CONTAINER -->
		<!-- start: FOOTER -->
		<br /><br />
		<div class="footer">
			<div class="footer-inner">
				<?php echo $this->Element('footer');?>
			</div>
		</div>
		<!-- end: FOOTER -->
		<!-- start: RIGHT SIDEBAR -->
		<div id="content-dropdown"></div>
		</div>
		<!-- end: RIGHT SIDEBAR -->
		<?php 
			echo $this->element('General.archivos_js');

			echo $this->fetch('script');
		?>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				// codigo para menu dinamico
				$(".active").removeClass("open");
    			$('.dataTables_length select').select2();
    			$('.dataTables_length select').addClass('input-xs');
    			$(".dataTables_filter input[type='search']").addClass("form-control input-sm");

    			$("div.dataTables_info").parent("div").removeClass("col-md-6").addClass("col-md-12");
    			$("div.dataTables_paginate").parent("div").removeClass("col-md-6").addClass("col-md-12");
			});
		</script>
	</body>
	<!-- end: BODY -->
</html>
