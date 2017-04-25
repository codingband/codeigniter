<?php
/**
 * User model
 */
class Facebook_user_m extends CI_Model{
	
	/**
	 * Insert a new register
	 * @param array $values
	 */
	public function insert($values){	
		$this->db->insert('facebook_user', $values);
		return $this->db->insert_id();
	}
	
	public function update($id, $values){	
		$this->db->where('facebook_user_id', $id);
		return $this->db->update('facebook_user', $values);
	}
	
	public function delete($id){	
		$this->db->where('facebook_user_id', $id);
		return $this->db->delete('facebook_user');
	
	}
	
	public function facebook_user($id){	
		$this->db->where('facebook_user_id', $id);
		$query = $this->db->get('facebook_user');
		if ($query->num_rows()>0) {
			return $query->row();
		}
		return NULL;
	}
	
	public function facebook_users($amount, $start, $field, $orientation, $criteria_array) {
		if ($criteria_array['user_status']) {
			$this->db->like('user_status', $criteria_array['user_status']);
		}
		$this->db->order_by($field, $orientation); 
		$this->db->limit($amount, $start);
		$query = $this->db->get('facebook_user');
		return $query->result();
	}
	
	public function facebook_users_xls($field, $orientation, $criteria_array) {
		if ($criteria_array['user_status']) 
                {
			$this->db->like('user_status', $criteria_array['user_status']);
		}
		$this->db->order_by($field, $orientation); 
		//$this->db->limit($amount, $start);
		$query = $this->db->get('facebook_user');
		return $query->result();
	}
	
	public function amount($criteria_array){
		if ($criteria_array['user_status']) {
			$this->db->like('user_status', $criteria_array['user_status']);
		} 
		$query = $this->db->get('facebook_user');
		return $query->num_rows();
	}
	
}

?>
