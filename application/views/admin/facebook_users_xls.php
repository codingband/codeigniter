<?php

header('Content-type: application/vnd.ms-excel; encoding="UTF-8"');
header("Content-Disposition: attachment; filename=".$filename);
header("Pragma: no-cache");
header("Expires: 0");

$fields = array(
				'facebook_user_id' => 'ID',
				'first_name' => 'Nombre',
				'last_name' => 'Apellido',
				'email' => 'Email',
				'dni' => 'DNI',
				'user_status' => 'ESTADO'
);
?>
<h4>
<?php echo $title ?>
</h4>
<table border="1" cellspacing="0" cellpadding="0">
	<thead>
		<tr align="center" valign="top" bgcolor="#DDDDDD">
			<?php foreach ($fields as $key => $value) {?>
				<th><?php echo $value?></th>
			<?php } ?>
		</tr>
	</thead>
	<tbody>
	<?php
	$user_status_label = $this->config->item('user_status_label');
	//print_r($user_status_label); die();
	foreach ($facebook_users as $facebook_user){?>
		<tr align="center" valign="top">
				<?php 
				foreach ($fields as $key => $value) {
					if ($key == 'user_status') {
					?>
						<td><?php echo $user_status_label[$facebook_user->$key]; ?></td>
					<?php
					}else {
                                            if($key == 'first_name' || $key == 'last_name')
                                            {
					?>
					<td><?php echo utf8_decode(utf8_decode($facebook_user->$key)); ?></td>
					<?php
                                            }else{
                                                ?>
                                                <td><?php echo $facebook_user->$key?></td>
                                                <?php
                                            }
					}
				} 
				?>
		</tr>
	<?php
	}
	?>
	</tbody>
</table>
