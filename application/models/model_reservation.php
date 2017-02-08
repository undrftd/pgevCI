<?php
class Model_reservation extends CI_Model {

	function getreservation_courtone($limit, $offset)
	{
		$this->db->limit($limit,$offset);
		$query = $this->db->select('*')->from('courtone_reservation')->join('accounts', 'accounts.userid = courtone_reservation.user_id')->order_by("reservation_date asc, reservation_start asc")->get();
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
		$query = $this->db->select('*')->from('courttwo_reservation')->join('accounts', 'accounts.userid = courttwo_reservation.user_id')->order_by("reservation_date asc, reservation_start asc")->get();
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
		$query = $this->db->select('*')->from('clubhouse_reservation')->join('accounts', 'accounts.userid = clubhouse_reservation.user_id')->order_by("reservation_date asc, reservation_start asc")->get();
		return  $query->result();
	}

	function count_reservationclubhouse()
	{
		$query = $this->db->select('*')->from('clubhouse_reservation')->get();
		return $query->num_rows();
	}

	function getcourtone_availability($searchquery)
	{
		$query = $this->db->select('*')->from('courtone_reservation')->join('accounts', 'accounts.userid = courtone_reservation.user_id')->where('reservation_date', $searchquery)->get();
		
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
		$query = $this->db->select('*')->from('courttwo_reservation')->join('accounts', 'accounts.userid = courttwo_reservation.user_id')->where('reservation_date', $searchquery)->get();
		
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
		$query = $this->db->select('*')->from('clubhouse_reservation')->join('accounts', 'accounts.userid = clubhouse_reservation.user_id')->where('reservation_date', $searchquery)->get();
		
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
