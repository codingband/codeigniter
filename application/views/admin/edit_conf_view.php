<?php 
$array_ini = explode(' ',$date_ini);
$array_fin = explode(' ',$date_fin);
$fini = isset($array_ini[0])?$array_ini[0]:'';
$hini = isset($array_ini[1])?$array_ini[1]:'';
$ffin = isset($array_fin[0])?$array_fin[0]:'';
$hfin = isset($array_fin[1])?$array_fin[1]:'';
?>
<script type="text/javascript">
$(document).ready(function (){
    $( "#date_ini" ).datepicker({
        inline: true,
        dateFormat: 'yy-mm-dd',
        //minDate: 0,
        buttonImage: '<?php echo base_url(); ?>img/calendar.png',
        onSelect: function(dateText) {
                                }
    });
    
    $( "#date_fin" ).datepicker({
        inline: true,
        dateFormat: 'yy-mm-dd',
        //minDate: 0,
        buttonImage: '<?php echo base_url(); ?>img/calendar.png',
        onSelect: function(dateText) {
                                }
    });
    
    setInterval("getHora()",1000);
});

function getHora()
{
    $.ajax({
        url: '<?php echo base_url().'admin/configuration/serverTime'?>',
        success: function(msg){
            $( "#serverTime").html(msg);
        }	
    });
}
</script>
<style type="text/css">
    div label {font-weight: bold;}
</style>
<div class="container_16">
    <div class="grid_16">
        <div class="main_content">
            <p><b>EDICI&Oacute;N CONFIGURACI&Oacute;N</b></p>
            <br/>
            <div>
                <div style="float: left; font-weight: bold; width: 120px;">Hora servidor:</div>
                <spam id="serverTime"></spam>
                <br/><br/>
            </div>
            <form name="form_setup" id="form_setup" method="post" action="<?php echo base_url();?>admin/configuration/saveSetup/">
            <div><label>Fecha y hora de inicio de la promo</label></div>
            <div>
                <span style="width: 50px; display: block; float: left;">Fecha: </span>
                <input type="text" name="date_ini" id="date_ini" value="<?php echo $fini; ?>" />
                <br/><span style="width: 50px; display: block; float: left;">Hora: </span>
                <input type="text" name="hour_ini" id="hour_ini" value="<?php echo $hini; ?>" />&nbsp;Formato 24hrs (00:00:00 - 23:59:59) 
            </div>
            <br/>
            <div><label>Fecha y hora de fin de la promo</label></div>
            <div>
                <span style="width: 50px; display: block; float: left;">Fecha:</span>
                <input type="text" name="date_fin" id="date_fin" value="<?php echo $ffin; ?>" />
                <br/><span style="width: 50px; display: block; float: left;">Hora:</span>
                <input type="text" name="hour_fin" id="hour_fin" value="<?php echo $hfin; ?>" />&nbsp;Formato 24hrs (00:00:00 - 23:59:59) 
            </div>
            <br/>
            <div><label>Url iframe bases y condiciones</label></div>
            <div><input type="text" name="url_bases" id="url_bases" style="width: 400px;" value="<?php echo $url_bases; ?>" /></div>
            <br/>
            <div><label>Url iframe informaci&oacute;n</label></div>
            <div><input type="text" name="url_info" id="url_info" style="width: 400px;" value="<?php echo $url_info; ?>" /></div>
            <br/>
            <div><label>Url externa inscripci&oacute;n</label></div>
            <div><input type="text" name="url_inscrip" id="url_inscrip" style="width: 400px;" value="<?php echo $url_inscrip; ?>" /></div>
            <br/>
            <div><label>Url p&aacute;gina a cargar al finalizar la promo</label></div>
            <div><input type="text" name="url_fin" id="url_fin" style="width: 400px;" value="<?php echo $url_fin_promo; ?>" /></div>
            <br/>
            <br/>
            <div><input type="submit" value="Guardar"/></div>
            </form>
            <br/>
        </div>
    </div>
</div>
