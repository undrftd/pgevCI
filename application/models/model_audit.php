<?php

class Model_audit extends CI_Model {

	function get_audit($limit, $offset)
    {
        $this->db->limit($limit,$offset);
		$query = $this->db->select('*')->from('usertracking')->order_by('timestamp', 'desc')->get();
		
		if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return $query->result();
        }
	}

	function count_audit()
	{
		$query = $this->db->select('*')->from('usertracking')->get();
		return $query->num_rows();
	}
}
