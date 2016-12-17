<?php

class Model_accounts extends CI_Model {

    function display_users()
    {
       $users = $this->db->select('*')->from('accounts')-> where('role', 0)-> where('isActive', 1)->get();
       return $users->result();      
    }

    function display_admin()
    {
       $admin = $this->db->select('*')->from('accounts')-> where('role', 1)-> where('isActive', 1)->get();
       return $admin->result();      
    }

    function display_deact()
    {
       $deact = $this->db->select('*')->from('accounts')-> where('isActive', 0)->get();
       return $deact->result();      
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

    function check_active() 
    {
        
        $this->db->where('userid', $this->input->post('userid'));
        $this->db->where('password', $this->input->post('password'));
        $this->db->where('isActive', 1);
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
