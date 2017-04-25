<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publico extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->library('layout');
		$this->layout->set_layout('public/layouts/default');
	}
	public function index(){
		$this->inicio();
	}
	public function inicio(){
		$data['nav_main'] = 1;
		$data['h2']='INICIO';
		$this->layout->view('public/default',$data);
	}
	
	public function sobre_nosotros(){
		$data['nav_main'] = 2;
		$data['h2']='SOBRE NOSOTROS';
		$this->layout->view('public/default',$data);
	}
}
/* Location: ./application/controllers/user.php */