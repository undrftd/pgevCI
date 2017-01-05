<?php

class Model_dues extends CI_Model {

	function get_accounts($limit, $offset)
    {
    	$this->db->limit($limit, $offset);
    	$accounts = $this->db->select('*')->from('accounts')->get(); //->where('isActive', 1)

    	if($accounts->num_rows() > 0)
    	{
    		return $accounts->result();
    	}
    	else
    	{
    		return $accounts->result();
    	}
    }

	function count_accounts()
    {
    	$query = $this->db->select('*')->from('accounts')->get(); //->where('isActive', 1)
    	return $query->num_rows();
    }

}