<?php

class Model_accounts extends CI_Model {

    function get_users($limit, $offset)
    {
       $this->db->limit($limit,$offset);
       $users = $this->db->select('*')->from('accounts')-> where('role', 0)-> where('isActive', 1)->get();
       
       if($users->num_rows() > 0)
        {
            return $users->result();  
        } 
        else
        {
            return $users->result();
        }     
    }

    function count_homeowner()
    {
        $query = $this->db->select('*')->from('accounts')-> where('role', 0)-> where('isActive', 1)->get();
        return $query->num_rows();   
    }

    function get_admin($limit, $offset)
    {
       $this->db->limit($limit,$offset);
       $admin = $this->db->select('*')->from('accounts')-> where('role', 1)-> where('isActive', 1)->get();
       
       if($admin->num_rows() > 0)
        {
            return $admin->result();  
        } 
        else
        {
            return $admin->result();
        }        
    }

    function count_admin()
    {
        $query = $this->db->select('*')->from('accounts')-> where('role', 1)-> where('isActive', 1)->get();
        return $query->num_rows();   
    }

    function get_deact($limit, $offset)
    {
       $this->db->limit($limit,$offset);
       $deact = $this->db->select('*')->from('accounts')-> where('isActive', 0)->get();
       
       if($deact->num_rows() > 0)
       {
            return $deact->result();  
       } 
       else
       {
            return $deact->result();
       }           
    }

    function count_deact()
    {
        $query = $this->db->select('*')->from('accounts')-> where('isActive', 0)->get();
        return $query->num_rows();   
    }

    function validate() 
    {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', $this->input->post('password'));
        $query = $this->db->get('accounts');
        $result = $query->row();

        if($query->num_rows() == 1)
        {
         $data = array(
                'userid' => $result->userid, 
                'username' => $result->username, 
                'password' => $result->password,
                'firstname' => $result->firstname,
                'lastname' => $result->lastname,
                'email' => $result->email,
                'address' => $result->address,
                'contactnum' => $result->contactnum,
                'role' => $result->role,
                'is_logged_in' => true
            );
            $this->session->set_userdata($data);
            return true;    
        }
        else
        {
            return false;
        }
    }

    function check_role() 
    {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', $this->input->post('password'));
        $this->db->where('role', 1);
        $query = $this->db->get('accounts');
        $result = $query->row();

        if($query->num_rows() == 1)
        {
             $data = array(
                'userid' => $result->userid, 
                'username' => $result->username, 
                'password' => $result->password,
                'firstname' => $result->firstname,
                'lastname' => $result->lastname,
                'email' => $result->email,
                'address' => $result->address,
                'contactnum' => $result->contactnum,
                'role' => $result->role,
                'is_logged_in' => true
            );
            $this->session->set_userdata($data);
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
        $result = $query->row();

        if($query->num_rows() == 1)
        {
            $data = array(
                'userid' => $result->userid, 
                'username' => $result->username, 
                'password' => $result->password,
                'firstname' => $result->firstname,
                'lastname' => $result->lastname,
                'email' => $result->email,
                'address' => $result->address,
                'contactnum' => $result->contactnum,
                'role' => $result->role,
                'is_logged_in' => true
            );
            $this->session->set_userdata($data);
            return true;    
        }
        else 
        {
            return false;
        }
    }

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
   
    function countuser_search($searchquery)
    {
         $query = $this->db->select('*')
                            ->from('accounts')
                            ->where('(role = 0 AND isActive = 1)',NULL,FALSE)
                            ->where('(CONCAT(firstname," ",lastname) LIKE "%'.$searchquery .'%" OR firstname LIKE "%'.$searchquery .'%" OR lastname LIKE "%'.$searchquery .'%" OR username LIKE "%'.$searchquery .'%" OR address LIKE "%'.$searchquery .'%" )',NULL,FALSE)->get(); 
         return $query->num_rows();
    }

    function countadmin_search($searchquery)
    {
         $query = $this->db->select('*')
                            ->from('accounts')
                            ->where('(role = 1 AND isActive = 1)',NULL,FALSE)
                            ->where('(CONCAT(firstname," ",lastname) LIKE "%'.$searchquery .'%" OR firstname LIKE "%'.$searchquery .'%" OR lastname LIKE "%'.$searchquery .'%" OR username LIKE "%'.$searchquery .'%" OR address LIKE "%'.$searchquery .'%" )',NULL,FALSE)->get(); 
         return $query->num_rows();
    }

    function countdeact_search($searchquery)
    {
         $query = $this->db->select('*')
                            ->from('accounts')
                            ->where('(isActive = 0)',NULL,FALSE)
                            ->where('(CONCAT(firstname," ",lastname) LIKE "%'.$searchquery .'%" OR firstname LIKE "%'.$searchquery .'%" OR lastname LIKE "%'.$searchquery .'%" OR username LIKE "%'.$searchquery .'%" OR address LIKE "%'.$searchquery .'%" )',NULL,FALSE)->get(); 
         return $query->num_rows();
    }

    function search_homeowner($searchquery)
    {
      $this->db->select('*')->from('accounts');
      $this->db->where('(role = 0 AND isActive = 1)',NULL,FALSE);
      $this->db->where('(CONCAT(firstname," ",lastname) LIKE "%'.$searchquery .'%" OR firstname LIKE "%'.$searchquery .'%" OR lastname LIKE "%'.$searchquery .'%" OR username LIKE "%'.$searchquery .'%" OR address LIKE "%'.$searchquery .'%" )',NULL,FALSE);
      $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return $query->result();
        }

    }

