<?php

class Model_reservation_user extends CI_Model {

	function getcourtone_defaultavailability()
	{
		$query = $this->db->select('*')->from('courtone_reservation')->where('reservation_date', date("Y/m/d"))->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}

	function getcourtone_availability($searchquery)
	{
		$query = $this->db->select('*')->from('courtone_reservation')->where('reservation_date', $searchquery)->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}

}
