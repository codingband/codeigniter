<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo isset($title)? $title:TITLE_PAGE?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/reset.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/960.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/template.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/menu.css" media="screen" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.min.js"></script>
<!--[if lt IE 8]>
<script type="text/javascript" src="<?php echo base_url()?>js/mootools-yui-compressed.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/selectivizr-min.js"></script>
<![endif]--> 
</head>
<body>
	<div id="header">
		<div class="container_16">
			<div class="grid_16">
				<br>
			</div>
			<div class="grid_10">
				<img alt="TB" src="<?php echo base_url()?>img/BE_logo.png">
			</div>
			<div class="grid_6">
				<div class="tright">
					<p><b>App Equipados Galicia</b> <br><br> </p>
					<?php if ($this->auth->logged_in()) { ?>
						<p>
							Bienvenido
							<?php echo $this->session->userdata('name'); ?>
							|
							<?php echo anchor('user/logout', 'Logg out') ?>
						</p>
					<?php } else { ?>
						<p>
							Bienvenido
							<?php echo $this->session->userdata('name'); ?>
							|
							<?php echo anchor('user/logout', 'Logg out') ?>
						</p>
					<?php } ?>
				</div>
			</div>
			<div class="grid_16">
				<br>
			</div>
			<div class="grid_16">
				<ul id="navigation" class="nav-main">
					<li
						class="<?php echo (isset($nav_main) && $nav_main == 1) ? 'current' : '' ?>"><?php echo anchor('publico/inicio', 'Inicio') ?>
					</li>
					<li
						class="<?php echo (isset($nav_main) && $nav_main == 2) ? 'current' : '' ?>"><?php echo anchor('admin', 'Panel de administracion') ?>
					</li>
				</ul>
			</div>
			<div class="grid_16">
				<br>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div id="body">