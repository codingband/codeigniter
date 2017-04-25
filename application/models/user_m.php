<?php
/**
 * User model
 */
class User_m extends CI_Model{

	public function __construct() {
		parent::__construct();
	}
	public function roles() {
		$query = $this->db->get('role');
		if ($query->num_rows() > 0 ) {
			foreach ($query->result() as $value) {
				$roles[$value->role_name] = $value->role_id; 
			}
			return $roles;
		}
		return array();
	}
	
	public function user_statuss() {
		$query = $this->db->get('user_status');
		if ($query->num_rows() > 0 ) {
			foreach ($query->result() as $value) {
				$user_statuss[$value->user_status_name] = $value->user_status_id; 
			}
			return $user_statuss;
		}
		return array();
	}
	
	public function user_by_username($str){
		$this->db->where('username', $str);
		$this->db->or_where('email', $str);
		$query = $this->db->get('user');
		if ($query->num_rows() > 0){
			return 	$query->row();
		}else return NULL;
	}

	/**
	 * Insert a new register
	 * @param array $values
	 */
	public function insert($values){
		$this->db->insert('user', $values);
		return $this->db->insert_id();
	}
	
	public function insert_user_comment($values){
		$this->db->insert('user_comment', $values);
		return $this->db->insert_id();
	}

	public function register_confirm($email, $activation_code){
		$query = $this->db->get_where('user', array('email' => $email, 'token' => $activation_code));
		if ($query->num_rows()>0) {
			$this->db->where(array('email' => $email, 'token' => $activation_code));
			$update_values['status'] = $this->user_status['active'];
			$update_values['token'] = NULL;
			return $this->db->update('user', $update_values);
		}
		return FALSE;
	}
	
	public function token_confirm($email, $token){
		$query = $this->db->get_where('user', array('email' => $email, 'token' => $token));
		if ($query->num_rows()>0) {
			return TRUE;
		}
		return FALSE;
	}

	public function user_by_email($email){

		$query = $this->db->get_where('user', array('email' => $email));
		if ($query->num_rows() > 0){
			return 	$query->row();
		}else return NULL;
	}
	
	/**
	 * Checks if the string has not already been registered
	 * @param String $str
	 */
	function email_notfound($str){
		$this->db->where('email', $str);
		$query = $this->db->get('user');
		if ($query->num_rows() > 0) return FALSE;
		else return TRUE;
	}
	/**
	 * Checks if the string has not already been registered and check user
	 * @param String $str
	 */
	function email_notfound2($id, $str){
		$this->db->where('email', $str);
		$this->db->where('user_id !=',$id);	
		$query = $this->db->get('user');
		if ($query->num_rows() > 0) return FALSE;
		else return TRUE;
	}
	
	/**
	 * Checks if the string has not already been registered
	 * @param String $str
	 */
	function email_found($str){
		$this->db->where('email', $str);
		$query = $this->db->get('user');
		if ($query->num_rows() > 0) return TRUE;
		else return FAlSE;
	}
	
	public function update_by_email($email, $update_values) {
		$this->db->where('email', $email);
		return $this->db->update('user', $update_values);
	}

	/**
	 * Obtiene usuarios por pagina
	 * @param integer $cantidad_registros
	 * @param integer $inicio
	 * @param string $campo	 
	 * @param string $orientacion
	 */
	public function users($cantidad_registros, $inicio, $campo, $orientacion) {
		$this->db->order_by($campo, $orientacion); 
		$this->db->limit($cantidad_registros, $inicio);
		$query = $this->db->get('user');
		return $query->result();
	}
	
	public function users_all() { 
		$query = $this->db->get('user');
		return $query->result();
	}
	
	public function users_fb_all() { 
            $query = $this->db->select('facebook_user_id')->where('user_status',1)->get('facebook_user');
            return $query->result();
	}
	
	function cantidad(){
		return $this->db->count_all('user');
	}
	
	public function user($id){
		$query = $this->db->get_where('user', array('user_id' => $id));
		if ($query->num_rows() > 0){
			return 	$query->row();
		}else return NULL;
	}
	
	public function update($id , $update_values) {
		$this->db->where('user_id',$id);
		return $this->db->update('user', $update_values);
	}
	
	public function user_amount_by_status($status) {
		$this->db->where('status',$status);
		$query = $this->db->get('user');
		return $query->num_rows();
	}
	
	
}

?>
