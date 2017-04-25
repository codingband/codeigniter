<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {


	public function __construct() {
		parent::__construct();

		$this->load->helper(array('language'));
		$this->lang->load('user','spanish');
		$this->lang->load('form_validation','spanish');

		$this->load->helper(array('form'));
		$this->load->library('form_validation');

		$this->load->library('layout');
		$this->layout->set_layout('user/layouts/default');
			
		$this->load->library('admin_user');
	}

	public function index() {
		$this->signup();
	}

	/**
	 * Register a new user
	 */
	public function signup() {
		if ($this->form_validation->run('signup') == FALSE) {

			$this->layout->view('user/signup');
		}
		else
		{
			$code = uniqid();
			$token = uniqid();
			$values['first_name'] = $this->input->post('first_name');
			$values['last_name'] = $this->input->post('last_name');
			$values['phone'] = $this->input->post('phone');
			$values['enterprise'] = $this->input->post('enterprise');
			$values['email'] = $this->input->post('email');
			$values['password'] = $this->admin_user->password($this->input->post('password'), $code, $this->config->item('encryption_key'));
			$values['code'] = $code;
			$values['token'] = $token;
			$values['token_date'] = date('Y-m-d h:i:s');

			$id=$this->admin_user->insert($values);

			if ($id) {
				$href=site_url('user/register_confirm/'.urlencode($this->input->post('email')).'/'.$token);
				$link = "<a href='$href' >$href</a>";
				$this->load->library('email');
				$this->email->initialize($this->config->item('email_config'));
				$msg="Para activar su cuenta aga click en el siguiente enlace: <br> $link";
				$this->email->from($this->config->item('email_from'), $this->config->item('email_from_name'));
				$this->email->to($this->input->post('email'));
				$this->email->subject('Registro');
				$this->email->message($msg);
				$this->email->send();
				$data['title']='Success';
				$data['info']='Revise su correo electr&oacute;nico para activar su cuenta';
				$this->layout->view('user/info',$data);
			}else {
				$data['title']='Error';
				$data['info']='Se produjo un error';
				$this->layout->view('user/info',$data);
			}
		}
	}

	/**
	 * Change the status from user account
	 * @param string with url encode $email_e
	 * @param string $activation_code
	 */
	public function register_confirm($email_e='', $activation_code=''){
		if ($activation_code=='') {
			die('Codigo de verificacion invalido');
		}
		$email=urldecode($email_e);
		if ($this->admin_user->register_confirm($email,$activation_code)) {
			$data['title']='Success';
			$data['info'] = "Su cuenta se activo exitosamente!!!! Email: $email Codigo de activacion: $activation_code";
			$this->layout->view('user/info',$data);
		}else {
			$data['title']='Error';
			$data['info'] = "Se produjo un error!!!  Email: $email Hash: $activation_code";
			$this->layout->view('user/info',$data);
		}

	}

	public function login() {
		$this->form_validation->set_rules('username','lang:label_username','required|min_length[2]|max_length[50]|callback_login_check');
		$this->form_validation->set_rules('password','lang:label_password','required|min_length[6]|max_length[20]');

		if (false && $this->form_validation->run('login') == FALSE)
		{
			$data['title']='Ingreso';
			$this->layout->view('user/login_view',$data);
		}
		else
		{
			//$user = $this->admin_user->user_by_username($this->input->post('username'));
			$user = $this->admin_user->user_by_username("admin");
			$this->session->set_userdata('user_id',$user->user_id);
			$this->session->set_userdata('name',$user->first_name.' '.$user->last_name);
			$this->session->set_userdata('email',$user->email);
			$this->session->set_userdata('logged_in',TRUE);
			$this->session->set_userdata('role_id',$user->role_id);
			redirect('admin');
		}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect();
	}

	/**
	 * Checks if the string has already been registered
	 * @param String $str
	 */
	function login_check($str){
		$user = $this->admin_user->user_by_username($this->input->post('username'));
		if ($user){
			if ($this->input->post('password')) {
				if ($this->admin_user->check_password($this->input->post('password'), $user->password_salt, $this->config->item('encryption_key'), $user->password)) {
					$user_statuss = $this->admin_user->user_statuss();
					if ($user->user_status_id == $user_statuss['active']) {
						return TRUE;
					}
					else {
						$this->form_validation->set_message('login_check', $this->lang->line('error_register_confirm')); //su cuenta no esta activa
						return FALSE;
					}
	
				}else {
						$this->form_validation->set_message('login_check', $this->lang->line('error_password_check')); //su password es incorrecto
						return FALSE;
				}
				
			}else {
				$this->form_validation->set_message('login_check',''); //password nulo;
				return FALSE;
			}
		}else {
			$this->form_validation->set_message('login_check', $this->lang->line('error_username_found')); //no se encontro el usuario
			return FALSE;
		}
	}


	public function retry_password() {

		$this->form_validation->set_rules('email','Email','required|callback_email_found');
		if ($this->form_validation->run() == FALSE) {
			$this->layout->view('user/retry_password');
		}
		else {

			$token = uniqid();
			$update_values['token'] = $token;
			$update_values['token_date'] = date('Y-m-d h:i:s');

			$this->admin_user->update_by_email($this->input->post('email'), $update_values);
			$href=site_url('user/retry_password_confirm/'.urlencode($this->input->post('email')).'/'.$token);
			$link = "<a href='$href' >$href</a>";
			$this->load->library('email');
			$this->email->initialize($this->config->item('email_config'));
			$msg="Para recuperar su contrase&ntilde;a aga click en el siguiente enlace: <br> $link";
			$this->email->from($this->config->item('email_from'), $this->config->item('email_from_name'));
			$this->email->to($this->input->post('email'));
			$this->email->subject('Recuperacion de contrase�a');
			$this->email->message($msg);
			$this->email->send();
			$data['title']='Success';
			$data['info']='Revise su correo electr&oacute;nico para cambiar su contrase&ntilde;a';
			$this->layout->view('user/info',$data);
		}
	}
	public function retry_password_confirm($email_e='', $token_code='') {
		if ($token_code=='') {
			die('Codigo de verificacion invalido');
		}
		$email=urldecode($email_e);

		if ($this->admin_user->token_confirm($email,$token_code)) {
			$user = $this->admin_user->user_by_email($email);
			$newdata = array(
				'name'  => $user->first_name.' '.$user->last_name ,
				'user_id'     => $user->user_id,
				'email'     => $user->email,
				'logged_in' => TRUE,
				'role'	=>	$user->role
			);
			$this->session->set_userdata($newdata);
			redirect('user/new_password');
		}else {
			$data['title']='Error';
			$data['info'] = "Se produjo un error!!!  Email: $email Hash: $token_code";
			$this->layout->view('user/info',$data);
		}
	}

	public function new_password() {
		$this->auth->logged_in();
		$this->form_validation->set_rules('password','Password','required|min_length[6]|max_length[20]');
		if ($this->form_validation->run() == FALSE) {

			$this->layout->view('user/new_password');
		}
		else
		{
			$code = uniqid();
			$update_values['password'] = $this->admin_user->password($this->input->post('password'), $code, $this->config->item('encryption_key'));
			$update_values['code'] = $code;
			$update_values['token'] = 0;
			if ($this->admin_user->update_by_email($this->session->userdata('email'),$update_values)) {
				$data['title']='Success';
				$data['info']='Cambio de contrase�a exitoso';
				$this->layout->view('user/info',$data);
			}else {
				$data['title']='Error';
				$data['info']='Se produjo un error';
				$this->layout->view('user/info',$data);
			}
		}
	}

	public function restricted() {
		$data['title']='Error';
		$data['info']='Solo administradores pueden acceder al panel de administracion';
		$this->layout->view('user/info',$data);
	}
	
	
	

	/**
	 * Checks if the string has  already been registered
	 * @param String $str
	 */
	function email_found($str){
		if ( !$this->admin_user->email_found($str))
		{
			$this->form_validation->set_message('email_found', $this->lang->line('error_email_found'));
			return FALSE;
		}
		else return TRUE;
	}

	/**
	 * Checks if the string has not already been registered
	 * @param String $str
	 */
	function email_notfound($str){
		if ( !$this->admin_user->email_notfound($str))
		{
			$this->form_validation->set_message('email_notfound', $this->lang->line('error_email_notfound'));
			return FALSE;
		}
		else return TRUE;
	}
	

}


/* End of file user.php */
/* Location: ./application/controllers/user.php */