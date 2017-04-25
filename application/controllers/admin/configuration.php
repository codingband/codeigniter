<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configuration extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('layout');
        $this->layout->set_layout('admin/layouts/default');
        $this->load->library('auth');
        $this->auth->logged_in();
        $this->auth->is_admin();
        $this->load->library('admin_configuration');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index()
    {
        $this->lista();
    }

    public function lista()
    {
        $data['nav_main'] = 5;
        $setup = $this->admin_configuration->getSetup();
        $data['date_ini'] = isset($setup['ini_promo'])?$setup['ini_promo']:'';
        $data['date_fin'] = isset($setup['fin_promo'])?$setup['fin_promo']:'';
        $data['url_bases'] = isset($setup['url_bases'])?$setup['url_bases']:'';
        $data['url_info'] = isset($setup['url_info'])?$setup['url_info']:'';
        $data['url_inscrip'] = isset($setup['url_inscripcion'])?$setup['url_inscripcion']:'';
        $data['url_fin_promo'] = isset($setup['url_page_fin_promo'])?$setup['url_page_fin_promo']:'';
        $this->layout->view('admin/configuration_view',$data);
    }

    public function edit()
    {
        $data['nav_main'] = 5;
        $setup = $this->admin_configuration->getSetup();
        $data['date_ini'] = isset($setup['ini_promo'])?$setup['ini_promo']:'';
        $data['date_fin'] = isset($setup['fin_promo'])?$setup['fin_promo']:'';
        $data['url_bases'] = isset($setup['url_bases'])?$setup['url_bases']:'';
        $data['url_info'] = isset($setup['url_info'])?$setup['url_info']:'';
        $data['url_inscrip'] = isset($setup['url_inscripcion'])?$setup['url_inscripcion']:'';
        $data['url_fin_promo'] = isset($setup['url_page_fin_promo'])?$setup['url_page_fin_promo']:'';
        $this->layout->view('admin/edit_conf_view', $data);
    }
    
    public function saveSetup()
    {
        $setup['ini_promo'] = $this->input->post('date_ini').' '.$this->input->post('hour_ini');
        $setup['fin_promo'] = $this->input->post('date_fin').' '.$this->input->post('hour_fin');
        $setup['url_bases'] = $this->input->post('url_bases');
        $setup['url_info'] = $this->input->post('url_info');
        $setup['url_inscripcion'] = $this->input->post('url_inscrip');
        $setup['url_page_fin_promo'] = $this->input->post('url_fin');
        $this->admin_configuration->saveSetup($setup);
        redirect(base_url().'admin/configuration/lista/');
    }
    
    public function serverTime()
    {
        $now = Date('Y-m-d H:i:s');
        echo $now; exit;
    }
}
/* Location: ./application/controllers/admin/statistics.php */