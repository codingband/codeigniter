<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_video {

	public function __construct(){
		$this->CI =& get_instance();
		$this->CI->load->model('video_m','',TRUE);
	}
	
	/**
	 * Insert a new register
	 * @param array $values
	 */
	public function insert($values){
		return $this->CI->video_m->insert($values);
	}
	
	public function update($id, $values){	
		return $this->CI->video_m->update($id, $values);
	}
	
	public function delete($id){	
		return $this->CI->video_m->delete($id);
	}
	public function video($id){	
		return $this->CI->video_m->video($id);
	}
	
	public function videos($amount, $start, $field, $orientation, $criteria_array) {
		return $this->CI->video_m->videos($amount, $start, $field, $orientation, $criteria_array);
	}
	
	function amount($criteria_array){
		return $this->CI->video_m->amount($criteria_array);
	}

}
/* End of file Admin_user.php */