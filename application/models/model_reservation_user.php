<?php

class Model_reservation_user extends CI_Model {

	function getcourtone_defaultavailability()
	{
		$query = $this->db->select('*')->from('courtone_reservation')->where('reservation_date', date("m/d/Y"))->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return $query->result();
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
			return $query->result();
		}
	}

	function getcourttwo_defaultavailability()
	{
		$query = $this->db->select('*')->from('courttwo_reservation')->where('reservation_date', date("m/d/Y"))->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return $query->result();
		}
	}

	function getcourttwo_availability($searchquery)
	{
		$query = $this->db->select('*')->from('courttwo_reservation')->where('reservation_date', $searchquery)->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return $query->result();
		}
	}

	function getclubhouse_defaultavailability()
	{
		$query = $this->db->select('*')->from('clubhouse_reservation')->where('reservation_date', date("m/d/Y"))->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return $query->result();
		}
	}

	function getclubhouse_availability($searchquery)
	{
		$query = $this->db->select('*')->from('clubhouse_reservation')->where('reservation_date', $searchquery)->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return $query->result();
		}
	}

	function create_reservation_courtone()
	{
		$reserve_data = array(
			'user_id' => $this->session->userdata('userid'),
			'reservation_date' => $this->input->post('datepick'),
			'reservation_time' => $this->input->post('reservetime')
		);

		$insert = $this->db->insert('courtone_reservation', $reserve_data);
		return $insert;
	}

	function create_reservation_courttwo()
	{
		$reserve_data = array(
			'user_id' => $this->session->userdata('userid'),
			'reservation_date' => $this->input->post('datepick'),
			'reservation_time' => $this->input->post('reservetime')
		);

		$insert = $this->db->insert('courttwo_reservation', $reserve_data);
		return $insert;
	}

	function create_reservation_clubhouse()
	{
		$reserve_data = array(
			'user_id' => $this->session->userdata('userid'),
			'reservation_date' => $this->input->post('datepick'),
			'reservation_time' => $this->input->post('reservetime')
		);

		$insert = $this->db->insert('clubhouse_reservation', $reserve_data);
		return $insert;
	}

}
