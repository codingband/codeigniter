<?php
$fields = array(
				'publication_id' => 'ID',
				'title' => 'T&iacute;tulo',
				'description' => 'Descripci&oacute;n',
				'photo' => 'Foto',
				'link' => 'Link',
				'date' => 'Fecha',
				'status' => 'ESTADO'

				);

				$publication_status_label = $this->config->item('publication_status_label');
				$publication_status_option = $publication_status_label;
				?>
<script type="text/javascript">

$(document).ready(function (){

	$(".status_select").change(function(){
		var item_id = $(this).attr("id");
		var process_id = "#process_" + item_id;
		var completed_id = "#completed_" + item_id;
		var dat=$.param($(this));
		$(process_id).show();
		$.ajax({
			url: "<?php echo site_url('admin/publication/update_status/')?>/" + item_id,
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
	
	$(".fn_eliminar").click(function (){		
		if (confirm("Esta seguro que desea eliminar el publication?"))
		  {
			window.location = $(this).attr("rel");
		  }		
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
			<p>PUBLICACIONES &raquo; Listado</p>
			<br>
			<?php if(isset($publications)){?>
			<a href="<?php echo site_url('admin/publication/agregar/') ?>">AGREGAR</a>
			<br> <br> <br> p&aacute;ginas
			<?php echo $this->pagination->create_links(); ?>
			<br> <br>
			<table class="list">
                            <thead>
                                <tr>
                                <?php foreach ($fields as $key => $value) { ?>
                                    <td><?php if ($this->uri->segment(5) == 'asc') {?> <a
                                            href="<?php echo site_url("admin/publication/listar/$key/desc/$criteria_str/")?>"><b><?php echo $value ?>
                                            </b> </a> <?php } else {?> <a
                                            href="<?php echo site_url("admin/publication/listar/$key/asc/$criteria_str/")?>"><b><?php echo $value ?>
                                            </b> </a> <?php }?>
                                    </td>
                                    <?php }?>
                                    <td><b>ACCIONES</b></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($publications as $p){ $publication_id = $p->publication_id ?>
                                <tr class="publication_status<?php echo $p->status?>">
                                    <td><?php echo $p->publication_id?></td>
                                    <td><?php echo $p->title?></td>
                                    <td><?php echo $p->description?></td>
                                    <td><img style="height: 22px;" alt=""
                                            src="<?php echo base_url('uploads/publications/'.$p->photo)?>">
                                    </td>
                                    <td><?php echo $p->link?></td>
                                    <td><?php echo date('Y-m-d', strtotime($p->date)) ?></td>
                                    <td style="width: 90px;"><?php echo form_dropdown('status', $publication_status_option, $p->status,"class='status_select' id='$publication_id'") ?><span><img
                                                    id="process_<?php echo $publication_id?>" style="display: none;"
                                                    alt="" src="<?php echo base_url()?>img/process.gif"><img
                                                    id="completed_<?php echo $publication_id?>"
                                                    style="display: none;" alt=""
                                                    src="<?php echo base_url()?>img/completed.gif"> </span>
                                    </td>
                                    <td width="75">
                                        <a href="<?php echo site_url('admin/publication/ver/'.$p->publication_id)?>" title="VER"><img alt="VER" src="<?php echo base_url()?>img/pager/see.png"></a>
                                        <a href="<?php echo site_url('admin/publication/editar/'.$p->publication_id)?>" title="EDITAR"><img alt="EDITAR" src="<?php echo base_url()?>img/pager/edit.png"></a> 
                                        <a href="javascript:void(0);" title="ELIMINAR" class="fn_eliminar" rel="<?php echo site_url('admin/publication/eliminar/'.$p->publication_id)?>"><img alt="ELIMINAR" src="<?php echo base_url()?>img/pager/delete.png"></a>
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
