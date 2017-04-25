<!-- 
<html>
<body>
 -->
<?php
$first_name = array(
				'name'	=> 'first_name',
				'id'	=> 'first_name',
				'value'	=> set_value('first_name')
);
$last_name = array(
				'name'	=> 'last_name',
				'id'	=> 'last_name',
				'value'	=> set_value('last_name')
);
$phone = array(
				'name'	=> 'phone',
				'id'	=> 'phone',
				'value'	=> set_value('phone')
);
$enterprise = array(
				'name'	=> 'enterprise',
				'id'	=> 'enterprise',
				'value'	=> set_value('enterprise')
);
$country = array(
				'name'	=> 'country',
				'id'	=> 'country',
				'value'	=> set_value('country')
);
$email = array(
				'name'	=> 'email',
				'id'	=> 'email',
				'value'	=> set_value('email')
);
$password = array(
				'name'	=> 'password',
				'id'	=> 'password',
				'value'	=> set_value('password')
);
$passconf = array(
				'name'	=> 'passconf',
				'id'	=> 'passconf',
				'value'	=> set_value('passconf')
);

$options = array(
				  ''	=> 'Seleccionar',
                  '1' 	=> 'Bolivia',
                  '2'   => 'Argentina',
                  '3'   => 'Peru',
                  '4' 	=> 'Mexico'
                );
	
?>
<div class="container_16">
	<div class="grid_16">
		<div class="margin_h1">
			<h1>Ingreso de USUARIOS</h1>
			<div class="error_box">
			<?php echo  validation_errors(); ?>

			</div>
		</div>
	</div>
	<div class="grid_7">
		<div class="margin_h1">
			<div class="form1">
			<?php echo form_open('user/signup')?>

				<p>
				<?php echo lang('label_first_name','first_name')?>
					<br>
					<?php echo form_input($first_name)?>
				</p>

				<p>
				<?php echo lang('label_last_name','last_name')?>
					<br>
					<?php echo form_input($last_name)?>
				</p>


				<p>
				<?php echo lang('label_phone','phone')?>
					<br>
					<?php echo form_input($phone)?>
				</p>

				<p>
				<?php echo lang('label_enterprise','enterprise')?>
					<br>
					<?php echo form_input($enterprise)?>
				</p>

				<p>
				<?php echo lang('label_country','country')?>
					<br> <?php echo form_dropdown('country', $options, set_value('country'));?>

				</p>
				<p>
				<?php echo lang('label_email','email')?>
					<br>
					<?php echo form_input($email)?>
				</p>
				<p>
				<?php echo lang('label_password','password')?>
					<br>
					<?php echo form_password($password)?>
				</p>
				<p>
				<?php echo lang('label_passconf','passconf')?>
					<br>
					<?php echo form_password($passconf)?>
				</p>

				<p>
				<?php echo form_submit('submit',lang('label_submit_signup'))?>
				</p>

				<?php echo form_close()?>
			</div>
		</div>
	</div>
	<div class="grid_9"></div>
	<div class="clear"></div>
</div>
