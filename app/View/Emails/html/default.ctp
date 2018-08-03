<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts.Email.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- If you delete this meta tag, Half Life 3 will never be released. -->
<meta name="viewport" content="width=device-width" />

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Basic</title>
	
<style>
*{
	margin:0;
	padding:0
	}
*{
	font-family:"Helvetica Neue","Helvetica",Helvetica,Arial,sans-serif
	}
img{
	max-width:100%
	}
.collapse{
	margin:0;
	padding:0
	}
body{
	-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;width:100% !important;
	height:100%
	}
a{
	color:#2ba6cb
	} 
.btn{
	display: inline-block;
	padding: 6px 12px;
	margin-bottom: 0;
	font-size: 14px;
	font-weight: normal;
	line-height: 1.428571429;
	text-align: center;
	white-space: nowrap;
	vertical-align: middle;
	cursor: pointer;
	border: 1px solid transparent;
	border-radius: 4px;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	-o-user-select: none;
	user-select: none;
	color: #333;
	background-color: white;
	border-color: #CCC;
	} 
p.callout{
	padding:15px;
	background-color:#ecf8ff;
	margin-bottom:15px
	}
.callout a{
	font-weight:bold;
	color:#2ba6cb
	}
table.social{
	background-color:#ebebeb
	}
.social .soc-btn{
	padding:3px 7px;
	border-radius:2px; 
	-webkit-border-radius:2px; 
	-moz-border-radius:2px; 
	font-size:12px;
	margin-bottom:10px;
	text-decoration:none;
	color:#FFF;
	font-weight:bold;
	display:block;
	text-align:center
	}
a.fb{
	background-color:#3b5998 !important
	}
a.tw{
	background-color:#1daced !important
	}
a.gp{
	background-color:#db4a39 !important
	}
a.ms{
	background-color:#000 !important
	}
.sidebar .soc-btn{
	display:block;width:100%
	}
table.head-wrap{
	width:100%
	}
.header.container table td.logo{
	padding:15px
	}
.header.container table td.label{
	padding:15px;
	padding-left:0
	}
table.body-wrap{
	width:100%
	}
table.footer-wrap{
	width:100%;
	clear:both !important
	}
.footer-wrap .container td.content p{
	border-top:1px solid #d7d7d7;
	padding-top:15px
	}
.footer-wrap .container td.content p{
	font-size:10px;
	font-weight:bold
	}
h1,h2,h3,h4,h5,h6{
	font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
	line-height:1.1;
	margin-bottom:15px;
	color:#000
	}
h1 small,h2 small,h3 small,h4 small,h5 small,h6 small{font-size:60%;
	color:#6f6f6f;
	line-height:0;
	text-transform:none
	}
h1{
	font-weight:200;
	font-size:44px
	}
h2{
	font-weight:200;
	font-size:37px
	}
h3{font-weight:500;
	font-size:27px
	}
h4{
	font-weight:500;
	font-size:23px
	}
h5{
	font-weight:900;
	font-size:17px
	}
h6{
	font-weight:900;
	font-size:14px;
	/*text-transform:uppercase;*/
	color:#444
	}
.collapse{
	margin:0 !important
	}
p,ul{
	margin-bottom:10px;
	font-weight:normal;
	font-size:14px;
	line-height:1.6
	}
p.lead{
	font-size:17px
	}
p.last{
	margin-bottom:0
	}
ul li{
	margin-left:5px;
	list-style-position:inside
	}
ul.sidebar{
	background:#ebebeb;
	display:block;
	list-style-type:none
	}
ul.sidebar li{
	display:block;
	margin:0
	}
ul.sidebar li a{
	text-decoration:none;
	color:#666;
	padding:10px 16px;
	margin-right:10px;
	cursor:pointer;
	border-bottom:1px solid #777;
	border-top:1px solid #fff;
	display:block;
	margin:0
	}
ul.sidebar li a.last{
	border-bottom-width:0
	}
ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p{
	margin-bottom:0 !important
	}
.container{
	display:block !important;
	max-width:600px !important;
	margin:0 auto !important;
	clear:both !important
	}
.content{
	padding:15px;
	max-width:600px;
	margin:0 auto;
	display:block
	}
.content table{
	width:100%
	}
.column{
	width:300px;
	float:left
	}
