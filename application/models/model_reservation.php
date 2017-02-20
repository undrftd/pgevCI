<?php
class Model_reservation extends CI_Model {

	function url_check_courtone($reservationid)
	{
		$query = $this->db->select('*')->from('courtone_reservation')->where('reservation_id' , $reservationid)->get();
		$row = $query->row();

		if ($row->reservation_id== $reservationid)
		{
	  		return TRUE;
		}	
		else
		{
	 		return FALSE;
		}
	}

	function url_check_courttwo($reservationid)
	{
		$query = $this->db->select('*')->from('courttwo_reservation')->where('reservation_id' , $reservationid)->get();
		$row = $query->row();

		if ($row->reservation_id== $reservationid)
		{
	  		return TRUE;
		}	
		else
		{
	 		return FALSE;
		}
	}

	function url_check_clubhouse($reservationid)
	{
		$query = $this->db->select('*')->from('clubhouse_reservation')->where('reservation_id' , $reservationid)->get();
		$row = $query->row();

		if ($row->reservation_id== $reservationid)
		{
	  		return TRUE;
		}	
		else
		{
	 		return FALSE;
		}
	}

	function getreservation_courtone($limit, $offset)
	{
		$this->db->limit($limit,$offset);
		$query = $this->db->select('*')->from('courtone_reservation')->join('accounts', 'accounts.username = courtone_reservation.username')->order_by("reservation_status desc, reservation_date asc")->get();
		return  $query->result();
	}

	function count_reservationcourtone()
	{
		$query = $this->db->select('*')->from('courtone_reservation')->get();
		return $query->num_rows();
	}

	function getreservation_courttwo($limit, $offset)
	{
		$this->db->limit($limit,$offset);
		$query = $this->db->select('*')->from('courttwo_reservation')->join('accounts', 'accounts.username = courttwo_reservation.username')->order_by("reservation_status desc, reservation_date asc")->get();
		return  $query->result();
	}

	function count_reservationcourttwo()
	{
		$query = $this->db->select('*')->from('courttwo_reservation')->get();
		return $query->num_rows();
	}

	function getreservation_clubhouse($limit, $offset)
	{
		$this->db->limit($limit,$offset);
		$query = $this->db->select('*')->from('clubhouse_reservation')->join('accounts', 'accounts.username = clubhouse_reservation.username')->order_by("reservation_status desc, reservation_date asc")->get();
		return  $query->result();
	}

	function count_reservationclubhouse()
	{
		$query = $this->db->select('*')->from('clubhouse_reservation')->get();
		return $query->num_rows();
	}

	function getcourtone_availability($searchquery)
	{
		$query = $this->db->select('*')->from('courtone_reservation')->join('accounts', 'accounts.username = courtone_reservation.username')->where('reservation_date', $searchquery)->get();
		
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
		$query = $this->db->select('*')->from('courttwo_reservation')->join('accounts', 'accounts.username = courttwo_reservation.username')->where('reservation_date', $searchquery)->get();
		
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
		$query = $this->db->select('*')->from('clubhouse_reservation')->join('accounts', 'accounts.username = clubhouse_reservation.username')->where('reservation_date', $searchquery)->get();
		
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return $query->result();
		}
	}

	function approve_courtonereservation($reservationid)
	{
		$reservation_data = array(
			'reservation_status' => 1,
			);

		$this->db->where('reservation_id', $reservationid);
		$update = $this->db->update('courtone_reservation', $reservation_data);
		return $update;
	}

	function deny_courtonereservation($reservationid)
	{
		$reservation_data = array(
			'reservation_status' => 0,
			);

		$this->db->where('reservation_id', $reservationid);
		$update = $this->db->update('courtone_reservation', $reservation_data);
		return $update;
	}

	function approve_courttworeservation($reservationid)
	{
		$reservation_data = array(
			'reservation_status' => 1,
			);

		$this->db->where('reservation_id', $reservationid);
		$update = $this->db->update('courttwo_reservation', $reservation_data);
		return $update;
	}

	function deny_courttworeservation($reservationid)
	{
		$reservation_data = array(
			'reservation_status' => 0,
			);

		$this->db->where('reservation_id', $reservationid);
		$update = $this->db->update('courttwo_reservation', $reservation_data);
		return $update;
	}

	function approve_clubhousereservation($reservationid)
	{
		$reservation_data = array(
			'reservation_status' => 1,
			);

		$this->db->where('reservation_id', $reservationid);
		$update = $this->db->update('clubhouse_reservation', $reservation_data);
		return $update;
	}

	function deny_clubhousereservation($reservationid)
	{
		$reservation_data = array(
			'reservation_status' => 0,
			);

		$this->db->where('reservation_id', $reservationid);
		$update = $this->db->update('clubhouse_reservation', $reservation_data);
		return $update;
	}

	function count_courtone()
    {
        $query = $this->db->select('*')->from('courtone_reservation')->where('reservation_status', 2)->get();
        return $query->num_rows();
    }

    function count_courttwo()
    {
        $query = $this->db->select('*')->from('courttwo_reservation')->where('reservation_status', 2)->get();
        return $query->num_rows();
    }

    function count_clubhouse()
    {
        $query = $this->db->select('*')->from('clubhouse_reservation')->where('reservation_status', 2)->get();
        return $query->num_rows();
    }
}
