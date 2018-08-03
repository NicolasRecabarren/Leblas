<div class="row hidden-xs hidden-sm hidden-md">
	<?php
		$ambiente = defined("ambiente")? ambiente : "produccion";
		if(strtolower($ambiente)!="produccion"){
			?>
			<style type="text/css">
				.footer-inner{
					background-color: rgba(50,50,50,0.86) !important;
				}
				marquee {
					color:#fff;
					font-weight: bold;
					font-size: 25px;
					margin-top: -5px;
					margin-bottom: -5px;
				}
			</style>
			<div class="col-md-12 text-center">
				<marquee scrollamount="18" behavior="alternate" style=""> Ambiente <?=ucfirst($ambiente);?> </marquee>
			</div>
			<?php
		}else{
			?>
			<div class="col-md-4">
				<i class="fa fa-map-marker fa-2x"></i>
				<label style="color:#fff;"> Av. Salvador 95 of 101, Providencia Santiago</label>
			</div>
			<div class="col-md-4 text-center">
				<i class="fa fa-phone fa-2x"></i>
				<label style="color:#fff;"> Tel.: +56 2 2431 1800 / +56 2 2274 3280</label>
			</div>
			<div class="col-md-4 text-center">
				<i class="fa fa-laptop fa-2x"></i>
				<label style="color:#fff;"> Web: 
					<a href="//www.kiptor.cl" target="_blank" style="color: #fff;">www.kiptor.cl</a>
				</label>
			</div>
			<?php
		}
	?>
</div>
<div class="row visible-xs visible-sm visible-md">
	<?php
		if(strtolower($ambiente)!="produccion"){
			?>
			<div class="col-md-12 text-center">
				<label class="label-footer-especial">
					Ambiente <?=ucfirst($ambiente);?>
				</label>
			</div>
			<?php
		}else{
			?>
			<div class="col-md-12" style="text-align: center;">
				<i class="fa fa-laptop fa-1x"></i>&nbsp;
				<label style="color:#fff;"> Web: www.kiptor.cl</label>
			</div>
			<?php
		}
	?>
</div>