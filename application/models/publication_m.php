<?php
/**
 * User model
 */
class Publication_m extends CI_Model{
	
	/**
	 * Insert a new register
	 * @param array $values
	 */
	public function insert($values){	
		$this->db->insert('publication', $values);
		return $this->db->insert_id();
	}
	
	public function update($id, $values){	
		$this->db->where('publication_id', $id);
		return $this->db->update('publication', $values);
	}
	
	public function delete($id){	
		$this->db->where('publication_id', $id);
		return $this->db->delete('publication');
	
	}
	
	public function publication($id){	
		$this->db->where('publication_id', $id);
		$query = $this->db->get('publication');
		if ($query->num_rows()>0) {
			return $query->row();
		}
		return NULL;
	}
	
	public function publications($amount, $start, $field, $orientation, $criteria_array) {
		if ($criteria_array['status']) {
			$this->db->like('status', $criteria_array['status']);
		}
		$this->db->order_by($field, $orientation); 
		$this->db->limit($amount, $start);
		$query = $this->db->get('publication');
		return $query->result();
	}
	
	public function amount($criteria_array){
		if ($criteria_array['status']) {
			$this->db->like('status', $criteria_array['status']);
		} 
		$query = $this->db->get('publication');
		return $query->num_rows();
	}
	
}

?>
