<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publication extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->library('layout');
		$this->layout->set_layout('admin/layouts/default');
		$this->load->library('auth');
		$this->auth->logged_in();
		$this->auth->is_admin();
		
		$this->load->library('admin_publication');
		
		$this->load->library('form_validation');
		$this->load->helper('form');

		
	}
	public function index(){
		$this->listar();
	}
	public function listar($field = 'publication_id', $orientation = 'asc', $criteria_str = '' ){

		$data['nav_main'] = 2;
		
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

		$config['base_url'] = base_url()."admin/publication/listar/$field/$orientation/$criteria_str/";

		$config['total_rows'] = $this->admin_publication->amount($criteria_array);//obtenemos la cantidad de registros

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
		
		$publications = $this->admin_publication->publications($config['per_page'], $this->uri->segment(7), $field, $orientation, $criteria_array);

		//ahora debemos llamar a la vista y pasarle el array '$contactos' obtenido.

		$data['publications'] = $publications;
		$data['criteria_array'] = $criteria_array;
		$data['criteria_str'] = $criteria_str;
		$this->layout->view('admin/publications_view',$data);
	}
	
	public function agregar() {
		$this->form_validation->set_rules('title','TITULO','required');
		$this->form_validation->set_rules('description','DESCRIPCION','required');
	
		$config['upload_path'] = './uploads/publications/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '100';
		$config['max_width'] = '800';
		$config['max_height'] = '600';
		
		$this->load->library('upload', $config);
		
		if ($this->form_validation->run()==FALSE || (!$this->upload->do_upload() && $_FILES['userfile']['error'] != 4)) {
			$data['error'] = $this->upload->display_errors();
			$this->layout->view('admin/publication_view', $data);
		}else {
			
			$file = $this->upload->data();
			
			$values['title'] = $this->input->post('title');
			$values['description'] = $this->input->post('description');
			if (isset($file) && isset($file['file_name']) && $file['file_name']) {
				$values['photo'] = $file['file_name'];
			}
			$values['link'] = $this->input->post('link');
			$values['date'] = date('Y-m-d h:i:s');
			$values['status'] = $this->input->post('status');
                        $values['user_id'] = $this->session->userdata('user_id');
			
			$this->admin_publication->insert($values);

			
			redirect('admin/publication/listar');
		}
	}
	
	public function ver($id) {
			$publication = $this->admin_publication->publication($id);
			$data['publication'] = $publication;
			$this->layout->view('admin/publication_see_view',$data);
	}
	
	public function editar($id) {
		$this->form_validation->set_rules('title','TITULO','required');
		$this->form_validation->set_rules('description','DESCRIPCION','required');	
		$config['upload_path'] = './uploads/publications/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '100';
		$config['max_width'] = '800';
		$config['max_height'] = '600';
		
		$this->load->library('upload', $config);
	
		if ($this->form_validation->run()==FALSE || (!$this->upload->do_upload() && $_FILES['userfile']['error'] != 4)) {
			
			
			$publication = $this->admin_publication->publication($id);
			
			$data['publication'] = $publication;
			$data['error'] = $this->upload->display_errors();
			
			$this->layout->view('admin/publication_view',$data);
		}else {
			
			$file = $this->upload->data();
			
			$values['title'] = $this->input->post('title');
			$values['description'] = $this->input->post('description');
			if (isset($file) && isset($file['file_name']) && $file['file_name']) {
				$values['photo'] = $file['file_name'];
			}
			$values['link'] = $this->input->post('link');
			$values['date'] = date('Y-m-d h:i:s');
			$values['status'] = $this->input->post('status');
			
			$this->admin_publication->update($this->input->post('publication_id'),$values);
			
			redirect('admin/publication/listar');
		}
	}

	public function eliminar($id) {
		$this->admin_publication->delete($id);
		redirect('admin/publication/listar');;
	}
	
	public function update_status($id) {
		$values['status'] = $this->input->post('status');
		$this->admin_publication->update($id,$values);
	}
	public function delete_photo($id) {
		$values['photo'] = '';
		$this->admin_publication->update($id,$values);
	}
	
}
/* Location: ./application/controllers/admin/publication.php */