    function search_admin($searchquery)
    {
      $this->db->select('*')->from('accounts');
      $this->db->where('(role = 1 AND isActive = 1)',NULL,FALSE);
      $this->db->where('(CONCAT(firstname," ",lastname) LIKE "%'.$searchquery .'%" OR firstname LIKE "%'.$searchquery .'%" OR lastname LIKE "%'.$searchquery .'%" OR username LIKE "%'.$searchquery .'%" OR address LIKE "%'.$searchquery .'%" )',NULL,FALSE);
      $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return $query->result();
        }

    }

    function search_deact($searchquery)
    {
      $this->db->select('*')->from('accounts');
      $this->db->where('(isActive = 0)',NULL,FALSE);
      $this->db->where('(CONCAT(firstname," ",lastname) LIKE "%'.$searchquery .'%" OR firstname LIKE "%'.$searchquery .'%" OR lastname LIKE "%'.$searchquery .'%" OR username LIKE "%'.$searchquery .'%" OR address LIKE "%'.$searchquery .'%" )',NULL,FALSE);
      $query = $this->db->get();
      

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return $query->result();
        }

    }
    
    function viewmore_user($userid)
    {
         $query= $this->db->select('*')->where('userid', $userid)->where('role', 0)->get('accounts',1); 
         return $query->row();
    }

    function viewmore_admin($userid)
    {
         $query= $this->db->select('*')->where('userid', $userid)->where('role', 1)->get('accounts',1); 
         return $query->row();
    }

    function viewmore_deact($userid)
    {
         $query= $this->db->select('*')->where('userid', $userid)->where('isActive', 0)->get('accounts',1); 
         return $query->row();
    }

    function url_check_myaccount($userid)
    {
        
        if($userid == $this->session->userdata('userid'))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function url_check_user($userid)
    {
        $query= $this->db->select('userid')->where('userid', $userid)->where('role', 0)->where('isActive', 1)->get('accounts',1); 
        
        foreach($query->result() as $row):
        
            if($userid == $row->userid)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        
        endforeach;
    }

    function url_check_admin($userid)
    {
        $query= $this->db->select('userid')->where('userid', $userid)->where('role', 1)->where('isActive', 1)->get('accounts',1); 
        
        foreach($query->result() as $row):
        
            if($userid == $row->userid)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        
        endforeach;
    }

    function url_check_deact($userid)
    {
        $query= $this->db->select('userid')->where('userid', $userid)->where('isActive', 0)->get('accounts',1); 
        
        foreach($query->result() as $row):
        
            if($userid == $row->userid)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        
        endforeach;
    }

    function acc_delete($userid)
    {
        $this->db->select('*')->where('userid', $userid); 
        $delete = $this->db->delete('accounts');
        return $delete;
    }

    function acc_update($userid)
    {
         $account_update_data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'username' => $this->input->post('username'),
            'address' => $this->input->post('address'),
            'email' => $this->input->post('email'),
            'contactnum' => $this->input->post('contactnum'),
            'role' => $this->input->post('role')
        );

         $this->db->select('*')->where('userid', $userid); 
         $update = $this->db->update('accounts', $account_update_data);
         return $update;
    }

    function myaccount_update($userid)
    {
         $account_update_data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('username'),
            'address' => $this->input->post('address'),
            'email' => $this->input->post('email'),
            'contactnum' => $this->input->post('contactnum'),
        );
         $this->session->set_userdata($account_update_data);
         $this->db->select('*')->where('userid', $userid); 
         $update = $this->db->update('accounts', $account_update_data);
         return $update;

    }
  
      
    function acc_deact($userid) 
    {
        $account_deact_data = array('isActive' => 0);
        $this->db->select('*')->where('userid', $userid); 
        $deact = $this->db->update('accounts', $account_deact_data);
        return $deact;
    }

    function acc_reactivate($userid) 
    {
        $account_react_data = array('isActive' => 1);
        $this->db->select('*')->where('userid', $userid); 
        $reactivate = $this->db->update('accounts', $account_react_data);
        return $reactivate;
    }

}
