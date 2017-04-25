<?php
$fields = array(
				'video_id' => 'ID',
				'title' => 'T&iacute;tulo',
				'url' => 'URL',
				'order_number' => '# de orden',
				'date' => 'Fecha',
				'status' => 'ESTADO',
                                'notifications' => 'NOTIFICACIONES',
                                'button_notifications' => 'SEND_ACCION'
				);
$video_status_label = $this->config->item('video_status_label');
$video_status_option = $video_status_label;

$video_status_option_filter = $video_status_option;
$video_status_option_filter[0] = 'Seleccionar'
?>
<script type="text/javascript">

$(document).ready(function (){

	$(".status_select").change(function(){
		var item_id = $(this).attr("id");
		var process_id = "#process_" + item_id;
		var completed_id = "#completed_" + item_id;
		var dat=$.param($(this));
                var value = $(this).val();
                var status_send = $(this).next().val();
                var parent = $(this).parent().parent();
		$(process_id).show();
                
		$.ajax({
			url: "<?php echo site_url('admin/video/update_status/')?>/" + item_id,
			type: "POST",
			dataType: "html",
			timeout: 30000,
			data: dat,
			success: function(msg){
				$(process_id).hide();
				$(completed_id).show();
                                var t=setTimeout("hide_status('"+completed_id+"')",2000);
                                if(value == 1)
                                {
                                    parent.removeClass('video_status2');
                                    parent.addClass('video_status1');
                                    if(status_send == 'Completada')
                                    {
                                        $('#button_status'+item_id).html('<button>Notificaciones completas</button>');
                                    }else{
                                        if(status_send == 'No iniciada')
                                        {
                                            $('#button_status'+item_id).html('<button class="send_nodifications" value="'+item_id+'">Enviar Notificaciones</button>');
                                        }else{
                                            $('#button_status'+item_id).html('<button class="send_nodifications" value="'+item_id+'">Enviar Notificaciones Pendientes</button>');
                                        }
                                    }
                                }else{
                                    parent.removeClass('video_status1');
                                    parent.addClass('video_status2');
                                    $('#button_status'+item_id).html('<button>Notificaciones deshabilitadas</button>');
                                }
                                
			},
			error: function(){
				$(process_id).hide();
				$(completed_id).hide();
			}
		});
	});
	
	$(".fn_eliminar").click(function (){		
		if (confirm("Esta seguro que desea eliminar el video?"))
	  {
		window.location = $(this).attr("rel");
	  }		
	});

	//Filtro
	$("#filter_title").click(function(){
		$( "#filter_content" ).toggle();
		$( "#filter_open" ).toggle();
	});
	
	$("#filter_open").click(function(){
		$( "#filter_content" ).toggle();
		$( "#filter_open" ).hide();
	});
	
	$("#filter_close").click(function(){
		$( "#filter_content" ).toggle();
		$( "#filter_open" ).show();
	});

        $(".send_nodifications").live('click',function(){
            var id_video = $(this).attr('value');
            send_notificaciones(id_video);
        });
        
        function send_notificaciones(id_video)
        {
            update_counter_notified(id_video);
            $('#opacue').show();
            $('#span_counter').show();
            $.ajax({
                url: '<?php echo base_url(); ?>admin/video/send_emails_posts/',
                type: 'POST',
                data: 'id_video='+id_video+'&type=1',
                success: function(data){
                    if(data == 'complete')
                    {
                        $('#opacue').hide();
                        $('#span_counter').hide();
                        $('#name_status'+id_video).html('Completada');
                        $('#status_send'+id_video).val('Completada');
                        $('#button_status'+id_video).html('<button>Notificaciones completas</button>');
                    }else{
                        if(data == 'progress')
                        {
                            send_notificaciones(id_video);
                        }else{
                            $('#opacue').hide();
                            console.log('other state');
                        }
                    }
                }
            });
        }
        
        function update_counter_notified(id_video)
        {
            $.ajax({
                url: '<?php echo base_url(); ?>admin/video/send_emails_posts',
                type: 'POST',
                data: 'id_video='+id_video+'&type=2',
                success: function(data){
                    var array_data = data.split('|');
                    var since = array_data[0];
                    var until = array_data[1];
                    var total = array_data[2];
                    $('#range_send_notif').html(' del '+since+' al '+until+' ');
                    $('#total_send_notif').html(' de '+total);
                }
            });
        }
});

function hide_status(completed_id)
{
    $(completed_id).fadeOut('slow');
}
</script>
<style>
    button{ cursor: pointer;}
