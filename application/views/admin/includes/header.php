<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo isset($title)? $title:TITLE_PAGE?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/reset.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/960.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/template.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/menu.css" media="screen" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/ui-lightness/jquery-ui.custom.css" media="screen" />
	<script type="text/javascript" src="<?php echo base_url()?>js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>js/jquery-ui.custom.min.js"></script>
	<!--[if lt IE 8]>
	<script type="text/javascript" src="<?php echo base_url()?>js/mootools-yui-compressed.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>js/selectivizr-min.js"></script>
	<![endif]--> 
</head>
<body>
<div id="header">
	<div class="container_16">
		<div class="grid_16"><br></div>

		<div class="grid_10">			
			<img alt="TB" src="<?php echo base_url()?>img/BE_logo.png">
		</div>
		<div class="grid_6">
			<div class="tright">
				<p style="line-height: 1.3em;">
					<b>App Equipados Galicia</b> <br>
					Panel de administraci&oacute;n<br> 
				</p>
				<!--<p><?php //echo anchor('publico','Salir del panel')?> </p>-->
			
				<p>Bienvenido <?php echo $this->session->userdata('name');?> | <?php echo anchor('user/logout','Salir')?></p>
			</div>
		</div>

		<div class="grid_16"><br></div>
		<div class="grid_16">
			<ul id="navigation" class="nav-main">
            	<li class="<?php echo (isset($nav_main) && $nav_main==1)? 'current':''?>"><?php echo anchor('admin/facebook_user/listar','USUARIOS')?></li>
            	<li class="<?php echo (isset($nav_main) && $nav_main==2)? 'current':''?>"><?php echo anchor('admin/publication/listar','PUBLICACIONES')?></li>
            	<li class="<?php echo (isset($nav_main) && $nav_main==3)? 'current':''?>"><?php echo anchor('admin/video/listar','VIDEOS')?></li>
            	<li class="<?php echo (isset($nav_main) && $nav_main==4)? 'current':''?>"><?php echo anchor('admin/statistics','ESTAD&Iacute;STICAS')?></li>
            	<li class="<?php echo (isset($nav_main) && $nav_main==5)? 'current':''?>"><?php echo anchor('admin/configuration','CONFIGURACIONES')?></li>
			</ul>
		</div>
		<div class="grid_16"><br></div>
        <div class="clear"></div>
	</div>
</div>
<div id="body">