<?php
	$dashborad = "";
	$dashborad_subMenu = "";
	$mantenedores = "";
	$mantenedores_subMenu = "";
	$empresas = "";
	$empresas_subMenu = "";
	$funcionarios = "";
	$funcionarios_subMenu = "";
	$liquidaciones = "";
	$liquidaciones_subMenu = "";
	$informes = "";
	$informes_subMenu = "";
	$administrador = "";
	$administrador_subMenu = "";

	if(!empty($manu_color)){
		switch ($manu_color) {
			case 'dashborad':
				$dashborad = "active";
				$dashborad_subMenu = 'style="display: none;"';
				break;
			case 'mantenedores':
				$mantenedores = "active";
				$mantenedores_subMenu = 'style="display: none;"';
				break;
			case 'empresas':
				$empresas = "active";
				$empresas_subMenu = 'style="display: none;"';
				break;
			case 'funcionarios':
				$funcionarios = "active";
				$funcionarios_subMenu = 'style="display: none;"';
				break;
			case 'liquidaciones':
				$liquidaciones = "active";
				$liquidaciones_subMenu = 'style="display: none;"';
				break;
			case 'informes':
				$informes = "active";
				$informes_subMenu = 'style="display: none;"';
				break;
			case 'administrador':
				$administrador = "active";
				$administrador_subMenu = 'style="display: none;"';
				break;
		}

	}
