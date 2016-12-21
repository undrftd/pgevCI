<?php

class Model_accounts extends CI_Model {

    function get_users()
    {
       $users = $this->db->select('*')->from('accounts')-> where('role', 0)-> where('isActive', 1)->get();
       return $users->result();      
    }

    function get_admin()
    {
       $admin = $this->db->select('*')->from('accounts')-> where('role', 1)-> where('isActive', 1)->get();
       return $admin->result();      
    }

    function get_deact()
    {
       $deact = $this->db->select('*')->from('accounts')-> where('isActive', 0)->get();
       return $deact->result();      
    }

    function validate() 
    {

        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', $this->input->post('password'));
        $query = $this->db->get('accounts');

        if($query->num_rows() == 1)
        {
            return true;    
        }
    }

    function check_role() 
    {
        
        $this->db->where('username', $this->input->post('username'));
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
        
        $this->db->where('username', $this->input->post('username'));
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

    /*function checkExisting($username) 
    {
        $this->db->where('username', $this->input->post('username'));
        $query = $this->db->get('accounts');

        if($query->num_rows() > 0)
        {
            return $query->result();    
        }
        else 
        {
            return $query->result();
        }
    }*/

    function create_account() 
    {
        $new_account_insert_data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'address' => $this->input->post('address'),
            'email' => $this->input->post('email'),
            'contactnum' => $this->input->post('contactnum'),
            'role' => $this->input->post('role')
        );
         $insert = $this->db->insert('accounts', $new_account_insert_data);
         return $insert;
    }
        /*if($this->model_accounts->checkExisting($new_account_insert_data['username']))
        {
            $data['main_content'] = 'view_adminaddaccounts';
            $data['message'] = "Username already exists!";
            $this->load->view('includes/admin_addaccount_template', $data);
        }
        else
        {
           
        }
    }*/

    /*function deactivate() 
    {
        $id=$_GET['username'];
        $this->db->set('0', $isActive);
        $this->db->where('username', $id);
        $this->db->update('accounts');
    }*/
}
