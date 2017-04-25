<?php
$fields = array(
				'video_id' => 'ID',
				'title' => 'T&iacute;tulo',
				'url' => 'URL',
				'order_number' => '# de orden',
);


foreach ($fields as $key => $value) {

	$$key = array(
				'name'	=> $key,
				'id'	=> $key,
				'value'	=> (isset($video))? $video->$key : set_value($key)
	);
}

$video_status_option = $this->config->item('video_status_label');

?>
<div class="container_16">
	<div class="grid_16">
		<div class="main_content">

			<p>
				VIDEO &raquo; <a href="<?php echo site_url('admin/video/listar')?>">Listado</a>
				&raquo; <b><?php echo isset($video)? 'Ficha'.substr($video->title, 0, 20) : 'Ficha nueva'?>
				</b>
			</p>
			<br>
			<p>
				<a class="a_btn" href="javascript:history.back()">VOLVER</a>
			</p>
			<div class="error_box">
			<?php echo validation_errors()?>
			</div>
			<?php echo form_open((isset($video))? 'admin/video/editar/'.$video->video_id : 'admin/video/agregar')?>
			<input type="hidden" name="video_id"
				value="<?php echo (isset($video->video_id))? $video->video_id : '' ?>">
			<div class="item_content">
				<table class="item_layout">
					<tr>
						<td><label><?php echo $fields['video_id']?></label> <br> <?php echo isset($video)? $video->video_id : ''?>
						</td>
						<td><label for="title"><?php echo $fields['title']?> </label> <br>
						<?php echo form_input($title)?>
						</td>
						<td><label for="url"><?php echo $fields['url']?> </label> <br> <?php echo form_input($url)?>
						</td>

					</tr>
					<tr>
						<td><label for="order_number"><?php echo $fields['order_number']?>
						</label> <br> <?php echo form_input($order_number)?>
						</td>
						<td><label>ESTADO</label> <br> <?php echo form_dropdown('status', $video_status_option, (isset($video->status))? $video->status : set_value('status')) ?>
						</td>
						<td><label>ASUNTO EMAIL</label> <br> <input type="text" name="subject" id="subject" value="<?php echo (isset($video->subject))? $video->subject : '';?>" />
						</td>
					</tr>
				</table>
			</div>
			<br>
			<p>
			<input type="submit" value="GUARDAR" style="margin-right: 10px;"> <a class="a_btn" href="<?php echo site_url('admin/video/listar/')?>">CANCELAR</a>
			</p>
			<?php echo form_close()?>
			<!--<p>
				<a class="a_btn" href="javascript:history.back()">VOLVER</a>
			</p>-->
		</div>
	</div>
</div>