?>
	
	<li class='<?php echo $dashborad;?>' >
		<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemEmpresas","action"=>"index"));?>"><i class="clip-home-3"></i>
			<span class="title"> Dashboard </span><span class="selected"></span>
		</a>
	</li>
	<?php 
		$sessionEmpresa = $this->Session->read('empresa.id');
		if(!empty($sessionEmpresa)){?>
			<li class='<?php echo $mantenedores;?>'>
				<a href="javascript:void(0)"><i class="clip-pencil"></i>
					<span class="title"> Mantenedores </span><i class="icon-arrow"></i>
					<span class="selected"></span>
				</a>
				<ul class="sub-menu" <?php echo $mantenedores_subMenu;?>>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemConceptos","action"=>"index"));?>">
							<span class="title"> Conceptos liquidaciones </span>
						</a>
					</li>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemTablaParametroMensuales","action"=>"index"));?>">
							<span class="title"> Parametros Mensuales </span>
						</a>
					</li>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemTablaParametroAnuales","action"=>"index"));?>">
							<span class="title"> Parametros Anuales </span>
						</a>
					</li>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemCuentaContables","action"=>"index"));?>">
							<span class="title"> Cuentas Contables </span>
						</a>
					</li>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemFeriadoAnuales","action"=>"index"));?>">
							<span class="title"> Feriados Anuales </span>
						</a>
					</li>
					<!--
					<li>
						<a href="layouts_footer_fixed.html">
							<span class="title"> Duración de contratos </span>
						</a>
					</li>
					<li>
						<a href="../clip-one-rtl/index.html">
							<span class="title"> AFP </span>
						</a>
					</li>
					<li>
						<a href="../clip-one-rtl/index.html">
							<span class="title"> Isapres </span>
						</a>
					</li>-->
				</ul>
			</li>
			<li class='<?php echo $empresas;?>'>
				<a href="javascript:void(0)"><i class="fa fa-building-o"></i>
					<span class="title"> Empresas </span><i class="icon-arrow"></i>
					<span class="selected"></span>
				</a>
				<ul class="sub-menu" <?php echo $empresas_subMenu;?>>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemEmpresas","action"=>"index"));?>">
							<span class="title"> Listado de Empresas </span>
						</a>
					</li>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemPeriodos","action"=>"index"));?>">
							<span class="title"> Periodos </span>
						</a>
					</li>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemCentroCostos","action"=>"index"));?>">
							<span class="title"> Centro de Costos </span>
						</a>
					</li>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemCargos","action"=>"index"));?>">
							<span class="title"> Mant. Cargos </span>
						</a>
					</li>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemLineaNegocios","action"=>"index"));?>">
							<span class="title"> Mant. Línea de negocios </span>
						</a>
					</li>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemConvenios","action"=>"index"));?>">
							<span class="title"> Mant. Convenios </span>
						</a>
					</li>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemEmpresaMutuales","action"=>"index"));?>">
							<span class="title"> Agregar Mutual </span>
						</a>
					</li>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemEmpresaCajaCompensaciones","action"=>"index"));?>">
							<span class="title"> Agregar Caja Compensación </span>
						</a>
					</li>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemPreviredEnvioMensuales","action"=>"index"));?>">
							<span class="title"> Previred </span>
						</a>
					</li>
				</ul>
			</li>
			<li class='<?php echo $funcionarios;?>'>
				<a href="javascript:void(0)"><i class="fa fa-users"></i>
					<span class="title"> Funcionarios </span><i class="icon-arrow"></i>
					<span class="selected"></span>
				</a>
				<ul class="sub-menu" <?php echo $funcionarios_subMenu;?>>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemFuncionarios","action"=>"index"));?>">
							<span class="title"> Listado de Funcionarios </span>
						</a>
					</li>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemFuncionarios","action"=>"conceptosFijos"));?>">
							<span class="title"> Conceptos Fijos </span>
						</a>
					</li>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemFuncionarios","action"=>"conceptosVariables"));?>">
							<span class="title"> Conceptos Variables </span>
						</a>
					</li>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemPrestamosDetalles","action"=>"revisarCuotasActivas"));?>">
							<span class="title"> Resumen Préstamos </span>
						</a>
					</li>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemFuncionarios","action"=>"liquidarMensual"));?>">
							<span class="title"> Liquidar Funcionarios </span>
						</a>
					</li>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemFuncionarios","action"=>"cargaMasiva"));?>">
							<span class="title"> Carga Masiva</span>
						</a>
					</li>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemFuncionarios","action"=>"Migracion"));?>">
							<span class="title"> Migracion</span>
						</a>
					</li>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemConceptoMigrados","action"=>"index"));?>">
							<span class="title"> Certificados Sueldos</span>
						</a>
					</li>
				</ul>
			</li>
			<li class='<?php echo $liquidaciones;?>'>
				<a href="javascript:void(0)"><i class="fa fa-file-pdf-o"></i>
					<span class="title"> Liquidaciones </span><i class="icon-arrow"></i>
					<span class="selected"></span>
				</a>
				<ul class="sub-menu" <?php echo $liquidaciones_subMenu;?>>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemLiquidaciones","action"=>"listadoLiquidaciones"));?>">
							<span class="title"> Listado de Liquidaciones </span>
						</a>
					</li>
				</ul>
			</li>
			<li class='<?php echo $informes;?>'>
				<a href="javascript:void(0)"><i class="fa fa-tasks"></i>
					<span class="title"> Informes </span><i class="icon-arrow"></i>
					<span class="selected"></span>
				</a>
				<ul class="sub-menu" <?php echo $informes_subMenu;?>>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemInformes","action"=>"cuentasBusqueda"));?>">
							<span class="title"> Informes Cuentas Contables </span>
						</a>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemInformes","action"=>"impuestoUnicoBusqueda"));?>">
							<span class="title"> Informes Impuesto Único </span>
						</a>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemInformes","action"=>"libroRemuneracionBusqueda"));?>">
							<span class="title"> Libro de Remuneración </span>
						</a>
						<?php
							echo $this->Html->link(
								'<span class="title">Informes Por Conceptos</span>', 
								array(
									'controller' => 'informes',
									'action' => 'informePorConcepto'
								),
								array(
									'escape' => false
								)
							);
						?>
					</li>
				</ul>
			</li>
		<?php	}else{?>
				<li class='<?php echo $empresas;?>'>
				<a href="javascript:void(0)"><i class="fa fa-building-o"></i>
					<span class="title"> Empresas </span><i class="icon-arrow"></i>
					<span class="selected"></span>
				</a>
				<ul class="sub-menu" <?php echo $empresas_subMenu;?>>
					<li>
						<a href="<?php echo $this->Html->url(array("plugin"=>"remuneraciones","controller" => "RemEmpresas","action"=>"index"));?>">
							<span class="title"> Listado de Empresas </span>
						</a>
					</li>
				</ul>
			</li>

		<?php }?>
		<?php 
			$roles = $this->Session->read('usuario.roles');
			if($roles == 'administradorGeneral'){?>
				<li class='<?php echo $administrador;?>'>
					<a href="javascript:void(0)"><i class="fa fa-wrench"></i>
						<span class="title"> Administrador </span><i class="icon-arrow"></i>
						<span class="selected"></span>
					</a>
					<ul class="sub-menu" <?php echo $administrador_subMenu;?>>
						<li>
							<a href="<?php echo $this->Html->url(array("plugin"=>"general","controller" => "GeneralUsers","action"=>"index"));?>">
								<span class="title"> Usuarios </span>
							</a>
						</li>
					</ul>
				</li>
			<?php }?>
	
	