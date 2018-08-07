<!DOCTYPE html>
<html>
    <head>
		<!--<meta http-equiv="Content-Type" content="text/html; charset=gb18030">-->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<title>Leblas</title>
		<meta name="description" content="Leblas">
		<meta name="keywords" content="Palabras Claves">
		<meta name="generator" content="Leblas"/>
		<meta name="subject" content="Leblas"/>
		<meta name="abstract" content="Leblas"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="title" content="Leblas">
		<meta name="DC.Title" content="Leblas">
		<meta http-equiv="title" content="Leblas">
		<meta http-equiv="keywords" content="Palabras Claves">
		<meta http-equiv="description" content="Leblas">
		<meta http-equiv="DC.Description" content="Leblas">
		
		<meta name="language" content="es"/>
		<meta name="distribution" content="global"/>
		<meta name="robots" content="all"/>
		<meta name="classification" content="Palabras Claves"/>
		<meta name="Googlebot" content="all"/>
		<meta name="author" content="Leblas">
		
		<meta name="vw96.objectype" content="Index">
		<meta name="resource-type" content="Index">
		<meta name="distribution" content="all">
		<meta name="robots" content="all">
		<meta name="revisit" content="15 days">
		<meta name="DC.Creator" content="Leblas">
		
		<meta property="og:site_name" content="Leblas" />
        
		<?=$this->Html->css('bootstrap');?>
        <?=$this->Html->css('animations');?>
        <?=$this->Html->css('main');?>
        
        <!--<link type="text/css" rel="stylesheet" href="https://www.agmarketing.cl/paquetes/servicio_new/themes/new/css/main.php"/>-->
        <?=$this->Html->css('material-photo-gallery');?>
        
		<?=$this->Html->css('home');?>
		<?= $this->Html->css('jquery.toast.css');?>

		<?= $this->Html->script('vendor/jquery-1.10.2.min.js');?>
    </head>

    <body>
		<div id="top"></div>
		<section id="">
			<?=$this->Element('layout/carrusel_superior');?>
		</section>
        <div id="header-sticky-wrapper" class="sticky-wrapper" style="height: 50px;">
            <section id="header" class="bg-color0">
                <?=$this->Element('layout/menu_superior',['seccionesMenu' => $seccionesMenu]);?>
            </section>
        </div>
        <div id="box_wrap">
            <?= $this->fetch('content'); ?>
		</div>
		<div id="gallery_container"></div>

		<div class="preloader">
			<div class="preloaderimg"></div>
		</div>
		
		<?= $this->Html->script('vendor/respond.min.js');?>
		<? //= $this->Html->script('vendor/placeholdem.min.js');?>
		
		<?= $this->Html->script('vendor/bootstrap.min.js');?>
		<?= $this->Html->script('vendor/hoverIntent.js');?>
		<?= $this->Html->script('vendor/superfish.js');?>
		<?= $this->Html->script('vendor/jquery.actual.min.js');?>
		<?= $this->Html->script('vendor/jquery.countTo.js');?>
		<?= $this->Html->script('vendor/jquery.appear.js');?>
		<?= $this->Html->script('vendor/jquery.elastislide.js');?>
		<?= $this->Html->script('vendor/jquery.flexslider-min.js');?>
		<?= $this->Html->script('vendor/jquery.prettyPhoto.js');?>
		<?= $this->Html->script('vendor/jquery.easing.1.3.js');?>
        <?= $this->Html->script('vendor/jquery.ui.totop.js');?>
        <?= $this->Html->script('vendor/jquery.isotope.min.js');?>
        <?= $this->Html->script('vendor/jquery.easypiechart.min.js');?>
        <?= $this->Html->script('vendor/jflickrfeed.min.js');?>
        <?= $this->Html->script('vendor/jquery.sticky.js');?>
        <?= $this->Html->script('vendor/owl.carousel.min.js');?>
        <?= $this->Html->script('vendor/jquery.nicescroll.min.js');?>
        <?= $this->Html->script('vendor/jquery.fractionslider.min.js');?>
        <?= $this->Html->script('vendor/jquery.scrollTo-min.js');?>
        <?= $this->Html->script('vendor/jquery.localscroll-min.js');?>
        <?= $this->Html->script('vendor/jquery.parallax-1.1.3.js');?>
		<?= $this->Html->script('vendor/modernizr-2.6.2.min.js');?>
		<?= $this->Html->script('vendor/jquery.toast.js');?>
        <?= $this->Html->script('plugins.js');?>
		<?= $this->Html->script('main.js');?>
		<?= $this->Html->script('admin');?>
        
        <!--<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyAraMmqvZFxVHen-vRAZ6uVJpNQ9x_Rh3Q&sensor=false" type="text/javascript" charset="utf-8"></script>-->
		        
		<div id="val"></div>
        <?= $this->Html->script('vendor/material-photo-gallery.js');?>
        <?=$this->Html->script('home');?>
    </body>
</html>