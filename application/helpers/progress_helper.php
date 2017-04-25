<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('progress_bar'))
{
	function progress_bar($bar, $color) {
		$bar = $bar/100*100;
		$base_url = base_url();
		$bg="background-image: url({$base_url}img/progress/prc_back.png)"; //fondo 100%
		$bg_color="background-image: url({$base_url}img/progress/prc_{$color}.png)";  //fondo x%
		$s = "
		<div align='left' style='border: 2px solid #333; width: 80px;height:10px; padding: 1px; margin: 5px; {$bg};'>
			<div align='center' style='width:{$bar}%; height:10px; {$bg_color}'>
				<div align='center'>
					
							{$bar}%
				
				</div>
			</div>
		</div>
		";
		return $s;
	}
}

// ------------------------------------------------------------------------



/* End of file array_helper.php */
/* Location: ./application/helpers/progress_helper.php */