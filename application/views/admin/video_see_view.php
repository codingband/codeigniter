<?php
$fields = array(
				'video_id' => 'ID',
				'title' => 'T&iacute;tulo',
				'url' => 'URL',
				'order_number' => '# de orden',
);

$video_status_option = $this->config->item('video_status_label');

?>
<div class="container_16">
	<div class="grid_16">
		<div class="main_content">

			<p>
				VIDEO &raquo; <a href="<?php echo site_url('admin/video/listar')?>">Listado</a>
				&raquo; <b><?php echo 'Ficha'.substr($video->title, 0, 20)?>
				</b>
			</p>
			<br>
			<p>
				<a class="a_btn" href="javascript:history.back()">VOLVER</a>
			</p>

			<div class="item_content">
				<table class="item_layout">
					<tr>
						<td>
							<label><?php echo $fields['video_id']?></label> <br> <?php echo $video->video_id?>
						</td>
						<td>
							<label><?php echo $fields['title']?> </label> <br> <?php $video->title?>
						</td>
						<td>
                                                    <label><?php echo $fields['url']?> </label> <br> <a href="<?php echo $video->url?>" target="_blank"><?php echo $video->url?></a>
						</td>

					</tr>
					<tr>
						<td>
							<label><?php echo $fields['order_number']?></label> <br> <?php echo $video->order_number?>
						</td>
						<td>
							<label>ESTADO</label> <br> <?php echo $video_status_option[$video->status]?>
						</td>
						<td>
							<label>ASUNTO EMAIL</label> <br> <?php echo (isset($video->subject))? $video->subject : '';?>
						</td>
					</tr>
				</table>
			</div>
			<br>
				<a class="a_btn" href="javascript:history.back()">VOLVER</a>
			</p>
		</div>
	</div>
</div>
