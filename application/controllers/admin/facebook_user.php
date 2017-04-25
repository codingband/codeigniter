<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facebook_user extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->library('layout');
		$this->layout->set_layout('admin/layouts/default');
		$this->load->library('auth');
		$this->auth->logged_in();
		$this->auth->is_admin();
		
		$this->load->library('admin_facebook_user');
		
		$this->load->library('form_validation');
		$this->load->helper('form');

		
	}
	public function index(){
		$this->listar();
	}
	public function listar($field = 'facebook_user_id', $orientation = 'asc', $criteria_str = '' ){

		$data['nav_main'] = 1;
		
		if (!$criteria_str) {	
			$criteria_array['user_status'] = '';
			$criteria_str = urlencode(serialize($criteria_array));
		}else {
			$criteria_array = unserialize(urldecode($criteria_str));
		}
		if ($_POST) {
			$criteria_array['user_status'] = $this->input->post('user_status');
			$criteria_str = urlencode(serialize($criteria_array));
		}

		//cargamos la librer�a

		$this->load->library('pagination');

		//configuramos

		$config['base_url'] = base_url()."admin/facebook_user/listar/$field/$orientation/$criteria_str/";

		$config['total_rows'] = $this->admin_facebook_user->amount($criteria_array);//obtenemos la cantidad de registros

		$config['per_page'] = 10;  //cantidad de registros por p�gina
		
		$config['num_links'] = 2; //nro. de enlaces antes y despu�s de la pagina actual

		$config['prev_link'] = 'anterior'; //texto del enlace que nos lleva a la pagina ant.

		$config['next_link'] = 'siguiente'; //texto del enlace que nos lleva a la sig. p�gina

		$config['uri_segment'] = 7;  //segmentos que va a tener nuestra URL

		$config['first_link'] = '<<';  //texto del enlace que nos lleva a la primer p�gina

		$config['last_link'] = '>>';   //texto del enlace que nos lleva a la �ltima p�gina

		// inicializamos

		$this->pagination->initialize($config);

		/* llamamos al m�todo de nuestro modelo para hacer la consulta pas�ndole como par�metro la cantidad de registros por p�gina y el registro por el que va a comenzar (estar� contenido en el 3er segmento de la URL) */
		
		$facebook_users = $this->admin_facebook_user->facebook_users($config['per_page'], $this->uri->segment(7), $field, $orientation, $criteria_array);

		//ahora debemos llamar a la vista y pasarle el array '$contactos' obtenido.

		$data['facebook_users'] = $facebook_users;
		$data['criteria_array'] = $criteria_array;
		$data['criteria_str'] = $criteria_str;
		$this->layout->view('admin/facebook_users_view',$data);
	}
	public function export_xls($field = 'facebook_user_id', $orientation = 'asc', $criteria_str = '' ){

		$data['nav_main'] = 1;
		$data['title'] = 'Usuarios de facebook';
		$data['filename']='facebook_users.xls';
		
		if (!$criteria_str) {	
			$criteria_array['user_status'] = '';
			$criteria_str = urlencode(serialize($criteria_array));
		}else {
			$criteria_array = unserialize(urldecode($criteria_str));
		}
		if ($_POST) {
			$criteria_array['user_status'] = $this->input->post('user_status');
			$criteria_str = urlencode(serialize($criteria_array));
		}

		$config['per_page'] = 10;  //cantidad de registros por p�gina
		
		//$facebook_users = $this->admin_facebook_user->facebook_users($config['per_page'], $this->uri->segment(7), $field, $orientation, $criteria_array);
		$facebook_users = $this->admin_facebook_user->facebook_users_xls($field, $orientation, $criteria_array);
		$data['facebook_users'] = $facebook_users;
		$data['criteria_array'] = $criteria_array;
		$data['criteria_str'] = $criteria_str;
		$this->load->view('admin/facebook_users_xls', $data);
	}
	
	public function update_user_status($id) {
		$values['user_status'] = $this->input->post('user_status');
		$this->admin_facebook_user->update($id,$values);
	}
}
/* Location: ./application/controllers/admin/facebook_user.php */