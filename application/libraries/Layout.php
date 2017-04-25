<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout {
	
	protected $CI=NULL;
	protected $layout=NULL;

	function __construct($params=array()){
                $this->CI =& get_instance();
                if(count($params)>0){
                    if(isset($params["layout"])) $this->layout = $params["layout"];
                }
                else $this->layout = "default";
	}
	
	function set_layout($layout){
		$this->layout = $layout;
	}

	function view($view, $data=array(), $return=false){
		
		$this->layout_data['layout_content'] = $this->CI->load->view($view,$data,true);
		if($return)
			return $this->CI->load->view('layouts/'.$this->layout, $this->layout_data, true);
		else
			$this->CI->load->view($this->layout, $this->layout_data, false);
	}
}
/* End of file Layout.php */