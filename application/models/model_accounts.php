<?php

class Model_accounts extends CI_Model {

    function display_acc()
    {
       $query = $this->db->select('*')->from('accounts')->get();
       return $query->result();      
    }

    function validate() 
    {

        $this->db->where('userid', $this->input->post('userid'));
        $this->db->where('password', $this->input->post('password'));
        $query = $this->db->get('accounts');

        if($query->num_rows() == 1)
        {
            return true;    
        }
    }

    function check_role() 
    {
        
       $this->db->where('userid', $this->input->post('userid'));
        $this->db->where('password', $this->input->post('password'));
        $this->db->where('role', 1);
        $query = $this->db->get('accounts');
        
        if($query->num_rows() == 1)
        {
        
            return true;    
        }
        else 
        {
            
            return false;
        }
    }
}
