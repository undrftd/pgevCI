<?php

class Model_reservation_user extends CI_Model {

	function get_availability($searchquery)
	{
		$this->db->select('*')->from('reservation')->where('reservation_date', $searchquery);
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
	

}
