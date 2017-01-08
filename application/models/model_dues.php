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

    function cleardues_user($userid)
    {
        $query = $this->db->select('*')->from('accounts')->where('userid', $userid)->where('role', 0)->where('isActive', 1)->get('accounts',1);

        foreach($query->result() as $row):
            $data = array(
                    'monthly_dues' => '0',
                    'arrears' => $row->arrears - '800'
                );
        endforeach;

        $this->db->update('accounts', $data);
    }
}