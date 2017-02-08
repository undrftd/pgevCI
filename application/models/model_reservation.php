<?php
class Model_reservation extends CI_Model {

	function getreservation_courtone()
	{
		$query = $this->db->select('*')->from('courtone_reservation')->where('reservation_date', date("m/d/Y"))->get();
		return  $query->result();
	}

	function getreservation_courttwo()
	{
		$query = $this->db->select('*')->from('courttwo_reservation')->where('reservation_date', date("m/d/Y"))->get();
		return  $query->result();
	}

	function getreservation_clubhouse()
	{
		$query = $this->db->select('*')->from('clubhouse_reservation')->where('reservation_date', date("m/d/Y"))->get();
		return  $query->result();
	}


}
