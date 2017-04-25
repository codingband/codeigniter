<div class="container_16">
	<div class="grid_16">
		<div class="margin_h1">
			<h1>Cambiar contrase&ntilde;a</h1>
			<div class="error_box">
			<?php echo  validation_errors(); ?>

			</div>
		</div>
	</div>
	<div class="grid_7">
		<div class="margin_h1">
			<div class="form1">
<?php echo form_open('user/new_password')?>
<?php
$password = array(
				'name'	=> 'password',
				'id'	=> 'password',
				'value'	=> set_value('password')
			);

$open_error_tag="<label class='error'>";
$closed_error_tag="</label>";
?>

<p>
<?php echo lang('label_password','password')?>
<?php echo form_password($password)?>
</p>

<p>
<?php echo form_submit('submit',lang('label_submit_new_password'))?>
</p>

<?php echo form_close()?>
			</div>
		</div>
	</div>
	<div class="grid_9"></div>
	<div class="clear"></div>
</div>

<!-- End of view -->