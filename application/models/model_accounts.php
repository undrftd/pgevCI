<?php

class Model_accounts extends CI_Model {

    function validate()
    {
        $this->db->where('username', $this->input->post('username'));   
        $query = $this->db->get('accounts');
        $result = $query->row();

        if($query->num_rows() == 1)
        {
            $password = $this->input->post('password');
            $stored_hash = $result->password;
            if ($this->bcrypt->check_password($password, $stored_hash))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    function check_role()
    {
        $this->db->where('username', $this->input->post('username'));
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
                'monthly_dues' => $result->monthly_dues,
                'arrears' => $result->arrears,
                'isAdmin' => true,
                'contactnum' => $result->contactnum,
                'role' => $result->role
            );
            $this->session->set_userdata($data);
            return true;
        }
        else
        {
            return false;
        }
    }

    function check_user()
    {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('role', 0);
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
                'monthly_dues' => $result->monthly_dues,
                'arrears' => $result->arrears,
                'isAdmin' => false,
                'contactnum' => $result->contactnum,
                'role' => $result->role
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
        $this->db->where('isActive', 1);
        $query = $this->db->get('accounts');
        $result = $query->row();

        if($query->num_rows() == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function url_check_email()
    {
        $query= $this->db->select('email')->where('email', $this->input->post('email'))->get('accounts',1);
        

        if($query->num_rows() > 0)
        {
            $row = $query->row();
            if($row->email == $this->input->post('email'))
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }

    function update_resetkey($resetkey)
    {
        $reset_data = array(
                'reset_key' => $resetkey
            );
        $this->db->where('email', $this->input->post('email'));
        $this->db->update('accounts', $reset_data);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function reset_password()
    {
        $resetkey = $this->input->post('resetkey');

        $reset_data = array(
                'password' =>  $this->bcrypt->hash_password($this->input->post('password')),
                'reset_key' => ''
            );

        $this->db->where('reset_key', $resetkey);
        $this->db->update('accounts', $reset_data);
    }

    function checkreset_key($resetkey)
    {
        $this->db->where('reset_key', $resetkey);
        $this->db->from('accounts');
        return $this->db->count_all_results();
    }

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


    function create_account()
    {
        $new_account_insert_data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'username' => $this->input->post('username'),
            'password' => $this->bcrypt->hash_password($this->input->post('password')),
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

    function viewmore_user($username)
    {
         $query= $this->db->select('*')->where('username', $username)->where('role', 0)->get('accounts',1);
         return $query->row();
    }

    function viewmore_admin($username)
    {
         $query= $this->db->select('*')->where('username', $username)->where('role', 1)->get('accounts',1);
         return $query->row();
    }

    function viewmore_deact($username)
    {
         $query= $this->db->select('*')->where('username', $username)->where('isActive', 0)->get('accounts',1);
         return $query->row();
    }

    function url_check_myaccount($username)
    {
        if($username == $this->session->userdata('username'))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function url_check_user($username)
    {
        $query= $this->db->select('username')->where('username', $username)->where('role', 0)->where('isActive', 1)->get('accounts',1);
        $row = $query->row();

        if($username == $row->username)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function url_check_admin($username)
    {
        $query= $this->db->select('username')->where('username', $username)->where('role', 1)->where('isActive', 1)->get('accounts',1);
        $row = $query->row();

        if($username == $row->username)
        {
             return TRUE;
        }
        else
        {
             return FALSE;
        }
    }

    function url_check_deact($username)
    {
        $query= $this->db->select('username')->where('username', $username)->where('isActive', 0)->get('accounts',1);
        $row = $query->row();

        if($username == $row->username)
        {
             return TRUE;
        }
        else
        {
            return FALSE;
         }
    }

    function acc_delete($username)
    {
        $this->db->where('username', $username);
        $delete = $this->db->delete('accounts');
        return $delete;
    }

    function acc_update($username)
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

         $this->db->where('username', $username);
         $update = $this->db->update('accounts', $account_update_data);
         return $update;
    }

    function myaccount_update($username)
    {
         $account_update_data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'username' => $this->input->post('username'),
            'password' => $this->bcrypt->hash_password($this->input->post('username')),
            'address' => $this->input->post('address'),
            'email' => $this->input->post('email'),
            'contactnum' => $this->input->post('contactnum'),
        );
         $this->session->set_userdata($account_update_data);
         $this->db->where('username', $username);
         $update = $this->db->update('accounts', $account_update_data);
         return $update;
    }


    function acc_deact($username)
    {
        $account_deact_data = array('isActive' => 0);
        $this->db->where('username', $username);
        $deact = $this->db->update('accounts', $account_deact_data);
        return $deact;
    }

    function acc_reactivate($username)
    {
        $account_react_data = array('isActive' => 1);
        $this->db->where('username', $username);
        $reactivate = $this->db->update('accounts', $account_react_data);
        return $reactivate;
    }

}
