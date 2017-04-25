<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_configuration
{
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('configuration_m','',TRUE);
    }

    public function getSetup()
    {
        return $this->CI->configuration_m->getSetup();
    }
    
    public function saveSetup($setup)
    {
        return $this->CI->configuration_m->saveSetup($setup);
    }
}
/* End of file Admin_configuration.php */
?>
