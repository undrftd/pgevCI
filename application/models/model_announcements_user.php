<?php

class Model_announcements_user extends CI_Model
{
	function select_announcements()
	{
		$query = $this->db->select('*')->from('announcements')->get();

		if($query->num_rows() > 0)
		{
	    	return $query->result();
		}
		else
		{
	    	return $query->result();
		}
	}

	function count_announcements()
  	{
    	$query = $this->db->select('*')->from('announcements')->get();
    	return $query->num_rows();
  	}

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
