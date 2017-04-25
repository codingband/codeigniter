
<?php
$fields = array(
				'publication_id' => 'ID',
				'title' => 'T&iacute;tulo',
				'description' => 'Descripci&oacute;n',
				'link' => 'Link',
);

$publication_status_option = $this->config->item('publication_status_label');
?>

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

			<div class="item_content">
				<table class="item_layout">
					<tr>
						<td><label><?php echo $fields['publication_id']?> </label> <br> <?php echo $publication->publication_id?>
						</td>
						<td><label><?php echo $fields['title']?> </label> <br> <?php echo $publication->title?>
						</td>
						<td><label><?php echo $fields['description']?> </label> <br> <?php echo $publication->description?>
						</td>
					</tr>
					<tr>
						<td><label>FOTO</label> <br>
						</td>
						<td><label><?php echo $fields['link']?> </label> <br> <?php echo $publication->link?>
						</td>
						<td><label>ESTADO</label> <br> <?php echo $publication_status_option[$publication->status] ?>
						</td>

					</tr>
					<tr>
						<td colspan="3"><?php if (isset($publication) && $publication->photo ) {?>
							<img id="photo" style="max-width: 100px; max-height: 100px;" alt=""
							src="<?php echo base_url('uploads/publications/'.$publication->photo)?>">
							 <?php }?>
						</td>
					</tr>
				</table>
			</div>
			<br>
			<p>
				<a class="a_btn" href="javascript:history.back()">VOLVER</a>
			</p>
		</div>
	</div>
</div>
