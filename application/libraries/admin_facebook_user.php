<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_facebook_user {

	public function __construct(){
		$this->CI =& get_instance();
		$this->CI->load->model('facebook_user_m','',TRUE);
	}
	
	/**
	 * Insert a new register
	 * @param array $values
	 */
	public function insert($values){
		return $this->CI->facebook_user_m->insert($values);
	}
	
	public function update($id, $values){	
		return $this->CI->facebook_user_m->update($id, $values);
	}
	
	public function delete($id){	
		return $this->CI->facebook_user_m->delete($id);
	}
	public function facebook_user($id){	
		return $this->CI->facebook_user_m->facebook_user($id);
	}
	
	public function facebook_users($amount, $start, $field, $orientation, $criteria_array) {
		return $this->CI->facebook_user_m->facebook_users($amount, $start, $field, $orientation, $criteria_array);
	}
	
	public function facebook_users_xls($field, $orientation, $criteria_array) 
        {
            return $this->CI->facebook_user_m->facebook_users_xls($field, $orientation, $criteria_array);
	}
	
	function amount($criteria_array){
		return $this->CI->facebook_user_m->amount($criteria_array);
	}

}
/* End of file Admin_user.php */