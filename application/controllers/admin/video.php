<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video extends CI_Controller {


	public function __construct()
	{
            parent::__construct();
            $this->load->library('layout');
            $this->layout->set_layout('admin/layouts/default');
            $this->load->library('auth');
            $this->auth->logged_in();
            $this->auth->is_admin();

            $this->load->library('admin_video');
            $this->load->library('session');

            $this->load->library('form_validation');
            $this->load->helper('form');
	}
	public function index(){
		$this->listar();
	}
	public function listar($field = 'video_id', $orientation = 'asc', $criteria_str = '' ){

		$data['nav_main'] = 3;
		
		if (!$criteria_str) {	
			$criteria_array['status'] = '';
			$criteria_str = urlencode(serialize($criteria_array));
		}else {
			$criteria_array = unserialize(urldecode($criteria_str));
		}
		if ($_POST) {
			$criteria_array['status'] = $this->input->post('status');
			$criteria_str = urlencode(serialize($criteria_array));
		}

		//cargamos la librer�a

		$this->load->library('pagination');

		//configuramos

		$config['base_url'] = base_url()."admin/video/listar/$field/$orientation/$criteria_str/";

		$config['total_rows'] = $this->admin_video->amount($criteria_array);//obtenemos la cantidad de registros

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
		
		$videos = $this->admin_video->videos($config['per_page'], $this->uri->segment(7), $field, $orientation, $criteria_array);

		//ahora debemos llamar a la vista y pasarle el array '$contactos' obtenido.

		$data['videos'] = $videos;
		$data['criteria_array'] = $criteria_array;
		$data['criteria_str'] = $criteria_str;
		$this->layout->view('admin/videos_view',$data);
	}
	
	public function agregar() {
		$data['nav_main'] = 3;
		
		$this->form_validation->set_rules('title','TITULO','required');
		$this->form_validation->set_rules('order_number','NUMERO DE ORDEN','required');
		$this->form_validation->set_rules('url','URL','required');
                $this->form_validation->set_rules('subject','ASUNTO EMAIL','required');
		
		if ($this->form_validation->run()==FALSE) {

			$this->layout->view('admin/video_view',$data);
		}else {
			
			$values['title'] = $this->input->post('title');
			$values['order_number'] = $this->input->post('order_number');
			$values['url'] = $this->input->post('url');
			$values['date'] = date('Y-m-d h:i:s');
			$values['status'] = $this->input->post('status');
			$values['subject'] = $this->input->post('subject');
			$values['user_id'] = $this->session->userdata('user_id');
			$session = $this->session->userdata('user_id');
			$this->admin_video->insert($values);
			
			redirect('admin/video/listar');
		}
	}
	
	public function ver($id) {
		$data['nav_main'] = 3;

		$video = $this->admin_video->video($id);
		$data['video'] = $video;
		$this->layout->view('admin/video_see_view',$data);
		
	}
	public function editar($id) {
		$data['nav_main'] = 3;
		$this->form_validation->set_rules('title','TITULO','required');
		$this->form_validation->set_rules('order_number','NUMERO DE ORDEN','required');
		$this->form_validation->set_rules('url','URL','required');
		$this->form_validation->set_rules('subject','ASUNTO EMAIL','required');
		
		if ($this->form_validation->run()==FALSE) 
                {
                    $video = $this->admin_video->video($id);
                    $data['video'] = $video;
                    $this->layout->view('admin/video_view',$data);
		}else {
                    $values['title'] = $this->input->post('title');
                    $values['order_number'] = $this->input->post('order_number');
                    $values['url'] = $this->input->post('url');
                    $values['date'] = date('Y-m-d h:i:s');
                    $values['status'] = $this->input->post('status');
                    $values['subject'] = $this->input->post('subject');

                    $this->admin_video->update($this->input->post('video_id'),$values);

                    redirect('admin/video/listar');
		}
	}
	
	public function eliminar($id) {
		$this->admin_video->delete($id);
		redirect('admin/video/listar');
	}
	
	public function update_status($id) {
		$values['status'] = $this->input->post('status');
		$this->admin_video->update($id,$values);
	}
        
        public function send_emails_posts()
        {
            $users = $this->user_m->users_fb_all();
            $res = $this->video_m->send_emails_posts($users);
            echo $res;
            exit;
        }
}
/* Location: ./application/controllers/admin/video.php */