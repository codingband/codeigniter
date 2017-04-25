<?php
$fields = array(
				'facebook_user_id' => 'ID',
				'first_name' => 'Nombre',
				'last_name' => 'Apellido',
				'email' => 'Email',
				'dni' => 'DNI',
				'user_status' => 'ESTADO'
);
$user_status_label = $this->config->item('user_status_label');
$user_status_option = $user_status_label;

?>

<script type="text/javascript">

$(document).ready(function (){

	$(".user_status_select").change(function(){
		var item_id = $(this).attr("id");
		var process_id = "#process_" + item_id;
		var completed_id = "#completed_" + item_id;
		var dat=$.param($(this));
		$(process_id).show();
		$.ajax({
			url: "<?php echo site_url('admin/facebook_user/update_user_status/')?>/" + item_id,
			type: "POST",
			dataType: "html",
			timeout: 30000,
			data: dat,
			success: function(msg){
				$(process_id).hide();
				$(completed_id).show();
                                var t=setTimeout("hide_status('"+completed_id+"')",2000);
			},
			error: function(){
				$(process_id).hide();
				$(completed_id).hide();
			}
		});
	});

	$("#xls").click(function(){
		$("#form_xls").submit();
	});
});
function hide_status(completed_id)
{
    $(completed_id).fadeOut('slow');
}
</script>
<div class="container_16">
	<div class="grid_16">
		<div class="main_content">

			<p>USUARIOS &raquo; Listado</p>
			<br>
			<table>
				<tr>
					<td style="padding-right: 15px;">
					<b>Herramientas:</b>
					</td>
					<td style="padding-right: 5px;">
						<?php 
							$field=  $this->uri->segment(4);
							if (!$field) {
								$field=  'facebook_user_id';
							}
							$criteria_str=  $this->uri->segment(6);
						?>						
						<a id="xls" href="<?php echo site_url("admin/facebook_user/export_xls/$field/asc/$criteria_str/")?>"><img style="vertical-align: middle;" border="0" alt="XLS" src="<?php echo base_url()?>img/xls_icon.png"></a>
					</td>
					<td style="line-height: 1.5em;">
						Exportar listado XLS<br>
						<span style="font-size: 0.9em;">Atenci&oacute;n la exportacion responde a los filtros de b&uacute;squeda aplicados</span>
					</td>
				</tr>
			</table>
			<?php if(isset($facebook_users)){?>
			<br> p&aacute;ginas
			<?php echo $this->pagination->create_links(); ?>
			<br> <br>

			<table class="list">
				<thead>
					<tr>
					<?php foreach ($fields as $key => $value) { ?>
						<td><?php if ($this->uri->segment(5) == 'asc') {?> <a
							href="<?php echo site_url("admin/facebook_user/listar/$key/desc/$criteria_str/")?>"><b><?php echo $value ?>
							</b> </a> <?php } else {?> <a
							href="<?php echo site_url("admin/facebook_user/listar/$key/asc/$criteria_str/")?>"><b><?php echo $value ?>
							</b> </a> <?php }?>
						</td>
						<?php }?>

					</tr>
				</thead>
				<tbody>
				<?php foreach($facebook_users as $f){ $facebook_user_id = $f->facebook_user_id ?>
					<tr class="facebook_user_status<?php echo $f->user_status?>">
						<td><?php echo $f->facebook_user_id?></td>
						<td><?php echo utf8_decode($f->first_name);?></td>
						<td><?php echo utf8_decode($f->last_name);?></td>
						<td><?php echo $f->email?></td>
						<td><?php echo $f->dni?></td>
						<td><?php echo form_dropdown('user_status', $user_status_option, $f->user_status,"class='user_status_select' id='$facebook_user_id'") ?>
							<span><img id="process_<?php echo $facebook_user_id?>"
								style="display: none;" alt=""
								src="<?php echo base_url()?>img/process.gif"> <img
								id="completed_<?php echo $facebook_user_id?>"
								style="display: none;" alt=""
								src="<?php echo base_url()?>img/completed.gif"> </span>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>
			p&aacute;ginas
			<?php echo $this->pagination->create_links(); ?>
			<?php }?>
		</div>
	</div>
</div>
