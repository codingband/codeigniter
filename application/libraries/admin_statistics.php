<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_statistics
{
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('statistic_m','',TRUE);
    }

    public function getAmmountUsers($ini,$fin)
    {
        return $this->CI->statistic_m->getAmmountUsers($ini,$fin);
    }

    public function getAmmountTips($ini,$fin)
    {	
        return $this->CI->statistic_m->getAmmountTips($ini,$fin);
    }

    public function getAmmountsSocialTips($ini,$fin)
    {	
        return $this->CI->statistic_m->getAmmountsSocialTips($ini,$fin);
    }
    public function getAmmountsSocialVideos($ini,$fin)
    {	
        return $this->CI->statistic_m->getAmmountsSocialVideos($ini,$fin);
    }

    public function getAmmountInviteFriends($ini,$fin) 
    {
        return $this->CI->statistic_m->getAmmountInviteFriends($ini,$fin);
    }
}
/* End of file Admin_statistics.php */