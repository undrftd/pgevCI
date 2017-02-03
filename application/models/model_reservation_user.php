<?php

class Model_reservation_user extends CI_Model {

	function get_defaultavailability()
	{
		$query = $this->db->select('*')->from('reservation')->where('reservation_date', date("Y/m/d"))->get();
		return $query->row();
	}

	function get_availability($searchquery)
	{
		$query = $this->db->select('*')->from('reservation')->where('reservation_date', $searchquery)->get();
		
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return FALSE;
		}
	}

	function get_searchdate($searchquery)
	{
		$query = $this->db->select('*')->from('reservation')->where('reservation_date', $searchquery)->get();
		$result = $query->row();

		return $result->reservation_date;
	}

	function get_availabledate()
	{
		$query = $this->db->select('*')->from('reservation')->get();
		$result = $query->row();

		return $result->reservation_date;

	}

	function check_reservationdatabase($searchquery)
	{
		$query = $this->db->select('*')->from('reservation')->where('reservation_date', $searchquery)->get();
		$result = $query->row();

		if($result == $searchquery)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	

}
