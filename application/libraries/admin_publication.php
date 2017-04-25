<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_publication {

	public function __construct(){
		$this->CI =& get_instance();
		$this->CI->load->model('publication_m','',TRUE);
	}
	
	/**
	 * Insert a new register
	 * @param array $values
	 */
	public function insert($values){
		return $this->CI->publication_m->insert($values);
	}
	
	public function update($id, $values){	
		return $this->CI->publication_m->update($id, $values);
	}
	
	public function delete($id){	
		return $this->CI->publication_m->delete($id);
	}
	public function publication($id){	
		return $this->CI->publication_m->publication($id);
	}
	
	public function publications($amount, $start, $field, $orientation, $criteria_array) {
		return $this->CI->publication_m->publications($amount, $start, $field, $orientation, $criteria_array);
	}
	
	function amount($criteria_array){
		return $this->CI->publication_m->amount($criteria_array);
	}

}
/* End of file Admin_user.php */