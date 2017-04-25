
<?php
$username = array(
					'name'	=> 'username',
					'id'	=> 'username',
					'value'	=> set_value('username')
);

$password = array(
					'name'	=> 'password',
					'id'	=> 'password',
					'value'	=> ''
);


?>
<div class="container_16">
	<div class="grid_16">
		<br>
		<br>
		<div class="form_login">
			<p class="tcenter">
				<b>App Equipados Galicia</b><br>
				Panel de administracion
			</p>
			<?php echo  validation_errors("<div class='error_box'>",'</div>')?>
			
			<?php echo form_open('user/login')?>
				<br>
				<p>
				<?php echo lang('label_username','username')?>
					<br>
					<?php echo form_input($username)?>
				</p>

				<p>
				<?php echo lang('label_password','password')?>
					<br>
					<?php echo form_password($password)?>
					<?php echo anchor('user/retry_password',lang('label_retry_password')) ?>
				</p>

				<p>
				<?php echo form_submit('submit',lang('label_submit_login'))?>
				</p>

				<?php echo form_close()?>

		</div>
	</div>
	<div class="clear"></div>
</div>
