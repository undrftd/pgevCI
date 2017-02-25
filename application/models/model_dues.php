<?php

class Model_dues extends CI_Model {

	function get_users($limit, $offset)
    {
    	$this->db->limit($limit, $offset);
    	$accounts = $this->db->select('*')->from('accounts')->where('isActive', 1)->where('role', 0)->get(); 

    	if($accounts->num_rows() > 0)
    	{
    		return $accounts->result();
    	}
    	else
    	{
    		return $accounts->result();
    	}
    }

    function get_admin($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        $accounts = $this->db->select('*')->from('accounts')->where('isActive', 1)->where('role', 1)->get();

        if($accounts->num_rows() > 0)
        {
            return $accounts->result();
        }
        else
        {
            return $accounts->result();
        }
    }

	function count_user()
    {
    	$query = $this->db->select('*')->from('accounts')->where('isActive', 1)->where('role', 0)->get(); 
    	return $query->num_rows();
    }

    function count_admin()
    {
        $query = $this->db->select('*')->from('accounts')->where('isActive', 1)->where('role', 1)->get();
        return $query->num_rows();
    }

    function get_rate()
    {
        $query = $this->db->select('*')->where('rateid',1)->get('rate', 1);
        return $query->row();      
    }

    function url_check_user($username)
    {
        $query = $this->db->select('*')->where('username', $username)->where('role', 0)->where('isActive', 1)->get('accounts', 1);
        $row = $query->row();

        if($query->num_rows() > 0)
        {
            if($username == $row->username)
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

    function url_check_admin($username)
    {
        $query = $this->db->select('*')->where('username', $username)->where('role', 1)->where('isActive', 1)->get('accounts', 1);
        $row = $query->row();

        if($query->num_rows() > 0)
        {
            if($username == $row->username)
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

    function billstart_user()
    {
        $query = $this->db->select('*')->from('accounts')->where('role', 0)->where('isActive', 1)->get();
        $ratequery = $this->db->select('*')->where('rateid',1)->get('rate', 1);
        $rateresult = $ratequery->row();
        
        foreach($query->result() as $row):
            
            $data = array(
                   'monthly_dues' => $rateresult->securityfee + $rateresult->assocfee,
                   'arrears' => '0',
                );

            $data2 = array(
                   'monthly_dues' => $rateresult->securityfee + $rateresult->assocfee,
                   'arrears' => $row->arrears,
                );

            $data3 = array(
                   'monthly_dues' => $rateresult->securityfee + $rateresult->assocfee,
                   'arrears' => $row->arrears + ($rateresult->securityfee + $rateresult->assocfee),
                );
            

            if($row->arrears == 0 && $row->monthly_dues == 0)
            {
                $this->db->where('role', 0)->where('isActive', 1)->where('username', $row->username);
                $this->db->update('accounts',$data);
            }
            else if ($row->monthly_dues == 0 && $row->arrears >0) 
            {
                $this->db->where('role', 0)->where('isActive', 1)->where('username', $row->username);
                $this->db->update('accounts',$data2);
            }
            else if(($row->arrears == 0 && $row->monthly_dues > 0) || ($row->arrears > 0 && $row->monthly_dues > 0))
            {  

                $this->db->where('role', 0)->where('isActive', 1)->where('username', $row->username);
                $this->db->update('accounts',$data3); 
            }

        endforeach;
    }

    function billstart_admin()
    {
        $query = $this->db->select('*')->from('accounts')->where('role', 1)->where('isActive', 1)->get();
        $ratequery = $this->db->select('*')->where('rateid',1)->get('rate', 1);
        $rateresult = $ratequery->row();
        
        foreach($query->result() as $row):
            
            $data = array(
                   'monthly_dues' => $rateresult->securityfee + $rateresult->assocfee,
                   'arrears' => '0',
                );

            $data2 = array(
                   'monthly_dues' => $rateresult->securityfee + $rateresult->assocfee,
                   'arrears' => $row->arrears,
                );

            $data3 = array(
                   'monthly_dues' => $rateresult->securityfee + $rateresult->assocfee,
                   'arrears' => $row->arrears + ($rateresult->securityfee + $rateresult->assocfee),
                );
            

            if($row->arrears == 0 && $row->monthly_dues == 0)
            {
                $this->db->where('role', 1)->where('isActive', 1)->where('username', $row->username);
                $this->db->update('accounts',$data);
            }
            else if ($row->monthly_dues == 0 && $row->arrears >0) 
            {
                $this->db->where('role', 1)->where('isActive', 1)->where('username', $row->username);
                $this->db->update('accounts',$data2);
            }
            else if(($row->arrears == 0 && $row->monthly_dues > 0) || ($row->arrears > 0 && $row->monthly_dues > 0))
            {  
                $this->db->where('role', 1)->where('isActive', 1)->where('username', $row->username);
                $this->db->update('accounts',$data3); 
            }

        endforeach;
    }

    function viewmore_user($username)
    {
         $query = $this->db->select('*')->where('username', $username)->where('role', 0)->get('accounts', 1); 
         return $query->row();
    }

    function viewmore_admin($username)
    {
         $query = $this->db->select('*')->where('username', $username)->where('role', 1)->get('accounts', 1); 
         return $query->row();
    }

    function cleardues_user($username)
    {
        $query = $this->db->select('*')->where('username', $username)->where('role', 0)->where('isActive', 1)->get('accounts', 1);
        $row = $query->row();
            
        $data = array(
                'monthly_dues' => '0',
                'arrears' => $row->arrears,
            );

        $data2 = array(
                'monthly_dues' => '0',
                'arrears' => '0',
            );
         
        if($row->monthly_dues > 0 && $row->arrears > 0)
        {
            $this->db->where('username', $username);
            $this->db->update('accounts', $data);
        }   
        else if (($row->monthly_dues > 0 && $row->arrears == 0) || ($row->monthly_dues == 0 && $row->arrears == 0))
        {
            $this->db->where('username', $username);
            $this->db->update('accounts', $data2);
        }
    }

    function cleardues_admin($username)
    {
        $query = $this->db->select('*')->where('username', $username)->where('role', 1)->where('isActive', 1)->get('accounts', 1);
        $row = $query->row();
            
        $data = array(
                'monthly_dues' => '0',
                'arrears' => $row->arrears,
            );

        $data2 = array(
                'monthly_dues' => '0',
                'arrears' => '0',
            );
         
        if($row->monthly_dues > 0 && $row->arrears > 0)
        {
            $this->db->where('username', $username);
            $this->db->update('accounts', $data);
        }   
        else if (($row->monthly_dues > 0 && $row->arrears == 0) || ($row->monthly_dues == 0 && $row->arrears == 0))
        {
            $this->db->where('username', $username);
            $this->db->update('accounts', $data2);
        }
    }

    function cleararrears_user($username)
    {
        $query = $this->db->select('*')->where('username', $username)->where('role', 0)->where('isActive',1)->get('accounts', 1);
        $row = $query->row();

        $data = array(
                'monthly_dues' => '0',
                'arrears' => '0',
            );

        $data2 = array(
                'monthly_dues' => $row->monthly_dues,
                'arrears' => '0',
            );

        if($row->monthly_dues == 0 && $row->arrears > 0)
        {
            $this->db->where('username', $username);
            $this->db->update('accounts', $data);
        }
        else if ($row->monthly_dues > 0 && $row->arrears > 0)
        {
            $this->db->where('username', $username);
            $this->db->update('accounts', $data2);
        }
    }

    function cleararrears_admin($username)
    {
        $query = $this->db->select('*')->where('username', $username)->where('role', 1)->where('isActive',1)->get('accounts', 1);
        $row = $query->row();

        $data = array(
                'monthly_dues' => '0',
                'arrears' => '0',
            );

        $data2 = array(
                'monthly_dues' => $row->monthly_dues,
                'arrears' => '0',
            );

        if($row->monthly_dues == 0 && $row->arrears > 0)
        {
            $this->db->where('username', $username);
            $this->db->update('accounts', $data);
        }
        else if ($row->monthly_dues > 0 && $row->arrears > 0)
        {
            $this->db->where('username', $username);
            $this->db->update('accounts', $data2);
        }
    }

    function updatedues_user($username)
    {
        $update_dues_data = array(
            'monthly_dues' => $this->input->post('monthly_dues'),    
            'arrears' => $this->input->post('arrears'),
            );

        $this->db->where('username',$username);
        $update = $this->db->update('accounts', $update_dues_data);
        return $update;
    }

    function updatedues_admin($username)
    {
        $update_dues_data = array(
            'monthly_dues' => $this->input->post('monthly_dues'),    
            'arrears' => $this->input->post('arrears'),
            );

        $this->db->where('username',$username);
        $update = $this->db->update('accounts', $update_dues_data);
        return $update;
    }

    function editrates()
    {
        $update_rate_data = array(
            'securityfee' => $this->input->post('securityfee'),
            'assocfee' => $this->input->post('assocfee'),
            );

        $this->db->where('rateid', 1);
        $update = $this->db->update('rate', $update_rate_data);
        return $update;
    }

    function clearrecords_user()
    {
        $update_record_rate = array(
            'monthly_dues' => '0',
            'arrears' => '0',
            );

        $this->db->where('role', 0)->where('isActive', 1);
        $update = $this->db->update('accounts',$update_record_rate);
        return $update;
    }

    function clearrecords_admin()
    {
        $update_record_rate = array(
            'monthly_dues' => '0',
            'arrears' => '0',
            );

        $this->db->where('role', 1)->where('isActive', 1);
        $update = $this->db->update('accounts',$update_record_rate);
        return $update;
    }
}