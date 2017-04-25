<!-- 
<html>
<body>
 -->
<?php
$fields = array(
				'publication_id' => 'ID',
				'title' => 'T&iacute;tulo',
				'description' => 'Descripci&oacute;n',
				'link' => 'Link',
);

foreach ($fields as $key => $value) {
	$$key = array(
				'name'	=> $key,
				'id'	=> $key,
				'value'	=> (isset($publication))? $publication->$key : set_value($key)
	);
}

$publication_status_option = $this->config->item('publication_status_label');
?>
<script type="text/javascript">

$(document).ready(function (){
<?php if (isset($publication)) {?>
	$("#del_photo").click(function(){
		var item_id = <?php echo $publication->publication_id?>;
		//var dat=$.param($(this));
		$.ajax({
			url: "<?php echo site_url('admin/publication/delete_photo/')?>/" + item_id,
			type: "POST",
			dataType: "html",
			timeout: 30000,
			//data: dat,
			success: function(msg){
				$("#photo").hide();
				$("#del_photo").hide();
			},
			error: function(){;}
		});
	});
<?php }?>
})

</script>
<div class="container_16">
	<div class="grid_16">
		<div class="main_content">
			<p>
				PUBLICACI&Oacute;N &raquo; <a
					href="<?php echo site_url('admin/publication/listar')?>">Listado</a>
				&raquo; <b><?php echo isset($publication)? 'Ficha'.substr($publication->title, 0, 20) : 'Ficha nueva'?>
				</b>
			</p>
			<br>
			<p>
				<a class="a_btn" href="javascript:history.back()">VOLVER</a>
			</p>
			<div class="error_box">
			<?php echo validation_errors()?>
			<?php echo isset($error)? $error : '' ?>
			</div>
			<?php echo form_open_multipart((isset($publication))? 'admin/publication/editar/'.$publication->publication_id : 'admin/publication/agregar')?>
			<input type="hidden" name="publication_id"
				value="<?php echo (isset($publication))? $publication->publication_id : '' ?>">
                        <div class="item_content" style="width: 922px;">
				<table class="item_layout">
					<tr>
						<td><label><?php echo $fields['publication_id']?> </label> <br> <?php echo isset($publication)? $publication->publication_id : ''?>
						</td>
						<td><label for="title"><?php echo $fields['title']?> </label> <br>
						<?php echo form_input($title)?>
						</td>
						<td>
                                                    <label>ESTADO</label> <br> <?php echo form_dropdown('status', $publication_status_option, (isset($publication))? $publication->status : set_value('status')) ?>
						</td>
					</tr>
					<tr>
						<td><label>FOTO</label> <br> <input name="userfile" type="file">
						</td>
						<td><label for="link"><?php echo $fields['link']?> </label> <br> <?php echo form_input($link)?>
						</td>
					</tr>
					<tr>
                                            <td style="width: 300px;"><?php if (isset($publication) && $publication->photo ) {?>
                                                <img id="photo" style="max-width: 100px; max-height: 100px;" alt=""
                                                    src="<?php echo base_url('uploads/publications/'.$publication->photo)?>">
                                                    <a href="javascript:void(0)" id="del_photo">Eliminar foto</a> <?php }?>
                                            </td>
                                            <td colspan="2" style="vertical-align: top;">
                                                <label for="description"><?php echo $fields['description']?> </label>
                                                    <br> <?php //echo form_input($description)?>
                                                    <textarea id="description" name="description" style="width: 515px; height: 90px; resize: none; font-family: Arial; font-size: 12px;"><?php echo $description['value']; ?></textarea>
                                            </td>
					</tr>
				</table>
			</div>
			<br>
			<p>
				<input type="submit" value="GUARDAR" style="margin-right: 10px;"> <a
					class="a_btn" href="<?php echo site_url('admin/publication/listar/')?>">CANCELAR</a>
			</p>
			<?php echo form_close()?>
			<!--<p>
				<a class="a_btn" href="javascript:history.back()">VOLVER</a>
			</p>-->
		</div>
	</div>
</div>
