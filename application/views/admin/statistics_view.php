<script type="text/javascript">
$(document).ready(function (){
    $( "#desde" ).datepicker({
        inline: true,
        dateFormat: 'yy-mm-dd',
        //minDate: 0,
        buttonImage: '<?php echo base_url(); ?>img/calendar.png',
        onSelect: function(dateText) {
                                }
    });
    
    $( "#hasta" ).datepicker({
        inline: true,
        dateFormat: 'yy-mm-dd',
        //minDate: 0,
        buttonImage: '<?php echo base_url(); ?>img/calendar.png',
        onSelect: function(dateText) {
                                }
    });
    
    $('#filtrar').click(function(){
        var ini = $('#desde').val();
        var fin = $('#hasta').val();
        
        if(ini == '')
        {
            ini = 'null';
        }
        
        if(fin == '')
        {
            fin = 'null';
        }
        
        document.location.href = '<?php echo base_url();?>admin/statistics/listar/'+ini+'/'+fin;
    });
});
</script>
<style type="text/css">
    .publication_status{height: 30px;}
</style>
<div class="container_16">
    <div class="grid_16">
        <div class="main_content">
            <p>ESTAD&Iacute;STICAS</p>
            <br>
            <table>
                <tr>
                    <td style="padding-right: 15px;">
                    <b>Herramientas:</b>
                    </td>
                    <td style="padding-right: 5px;">
                        <?php $ini = ($desde == '')?'null':$desde;?>
                        <?php $fin = ($hasta == '')?'null':$hasta;?>
                        <a id="xls" href="<?php echo site_url("admin/statistics/export_xls/".$ini.'/'.$fin.'/')?>"><img style="vertical-align: middle;" border="0" alt="XLS" src="<?php echo base_url()?>img/xls_icon.png"></a>
                        Exportar listado XLS<br>
                        <br>
                    </td>
                    <td style="line-height: 1.5em;">
                        <span style="font-size: 0.9em;">Atenci&oacute;n la exportacion responde a los filtros de b&uacute;squeda aplicados</span>
                    </td>
                </tr>
                <tr>
                    <td style="padding-right: 15px;">
                    <b>Filtros:</b>
                    </td>
                    <td style="padding-right: 5px;">
                        Desde: <input type="text" name="desde" id="desde" value="<?php echo $desde;?>" />
                    </td>
                    <td style="line-height: 1.5em;">
                        Hasta: <input type="text" name="hasta" id="hasta" value="<?php echo $hasta;?>" />
                        <button id="filtrar">Filtrar</button>
                    </td>
                </tr>
            </table>
            <table class="list">
                <thead>
                    <tr>
                        <td>DATO</td>
                        <td>VALOR</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="publication_status">
                        <td>Cantidad de usuarios &uacute;nicos</td>
                        <td><?php echo $ammount_users; ?></td>
                    </tr>
                    <tr class="publication_status">
                        <td>Cantidad de amigos invitados</td>
                        <td><?php echo $ammount_invite_friends; ?></td>
                    </tr>
                    <tr class="publication_status">
                        <td>Cantidad de noticias publicadas</td>
                        <td><?php echo $ammount_tips; ?></td>
                    </tr>
                    <tr class="publication_status">
                        <td>Cantidad de likes en las noticias</td>
                        <td><?php echo $ammount_likes_tips; ?></td>
                    </tr>
                    <tr class="publication_status">
                        <td>Cantidad de unlikes en las noticias</td>
                        <td><?php echo $ammount_unlikes_tips; ?></td>
                    </tr>
                    <tr class="publication_status">
                        <td>Cantidad de comentarios en las noticias</td>
                        <td><?php echo $ammount_comments_tips; ?></td>
                    </tr>
                    <tr class="publication_status">
                        <td>Cantidad de comentarios borrados en las noticias</td>
                        <td><?php echo $ammount_uncomments_tips; ?></td>
                    </tr>
                    <tr class="publication_status">
                        <td>Cantidad de tweets en las noticias</td>
                        <td><?php echo $ammount_tweets_tips; ?></td>
                    </tr>
                    <tr class="publication_status">
                        <td>Cantidad de likes en los videos</td>
                        <td><?php echo $ammount_likes_video; ?></td>
                    </tr>
                    <tr class="publication_status">
                        <td>Cantidad de unlikes en los videos</td>
                        <td><?php echo $ammount_unlikes_video; ?></td>
                    </tr>
                    <tr class="publication_status">
                        <td>Cantidad de comentarios en los videos</td>
                        <td><?php echo $ammount_comments_video; ?></td>
                    </tr>
                    <tr class="publication_status">
                        <td>Cantidad de comentarios borrados en los videos</td>
                        <td><?php echo $ammount_uncomments_video; ?></td>
                    </tr>
                    <tr class="publication_status">
                        <td>Cantidad de tweets en los videos</td>
                        <td><?php echo $ammount_tweets_video; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
