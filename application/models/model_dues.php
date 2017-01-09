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

    function billstart_user()
    {
        $query = $this->db->select('*')->from('accounts')->where('role', 0)->where('isActive', 1)->get();
        
        foreach($query->result() as $row):
            
            $data = array(
                   'monthly_dues' => '800',
                   'arrears' => '0',
                );

            $data2 = array(
                   'monthly_dues' => '800',
                   'arrears' => $row->arrears,
                );

            $data3 = array(
                   'monthly_dues' => '800',
                   'arrears' => $row->arrears + '800'
                );
            

        if($row->arrears == 0 && $row->monthly_dues == 0)
        {
            $this->db->where('role', 0)->where('isActive', 1)->where('userid', $row->userid);
            $this->db->update('accounts',$data);

            print_r($this->db->last_query());
        }
        else if ($row->monthly_dues == 0 && $row->arrears >0) 
        {
            $this->db->where('role', 0)->where('isActive', 1)->where('userid', $row->userid);
            $this->db->update('accounts',$data2);
        }
        else if(($row->arrears == 0 && $row->monthly_dues > 0) || ($row->arrears > 0 && $row->monthly_dues > 0))
        {  

            $this->db->where('role', 0)->where('isActive', 1)->where('userid', $row->userid);
            $this->db->update('accounts',$data3); 

            print_r($this->db->last_query());
        }
        endforeach;
    }

    function viewmore_user($userid)
    {
         $query = $this->db->select('*')->where('userid', $userid)->where('role', 0)->get('accounts', 1); 
         return $query->row();
    }

    function cleardues_user($userid)
    {
        $query = $this->db->select('*')->where('userid', $userid)->where('role', 0)->where('isActive', 1)->get('accounts', 1);
      
        foreach($query->result() as $row):
            
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

        endforeach;
    }

    function cleararrears_user($userid)
    {
        $query = $this->db->select('*')->where('userid', $userid)->where('role', 0)->where('isActive',1)->get('accounts', 1);

        foreach($query->result() as $row):

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

        endforeach;
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
}