<?php

class Model_bulletin_user extends CI_Model
{
	function select_bulletin()
	{
		$query = $this->db->select('*')->from('bulletin')->get();

		if($query->num_rows() > 0)
		{
	    	return $query->result();
		}
		else
		{
	    	return $query->result();
		}
	}

	function count_bulletin()
	{
		$query = $this->db->select('*')->from('bulletin')->get();
		return $query->num_rows();
	}
	

}
