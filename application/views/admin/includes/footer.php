</div>
<div id="footer">
	<div class="container_16">
		<div class="grid_16">
		<br><br>
		<hr>
		<p class="left" style="line-height: 1.3em;">
					<b>App Equipados Galicia</b> <br>
					Panel de administraci&oacute;n<br> 
		</p>
		<p class="right"><?php echo anchor('user/logout','Salir')?> </p>
		</div>
        <div class="clear"></div>
	</div>	
    <div id="opacue" style="display: none;">
        <img src="<?php echo base_url();?>img/ajax-loader.gif" alt="" />
        <br>
        <span id="span_counter" style="color: white; position: fixed; top: 60%; left: 46%; display: none;">Enviando <span id="range_send_notif"> del 0 al 20 </span> <span id="total_send_notif"> de 300</span></span>
    </div>
</div>
</body>
</html>