</style>
<div class="container_16">
<div class="grid_16">
<div class="main_content">
<p>VIDEO &raquo; Listado</p>
<br>
<div style="background-color: #d9d9d9; padding: 15px;">
	<p>
		<a  id="filter_title" class="a_btn" href="javascript:void(0);" style="font-weight: bold;">FILTROS DE B&Uacute;SQUEDA</a>
		<a id="filter_open" class="a_btn" href="javascript:void(0);" style="float: right;">ABRIR FILTROS</a>
		<span style="clear: both;"></span>
	</p>
	<div id="filter_content" class="<?php echo (!$_POST)? 'invi' :'' ?> ">
		<?php echo form_open('admin/video/listar/')?>
	
		<p>
			<label>ESTADO: </label> <?php echo form_dropdown('status', $video_status_option_filter, isset($criteria_array['status'])? $criteria_array['status']: '') ?>
		</p>
		<hr>
		<p>
			<input id="submit" style="background-color: #bfbfbf; border: 1px solid #999; margin-right: 10px;" type="submit" value="FILTAR"> 
			<a class="a_btn" href="<?php echo site_url('admin/video/listar/')?>">MOSTRAR TODOS</a>
			<a id="filter_close" class="a_btn" href="javascript:void(0);" style="float: right;">CERRAR</a>
			<span style="clear: both;"></span> 
		</p>
		<?php echo form_close()?>
	</div>
</div>

<br>
<?php if(isset($videos)){?>
	<a href="<?php echo site_url('admin/video/agregar/') ?>">AGREGAR</a>
	<br> <br> <br> p&aacute;ginas
	<?php echo $this->pagination->create_links(); ?>
	<br> <br>
	<table class="list">
	<thead>
		<tr>
			<?php foreach ($fields as $key => $value) { ?>
                            <?php if($key == 'notifications'):?>
                                <td>
                                    <b><?php echo $value ?></b>
                                </td>
                            <?php elseif ($key == 'button_notifications'):?>
                                <td>
                                    <b><?php echo $value ?></b>
                                </td>
                            <?php else:?>
                                <td>
                                        <?php if ($this->uri->segment(5) == 'asc') {?>
                                                <a href="<?php echo site_url("admin/video/listar/$key/desc/$criteria_str/")?>"><b><?php echo $value ?></b></a>
                                        <?php } else {?>					
                                                <a href="<?php echo site_url("admin/video/listar/$key/asc/$criteria_str/")?>"><b><?php echo $value ?></b></a>
                                        <?php }?>
                                </td>
                            <?php endif;?>
			<?php }?>
			<td><b>ACCIONES</b></td>

		</tr>
	</thead>
	<tbody>
	<?php foreach($videos as $v){  $video_id = $v->video_id; $status = $this->video_m->getStatusNotifVideo($video_id); ?>
		<tr class="video_status<?php echo $v->status?>">	
			<td><?php echo $v->video_id?></td>
			<td><?php echo $v->title?></td>
			<td><a href="<?php echo $v->url?>" target="_blank"><?php echo $v->url?></td>
			<td><?php echo $v->order_number?></td>
			<td><?php echo date('Y-m-d',strtotime($v->date))?></td>
			<td style="width: 130px;">
                            <?php echo form_dropdown('status', $video_status_option, $v->status,"class='status_select' id='$video_id'") ?>
                            <input type="hidden" name="status_send<?php echo $video_id; ?>" id="status_send<?php echo $video_id; ?>" value="<?php echo $status; ?>" />
                            <span><img id="process_<?php echo $video_id?>" style="display: none;" alt="" src="<?php echo base_url()?>img/process.gif"><img id="completed_<?php echo $video_id?>" style="display: none;" alt="" src="<?php echo base_url()?>img/completed.gif"> </span> 
                        </td>
                        <td id="name_status<?php echo $video_id?>"><?php echo $status; ?></td>
                        <td id="button_status<?php echo $video_id?>"><?php if($status != "Completada" && $v->status == 1):?><button class="send_nodifications" value="<?php echo $video_id; ?>">Enviar Notificaciones <?php echo ($status == "Pendiente")?"Pendientes":""; ?></button><?php elseif($v->status == 1): echo '<button>Notificaciones completas</button>'; else: echo '<button>Notificaciones deshabilitadas</button>'; endif;?></td>
			<td width="75">
                            <a href="<?php echo site_url('admin/video/ver/'.$v->video_id)?>" title="VER"><img alt="VER" src="<?php echo base_url()?>img/pager/see.png"></a>
                            <a href="<?php echo site_url('admin/video/editar/'.$v->video_id)?>" title="EDITAR"><img alt="EDITAR" src="<?php echo base_url()?>img/pager/edit.png"></a>
                            <a href="javascript:void(0);" class="fn_eliminar" rel="<?php echo site_url('admin/video/eliminar/'.$v->video_id)?>" title="ELIMINAR"><img alt="ELIMINAR" src="<?php echo base_url()?>img/pager/delete.png"></a>
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
