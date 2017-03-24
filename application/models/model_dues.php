<?php

class Model_dues extends CI_Model {

	function get_users($limit, $offset)
    {
    	$this->db->limit($limit, $offset);
    	$accounts = $this->db->select('*')->from('accounts')->where('role', 0)->get(); 

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
        $accounts = $this->db->select('*')->from('accounts')->where('role', 1)->get();

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

    function url_check_user($userid)
    {
        $query = $this->db->select('*')->where('userid', $userid)->where('role', 0)->get('accounts', 1);
        $row = $query->row();

        if($query->num_rows() > 0)
        {
            if($userid == $row->userid)
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

    function url_check_admin($userid)
    {
        $query = $this->db->select('*')->where('userid', $userid)->where('role', 1)->get('accounts', 1);
        $row = $query->row();

        if($query->num_rows() > 0)
        {
            if($userid == $row->userid)
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
        $query = $this->db->select('*')->from('accounts')->where('role', 0)->get();
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
                $this->db->where('role', 0)->where('userid', $row->userid);
                $this->db->update('accounts',$data);
            }
            else if ($row->monthly_dues == 0 && $row->arrears >0) 
            {
                $this->db->where('role', 0)->where('userid', $row->userid);
                $this->db->update('accounts',$data2);
            }
            else if(($row->arrears == 0 && $row->monthly_dues > 0) || ($row->arrears > 0 && $row->monthly_dues > 0))
            {  

                $this->db->where('role', 0)->where('userid', $row->userid);
                $this->db->update('accounts',$data3); 
            }

        endforeach;
    }

    function billstart_admin()
    {
        $query = $this->db->select('*')->from('accounts')->where('role', 1)->get();
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
                $this->db->where('role', 1)->where('userid', $row->userid);
                $this->db->update('accounts',$data);
            }
            else if ($row->monthly_dues == 0 && $row->arrears >0) 
            {
                $this->db->where('role', 1)->where('userid', $row->userid);
                $this->db->update('accounts',$data2);
            }
            else if(($row->arrears == 0 && $row->monthly_dues > 0) || ($row->arrears > 0 && $row->monthly_dues > 0))
            {  
                $this->db->where('role', 1)->where('userid', $row->userid);
                $this->db->update('accounts',$data3); 
            }

        endforeach;
    }

    function viewmore_user($userid)
    {
         $query = $this->db->select('*')->where('userid', $userid)->where('role', 0)->get('accounts', 1); 
         return $query->row();
    }

    function viewmore_admin($userid)
    {
         $query = $this->db->select('*')->where('userid', $userid)->where('role', 1)->get('accounts', 1); 
         return $query->row();
    }

    function cleardues_user($userid)
    {
        $query = $this->db->select('*')->where('userid', $userid)->where('role', 0)->where('isActive', 1)->get('accounts', 1);
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
            $this->db->where('userid', $userid);
            $this->db->update('accounts', $data);
        }   
        else if (($row->monthly_dues > 0 && $row->arrears == 0) || ($row->monthly_dues == 0 && $row->arrears == 0))
        {
            $this->db->where('userid', $userid);
            $this->db->update('accounts', $data2);
        }
    }

    function cleardues_admin($userid)
    {
        $query = $this->db->select('*')->where('userid', $userid)->where('role', 1)->where('isActive', 1)->get('accounts', 1);
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
            $this->db->where('userid', $userid);
            $this->db->update('accounts', $data);
        }   
        else if (($row->monthly_dues > 0 && $row->arrears == 0) || ($row->monthly_dues == 0 && $row->arrears == 0))
        {
            $this->db->where('userid', $userid);
            $this->db->update('accounts', $data2);
        }
    }

