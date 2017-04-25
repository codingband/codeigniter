<script type="text/javascript">
$(document).ready(function (){
    $('#edit').click(function(){
        document.location.href = '<?php echo base_url();?>admin/configuration/edit/';
    });
});
</script>
<style type="text/css">
    .publication_status{height: 30px;}
    div label {font-weight: bold;}
</style>
<div class="container_16">
    <div class="grid_16">
        <div class="main_content">
            <p><b>CONFIGURACI&Oacute;N</b></p>
            <br/>
            <br/>
            <div><label>Fecha y hora de inicio de la promo</label></div>
            <div><?php echo $date_ini; ?></div>
            <br/>
            <div><label>Fecha y hora de fin de la promo</label></div>
            <div><?php echo $date_fin; ?></div>
            <br/>
            <div><label>Url iframe bases y condiciones</label></div>
            <div><?php echo $url_bases; ?></div>
            <br/>
            <div><label>Url iframe informaci&oacute;n</label></div>
            <div><?php echo $url_info; ?></div>
            <br/>
            <div><label>Url externa inscripci&oacute;n</label></div>
            <div><?php echo $url_inscrip; ?></div>
            <br/>
            <div><label>Url p&aacute;gina a cargar al finalizar la promo</label></div>
            <div><?php echo $url_fin_promo; ?></div>
            <br/>
            <br/>
            <div><button id="edit">Editar</button></div>
            <br/>
        </div>
    </div>
</div>
