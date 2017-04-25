<?php
/**
 * Configuration model
 */
class Configuration_m extends CI_Model
{
    public function getSetup()
    {
        $result = $this->db->get('setup');
        $setup = array();
        
        if($result->num_rows() > 0)
        {
            foreach($result->result() as $opt)
            {
                $setup[''.$opt->key] = $opt->value;
            }
        }
        
        return $setup;
    }
    
    public function saveSetup($setup)
    {
        foreach($setup as $key => $opt)
        {
            $result = $this->db->where('setup.key', $key)->get('setup');
            
            if($result->num_rows() > 0)
            {
                $this->db->where('setup.key',$key)->update('setup',array('value' => $opt));
            }else{
                $this->db->insert('setup',array('setup.key' => $key, 'value' => $opt));
            }
        }
        
        return true;
    }
}
?>