.column tr td{
	padding:15px
	}
.column-wrap{
	padding:0 !important;
	margin:0 auto;
	max-width:600px !important
	}
.column table{
	width:100%
	}
.social .column{
	width:280px;
	min-width:279px;
	float:left
	}
.clear{
	display:block;
	clear:both
	}
@media only screen and (max-width:600px){
	a[class="btn"]{
		display:block !important;
		margin-bottom:10px !important;
		background-image:none !important;
		margin-right:0 !important
		}
	div[class="column"]{
		width:auto !important;
		float:none !important
		}
	table.social div[class="column"]{
		width:auto !important
		}
	}
</style>

</head>
 
<body bgcolor="#FFFFFF">

<!-- HEADER -->
<table class="head-wrap">
	<tr>
		<td></td>
		<td class="header container" >
				
				<div class="content">
					<table>
						<tr>
							<td></td>
							<td align="right"><h6 style="font-weight:900;font-size:14px;color:#444" class="collapse">Proceso de Remuneraciones</h6></td>
						</tr>
						<tr>
                            <td></td>
                            <td align="right"><h6 style="font-weight:900;font-size:14px;color:#444" class="collapse"><?php echo $empresa;?></h6></td>
                        </tr>
					</table>
				</div>
				
		</td>
		<td></td>
	</tr>
</table><!-- /HEADER -->
<!-- BODY -->
<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" bgcolor="#FFFFFF">

			<div class="content">
			<table>
				<tr>
					<td style="padding:15px;background-color:#ecf8ff;margin-bottom:15px; border-radius: 10px;font-size:16px;">
						<h3>Estimado, <?php echo $nombre; ?></h3>
						<!-- Callout Panel -->
						<p class="callout">
							<?php echo $this->fetch('content'); ?>
						</p><!-- /Callout Panel -->		
						<table>
							<tr>
								<th style="border:1px solid;font-size:12px;">Usuario</th>
								<th style="border:1px solid;font-size:12px;">Fecha</th>
								<th style="border:1px solid;font-size:12px;">Comentario Anexo</th>
							</tr>
							<tr>
								<td style="background-color:#ebebeb; border-radius: 0px 0px 0px 5px; border: 1px solid #d7d7d7;font-size:12px;"><?php echo $usuario ?></td>
								<td style="background-color:#ebebeb; border-radius: 0px 0px 0px 0px; border: 1px solid #d7d7d7;font-size:12px;"><?php echo $fecha ?></td>
								<td style="background-color:#ebebeb; border-radius: 0px 0px 5px 0px; border: 1px solid #d7d7d7;font-size:12px;"><?php echo $comentario ?></td>
							</tr>
						</table>
						<div class="linkSitio" style="margin: 12px 0 15px 5px; font-size: 13px;">
                            <a href="http://rem.jrconsultores.cl/" title="Ir a" target="_blank">http://rem.jrconsultores.cl/</a>
                        </div>
						<p class="callout">
							Atte,<br />
							Servicios Laborales
						</p>			
						<br />
						<!-- social & contact -->
						<table class="social" style="background-color:#ebebeb; border-radius: 5px; border: 1px solid #d7d7d7;" width="100%">
							<tr>
								<td style="font-size:10px;">
									Ante cualquier consulta o duda por favor contactar con el operador de remuneraciones de su empresa.									
									<span class="clear"></span>	
									
								</td>
							</tr>
						</table><!-- /social & contact -->
						
					</td>
				</tr>
			</table>
			</div><!-- /content -->
									
		</td>
		<td></td>
	</tr>
</table><!-- /BODY -->

<!-- FOOTER -->
<table class="footer-wrap" style="width: 100%;">
	<tr>
		<td></td>
		<td class="container">
			
				<div class="content">
				<table style="width: 100%;">
				<tr>
					<td align="center">
						<p style="font-size:10px;font-weight:bold;border-top:1px solid #d7d7d7;padding-top:15px">
							Sistema Remuneraciones | 2016
							<!--<a href="#">Terms</a> |
							<a href="#">Privacy</a> |
							<a href="#"><unsubscribe>Unsubscribe</unsubscribe></a>-->
						</p>
					</td>
				</tr>
			</table>
				</div>
				
		</td>
		<td></td>
	</tr>
</table>

</body>
</html>