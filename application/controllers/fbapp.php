<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fbapp extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->library('layout');
		$this->layout->set_layout('fbapp/layouts/default');
	}
	public function index(){
		$this->inicio();
	}
	public function inicio(){
		
		$fb_config = array(
            'appId'  => '144330878972393',
            'secret' => '6d47c32305eb9c847d896c868f124fa3'
        );

        $this->load->library('facebook', $fb_config);

        $user = $this->facebook->getUser();

        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }

        if ($user) {
            $data['logout_url'] = $this->facebook->getLogoutUrl();
        } else {
            $data['login_url'] = $this->facebook->getLoginUrl();
        }

        
		$this->layout->view('fbapp/default_view',$data);
	}
	
	public function sobre_nosotros(){
		$this->layout->view('fbapp/default_view');
	}
}
/* Location: ./application/controllers/user.php */