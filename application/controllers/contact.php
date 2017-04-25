<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {


	public function __construct() {
		parent::__construct();

		$this->lang->load('contact','spanish');

		$this->load->helper(array('form'));
		$this->load->library('form_validation');

		$this->load->library('layout');
		$this->layout->set_layout('publico/layouts/default');
			
		$this->load->library('admin_contact');

	}
	
	public function index() {
		$this->register();
	}

	/**
	 * Register a new user
	 */
	public function register() {
		if ($this->form_validation->run('contact') == FALSE) {

			$this->layout->view('contact/register');
		}
		else
		{
			$values['full_name']	= $this->input->post('full_name');
			$values['email']		= $this->input->post('email');
			$values['phone']		= $this->input->post('phone');
			$values['enterprise']	= $this->input->post('enterprise');
			$values['website']		= $this->input->post('website');
			//$values['country']		= $this->input->post('country');
			//$values['subject']		= $this->input->post('subject');
			$this->admin_contact->insert($values);
			$data['title']='Success';
			$data['info']='Exito';
			$this->layout->view('user/info',$data);
		}
	}

}


/* End of file contact.php */
/* Location: ./application/controllers/contact.php */