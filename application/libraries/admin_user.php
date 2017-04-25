<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_user {

	public function __construct(){
		$this->CI =& get_instance();
		$this->CI->load->model('user_m','',TRUE);
		$param['iteration_count_log2'] = $this->CI->config->item('iteration_count_log2');
		$param['portable_hashes'] = $this->CI->config->item('portable_hashes');
		$this->CI->load->library('PasswordHash',$param);
	}
	
	public function user_statuss(){
		return $this->CI->user_m->user_statuss();
	}
	
	public function roles(){
		return $this->CI->user_m->roles();
	}
	
	public function user_by_username($str) {
		return $this->CI->user_m->user_by_username($str);
	}
	/**
	 * Insert a new register
	 * @param array $values
	 */
	public function insert($values){
		return $this->CI->user_m->insert($values);
	}
	
	public function insert_user_comment($values){
		return $this->CI->user_m->insert_user_comment($values);
	}
	
	/**
	 * Change the status from user account
	 * @param string $email
	 * @param string $activation_code
	 */
	public function register_confirm($email, $activation_code) {
		return $this->CI->user_m->register_confirm($email, $activation_code);
	}
	
	/**
	 * Return a user by email
	 * @param unknown_type $email
	 */
	public function user_by_email($email) {
		return $this->CI->user_m->user_by_email($email);
	}
	
	/**
	 * Return a password hash
	 * @param string $user_code
	 * @param string $code
	 * @param string $encription_key
	 * @return string
	 */
	public function password($user_code='', $code='', $encription_key=''){
		$str = $user_code.$code.$encription_key;
		if (strlen($str)>72) {
			$str = substr($str, 0, 72);
		}
		$password = $this->CI->passwordhash->HashPassword($str);
		return (strlen($password) < 20)? '' : $password;
	}

	/**
	 * check password hash
	 * @param string $user_code
	 * @param string $code stored in db
	 * @param string $encription_key
	 * @param string $password stored in db
	 */
	public function check_password($user_code='', $code='', $encription_key='',$password){
		$str = $user_code.$code.$encription_key;
		if (strlen($str)>72) {
			$str = substr($str, 0, 72);
		}
		return $this->CI->passwordhash->CheckPassword($str,$password);
	}
	
	/**
	 * Checks if the string has not already been registered
	 * @param String $str
	 */
	public function email_notfound($str){
		return $this->CI->user_m->email_notfound($str);
	}
	/**
	 * Checks if the string has not already been registered and check user
	 * @param String $str
	 */
	public function email_notfound2($id, $str){
		return $this->CI->user_m->email_notfound2($id, $str);
	}
	
	/**
	 * Checks if the string has already been registered
	 * @param String $str
	 */
	public function email_found($str){
		return $this->CI->user_m->email_found($str);
	}
	
	public function update_by_email($email, $update_values) {
		return $this->CI->user_m->update_by_email($email, $update_values);
	}
	
	public function token_confirm($email, $token){
		return $this->CI->user_m->token_confirm($email, $token);
	}
	
	/**
	 * Obtiene usuarios por pagina
	 * @param integer $cantidad_registros
	 * @param integer $inicio
	 * @param string $campo	 
	 * @param string $orientacion	 
	 */
	public function users($cantidad_registros, $inicio, $campo, $orientacion) {
		return $this->CI->user_m->users($cantidad_registros, $inicio, $campo, $orientacion);
	}
	
	public function users_all() {
		return $this->CI->user_m->users_all();
	}
	
	public function cantidad() {
		return $this->CI->user_m->cantidad();
	}
	
	/**
	 * Return a user by id
	 * @param unknown_type $id
	 */
	public function user($id) {
		return $this->CI->user_m->user($id);
	}
	
	public function update($id, $update_values) {
		return $this->CI->user_m->update($id, $update_values);
	}
	
	public function user_amount_by_status($status) {
		return $this->CI->user_m->user_amount_by_status($status);
	}
}
/* End of file Admin_user.php */