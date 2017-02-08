<?php

class Model_reservation_user extends CI_Model {
	
	function getmyreservation_courtone()
	{
		$query = $this->db->select('*')->from('courtone_reservation')->where('user_id', $this->session->userdata('userid'))->get();
		return $query->result();
	}

	function getmyreservation_courttwo()
	{
		$query = $this->db->select('*')->from('courttwo_reservation')->where('user_id', $this->session->userdata('userid'))->get();
		return $query->result();
	}

	function getmyreservation_clubhouse()
	{
		$query = $this->db->select('*')->from('clubhouse_reservation')->where('user_id', $this->session->userdata('userid'))->get();
		return $query->result();
	}

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
		if (($this->input->post('reserveend') - $this->input->post('reservestart')) >= 2)
		{
			$reservemid = $this->input->post('reservestart') + 1;
		}
		else
		{
			$reservemid = 0;
		}

		$reserve_data = array(
			'user_id' => $this->session->userdata('userid'),
			'reservation_date' => $this->input->post('datepick'),
			'reservation_start' => $this->input->post('reservestart'),
			'reservation_mid' => $reservemid,
			'reservation_end' => $this->input->post('reserveend')
		);

		$insert = $this->db->insert('courtone_reservation', $reserve_data);
		return $insert;
	}

	function create_reservation_courttwo()
	{
		if (($this->input->post('reserveend') - $this->input->post('reservestart')) >= 2)
		{
			$reservemid = $this->input->post('reservestart') + 1;
		}
		else
		{
			$reservemid = 0;
		}

		$reserve_data = array(
			'user_id' => $this->session->userdata('userid'),
			'reservation_date' => $this->input->post('datepick'),
			'reservation_start' => $this->input->post('reservestart'),
			'reservation_mid' => $reservemid,
			'reservation_end' => $this->input->post('reserveend')
		);

		$insert = $this->db->insert('courttwo_reservation', $reserve_data);
		return $insert;
	}

	function create_reservation_clubhouse()
	{
		if (($this->input->post('reserveend') - $this->input->post('reservestart')) >= 2)
		{
			$reservemid = $this->input->post('reservestart') + 1;
		}
		else
		{
			$reservemid = 0;
		}

		$reserve_data = array(
			'user_id' => $this->session->userdata('userid'),
			'reservation_date' => $this->input->post('datepick'),
			'reservation_start' => $this->input->post('reservestart'),
			'reservation_mid' => $reservemid,
			'reservation_end' => $this->input->post('reserveend')
		);

		$insert = $this->db->insert('clubhouse_reservation', $reserve_data);
		return $insert;
	}

}
