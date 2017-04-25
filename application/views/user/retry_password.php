<!-- 
<html>
<body>
 -->
<?php
$email = array(
				'name'	=> 'email',
				'id'	=> 'email_rp',
				'value'	=> set_value('email')
);
?>
<div class="container_16">
	<div class="grid_16">
		<div class="margin_h1">
			<h1>Recuperar Contrase&ntilde;a</h1>
			<div class="error_box">
			<?php echo  validation_errors(); ?>

			</div>
		</div>
	</div>
	<div class="grid_7">
		<div class="margin_h1">
			<div class="form1">
			<?php echo form_open('user/retry_password')?>
				<p>
				<?php echo lang('label_email','email_rp')?>
					<br>
					<?php echo form_input($email)?>
				</p>
				<p>
				<?php echo form_submit('submit',lang('label_submit_retry_password'))?>
				</p>

				<?php echo form_close()?>
			</div>
		</div>
	</div>
	<div class="grid_9"></div>
	<div class="clear"></div>
</div>