    function cleararrears_user($userid)
    {
        $query = $this->db->select('*')->where('userid', $userid)->where('role', 0)->where('isActive',1)->get('accounts', 1);
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
            $this->db->where('userid', $userid);
            $this->db->update('accounts', $data);
        }
        else if ($row->monthly_dues > 0 && $row->arrears > 0)
        {
            $this->db->where('userid', $userid);
            $this->db->update('accounts', $data2);
        }
    }

    function cleararrears_admin($userid)
    {
        $query = $this->db->select('*')->where('userid', $userid)->where('role', 1)->where('isActive',1)->get('accounts', 1);
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
            $this->db->where('userid', $userid);
            $this->db->update('accounts', $data);
        }
        else if ($row->monthly_dues > 0 && $row->arrears > 0)
        {
            $this->db->where('userid', $userid);
            $this->db->update('accounts', $data2);
        }
    }

    function updatedues_user($userid)
    {
        $update_dues_data = array(
            'monthly_dues' => $this->input->post('monthly_dues'),    
            'arrears' => $this->input->post('arrears'),
            );

        $this->db->where('userid',$userid);
        $update = $this->db->update('accounts', $update_dues_data);
        return $update;
    }

    function updatedues_admin($userid)
    {
        $update_dues_data = array(
            'monthly_dues' => $this->input->post('monthly_dues'),    
            'arrears' => $this->input->post('arrears'),
            );

        $this->db->where('userid',$userid);
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

        $this->db->where('role', 0);
        $update = $this->db->update('accounts',$update_record_rate);
        return $update;
    }

    function clearrecords_admin()
    {
        $update_record_rate = array(
            'monthly_dues' => '0',
            'arrears' => '0',
            );

        $this->db->where('role', 1);
        $update = $this->db->update('accounts',$update_record_rate);
        return $update;
    }

    function deact_users()
    {

        $update_record_data = array(
            'isActive' => '0',
            );
        
        $queryrate = $this->db->select('*')->from('rate')->where('rateid', 1)->get();
        $rateresult = $queryrate->row();
        $arrears = ($rateresult->securityfee + $rateresult->assocfee) * 3;

        $this->db->where('arrears >=', $arrears)->where('role', 0);
        $update = $this->db->update('accounts',$update_record_data);
        return $update;
    }

    function deact_admin()
    {

        $update_record_data = array(
            'isActive' => '0',
            );
        
        $queryrate = $this->db->select('*')->from('rate')->where('rateid', 1)->get();
        $rateresult = $queryrate->row();
        $arrears = ($rateresult->securityfee + $rateresult->assocfee) * 3;

        $this->db->where('arrears >=', $arrears)->where('role', 1);
        $update = $this->db->update('accounts',$update_record_data);
        return $update;
        return $this->db->affected_rows();
    }

    function filter_paid($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        $accounts = $this->db->select('*')->from('accounts')->where('monthly_dues', 0)->where('arrears', 0)->where('role', 0)->get(); 

        if($accounts->num_rows() > 0)
        {
            return $accounts->result();
        }
        else
        {
            return $accounts->result();
        }
    }

    function count_paid()
    {
        $query = $this->db->select('*')->from('accounts')->where('monthly_dues', 0)->where('arrears', 0)->where('role', 0)->get();   
        return $query->num_rows();
    }

    function filter_unpaid($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        $accounts = $this->db->select('*')->from('accounts')->where("role = 0 AND (arrears > 0 OR monthly_dues > 0)")->get(); 

        if($accounts->num_rows() > 0)
        {
            return $accounts->result();
        }
        else
        {
            return $accounts->result();
        }
    }

    function count_unpaid()
    {
        $query = $this->db->select('*')->from('accounts')->where("role = 0 AND (arrears > 0 OR monthly_dues > 0)")->get();   
        return $query->num_rows();
    }

    function filter_paidadmin($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        $accounts = $this->db->select('*')->from('accounts')->where('monthly_dues', 0)->where('arrears', 0)->where('role', 1)->get(); 

        if($accounts->num_rows() > 0)
        {
            return $accounts->result();
        }
        else
        {
            return $accounts->result();
        }
    }

    function count_paidadmin()
    {
        $query = $this->db->select('*')->from('accounts')->where('monthly_dues', 0)->where('arrears', 0)->where('role', 1)->get();   
        return $query->num_rows();
    }

    function filter_unpaidadmin($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        $accounts = $this->db->select('*')->from('accounts')->where("role = 1 AND (arrears > 0 OR monthly_dues > 0)")->get(); 

        if($accounts->num_rows() > 0)
        {
            return $accounts->result();
        }
        else
        {
            return $accounts->result();
        }
    }

    function count_unpaidadmin()
    {
        $query = $this->db->select('*')->from('accounts')->where("role = 1 AND (arrears > 0 OR monthly_dues > 0)")->get();   
        return $query->num_rows();
    }

    function isunpaid_user()
    {
        $query = $this->db->select('*')->from('accounts')->where('role', 0)->get();
        $ratequery = $this->db->select('*')->where('rateid',1)->get('rate', 1);
        $result = $query->result();
        $rate = $ratequery->row();

        foreach($result as $row)
        {
            if(($row->arrears >  0 && $row->monthly_dues == 0) || ($row->arrears > 0 && $row->monthly_dues > 0 ) || ($row->arrears == 0 && $row->monthly_dues > 0 ))
            {
                if((($row->arrears + $row->monthly_dues) / ($rate->securityfee + $rate->assocfee)) >= 3)
                {
                    $this->load->library('email');
                    $this->email->from("pgevadmin@parkwoodgreens.com");
                    $this->email->to($row->email);
                    $this->email->set_header('Header1', 'NAME');
                    $this->email->subject("Deactivation Notice");
                    $this->email->message("You have 3 months worth of unpaid dues. Please pay immediately to avoid account deactivation.");
                    
                    $this->email->send(); 
                }
            }
        } 
    }

    function isunpaid_admin()
    {
        $query = $this->db->select('*')->from('accounts')->where('role', 1)->get();
        $ratequery = $this->db->select('*')->where('rateid',1)->get('rate', 1);
        $result = $query->result();
        $rate = $ratequery->row();

        foreach($result as $row)
        {
            if(($row->arrears >  0 && $row->monthly_dues == 0) || ($row->arrears > 0 && $row->monthly_dues > 0 ) || ($row->arrears == 0 && $row->monthly_dues > 0 ))
            {
                if((($row->arrears + $row->monthly_dues) / ($rate->securityfee + $rate->assocfee)) >= 3)
                {
                    $this->load->library('email');
                    $this->email->from("pgevadmin@parkwoodgreens.com");
                    $this->email->to($row->email);
                    $this->email->set_header('Header1', 'NAME');
                    $this->email->subject("Deactivation Notice");
                    $this->email->message("You have 3 months worth of unpaid dues. Please pay immediately to avoid account deactivation.");
                    
                    $this->email->send(); 
                }
            }
        } 
    }
}