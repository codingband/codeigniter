<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth {

	public function __construct()
        {
            $this->CI =& get_instance();
	}
	
	public function logged_in() 
        {
            $is_logged_in = $this->CI->session->userdata('logged_in');
            if ($is_logged_in != TRUE)
            {
                redirect('user/logout');
            }else{
                return TRUE;
            }
            //return FALSE;
	}
	
	public function is_admin() 
        {
            $this->CI->load->model('user_m','',TRUE);
            $roles = $this->CI->user_m->roles();
            $role = $this->CI->session->userdata('role_id');
            if ($role != $roles['admin']) return FALSE;
            return TRUE;
	}
	
	public function logged_in_access() 
        {
            $is_logged_in = $this->CI->session->userdata('logged_in');
            if ($is_logged_in != TRUE) redirect('user/login');
            return TRUE;
	}

	public function is_admin_access() 
        {
            $roles = $this->CI->user_m->roles();
            $role = $this->CI->session->userdata('role_id');
            if ($role != $roles['admin']) redirect('user/restricted');
	}
	
	
	
	
}
/* End of file Auth.php */