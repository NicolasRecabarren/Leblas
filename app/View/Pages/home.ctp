<?php
	$arraySection= [
		1 => [
			'id' => 51,
			'class' => 'parallax-51',
			'style' => 'margin-top: 3px;'
		],
		2 => [
			'id' => 58,
			'class' => 'parallax-58 color_section',
			'style' => ''
		],
		3 => [
			'id' => 59,
			'class' => 'parallax-59',
			'style' => ''
		],
		4 => [
			'id' => 60,
			'class' => 'parallax-60 darkgrey_section',
			'style' => ''
		],
		5 => [
			'id' => 61,
			'class' => 'fullwidth_portfolio',
			'style' => 'padding-top: 0px !important; padding-bottom: 0px !important;'
		]
	];
	
	foreach($arraySection as $number => $sectionAttrs): ?>
		<section id="<?=$sectionAttrs['id'];?>" class="<?=$sectionAttrs['class'];?>"  style="<?=$sectionAttrs['style'];?>">
			<?=$this->Element('secciones/seccion_'.$number,[
				'seccion' => $secciones[$number-1]
			]);?>
		</section>
		<?php
	endforeach;
?>
<section id="contacto" class="color_section">
	<?=$this->Element('secciones/contacto');?>
</section>
<section id="copyright" class="dark_section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<p class="text-center">&copy; Copyright 2018. Av. Nueva Esperanza 777 - Las Condes, Santiago, Chile - contacto@leblas.cl </p>
			</div>
		</div>
	</div>
</section>