<?php

class Model_reservation_user extends CI_Model {
	
	function getmyreservation_courtone($limit, $offset)
	{
		$this->db->limit($limit,$offset);
		$query = $this->db->select('*')->from('courtone_reservation')->where('username', $this->session->userdata('username'))->order_by("reservation_date asc, reservation_time asc")->get();
		
		if($query->num_rows() > 0)
    	{
    		return $query->result();
    	}
    	else
    	{
    		return $query->result();
    	}
	}

	function count_reservationcourtone()
	{
		$query = $this->db->select('*')->from('courtone_reservation')->where('username', $this->session->userdata('username'))->get();
		return $query->num_rows();
	}

	function getmyreservation_courttwo($limit, $offset)
	{
		$this->db->limit($limit,$offset);
		$query = $this->db->select('*')->from('courttwo_reservation')->where('username', $this->session->userdata('username'))->order_by("reservation_date asc, reservation_time asc")->get();
		
		if($query->num_rows() > 0)
    	{
    		return $query->result();
    	}
    	else
    	{
    		return $query->result();
    	}
	}

	function count_reservationcourttwo()
	{
		$query = $this->db->select('*')->from('courttwo_reservation')->where('username', $this->session->userdata('username'))->get();
		return $query->num_rows();
	}

	function getmyreservation_clubhouse($limit, $offset)
	{
		$this->db->limit($limit,$offset);	
		$query = $this->db->select('*')->from('clubhouse_reservation')->where('username', $this->session->userdata('username'))->order_by("reservation_date asc, reservation_time asc")->get();
		
		if($query->num_rows() > 0)
    	{
    		return $query->result();
    	}
    	else
    	{
    		return $query->result();
    	}
	}

	function count_reservationclubhouse()
	{
		$query = $this->db->select('*')->from('clubhouse_reservation')->where('username', $this->session->userdata('username'))->get();
		return $query->num_rows();
	}

	function getcourtone_defaultavailability()
	{
		$query = $this->db->select('*')->from('courtone_reservation')->where('reservation_date', date("m/d/Y"))->where('reservation_status', 1)->get();
		
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
		$query = $this->db->select('*')->from('courtone_reservation')->where('reservation_date', $searchquery)->where('reservation_status', 1)->get();
		
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
		$query = $this->db->select('*')->from('courttwo_reservation')->where('reservation_date', date("m/d/Y"))->where('reservation_status', 1)->get();
		
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
		$query = $this->db->select('*')->from('courttwo_reservation')->where('reservation_date', $searchquery)->where('reservation_status', 1)->get();
		
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
		$query = $this->db->select('*')->from('clubhouse_reservation')->where('reservation_date', date("m/d/Y"))->where('reservation_status', 1)->get();
		
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
		$query = $this->db->select('*')->from('clubhouse_reservation')->where('reservation_date', $searchquery)->where('reservation_status', 1)->get();
		
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
			'username' => $this->session->userdata('username'),
			'reservation_date' => $this->input->post('datepick'),
			'reservation_time' => $this->input->post('reservestart')
		);

		$insert = $this->db->insert('courtone_reservation', $reserve_data);
		return $insert;
	}

	function check_maxhour_courtone()
	{        
	    $query = $this->db->select('*')->from('courtone_reservation')->where('username', $this->session->userdata('username'))->where('reservation_status', 1)->where('reservation_date', $this->input->post('datepick'))->get();
	    $query1 = $this->db->select('*')->from('courtone_reservation')->where('username', $this->session->userdata('username'))->where('reservation_status', 2)->where('reservation_date', $this->input->post('datepick'))->get();

	    if($query->num_rows() >= 1 || $query1->num_rows() >= 1 )
	    {
	        return FALSE;  
	    }
	    else
	    {
	        return TRUE;
	    }
	}

	function create_reservation_courttwo()
	{
		$reserve_data = array(
			'username' => $this->session->userdata('username'),
			'reservation_date' => $this->input->post('datepick'),
			'reservation_time' => $this->input->post('reservestart')
		);

		$insert = $this->db->insert('courttwo_reservation', $reserve_data);
		return $insert;
	}

	function check_maxhour_courttwo()
	{        
	    $query = $this->db->select('*')->from('courttwo_reservation')->where('username', $this->session->userdata('username'))->where('reservation_status', 1)->where('reservation_date', $this->input->post('datepick'))->get();
	    $query1 = $this->db->select('*')->from('courttwo_reservation')->where('username', $this->session->userdata('username'))->where('reservation_status', 2)->where('reservation_date', $this->input->post('datepick'))->get();

	    if($query->num_rows() >= 1 || $query1->num_rows() >= 1 )
	    {
	        return FALSE;  
	    }
	    else
	    {
	        return TRUE;
	    }
	}

	function create_reservation_clubhouse()
	{
		$reserve_data = array(
			'username' => $this->session->userdata('username'),
			'reservation_date' => $this->input->post('datepick'),
			'reservation_time' => $this->input->post('reservestart')
		);

		$insert = $this->db->insert('clubhouse_reservation', $reserve_data);
		return $insert;
	}

	function check_maxhour_clubhouse()
	{        
	    $query = $this->db->select('*')->from('clubhouse_reservation')->where('username', $this->session->userdata('username'))->where('reservation_status', 1)->where('reservation_date', $this->input->post('datepick'))->get();
	    $query1 = $this->db->select('*')->from('clubhouse_reservation')->where('username', $this->session->userdata('username'))->where('reservation_status', 2)->where('reservation_date', $this->input->post('datepick'))->get();

	    if($query->num_rows() >= 1 || $query1->num_rows() >= 1 )
	    {
	        return FALSE;  
	    }
	    else
	    {
	        return TRUE;
	    }
	}

	function url_check_courtone($reservationid)
    {
        $query = $this->db->select('*')->where('reservation_id', $reservationid)->get('courtone_reservation',1);
        $result = $query->row();
        
        if($reservationid == $result->reservation_id)
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
        $query = $this->db->select('*')->where('reservation_id', $reservationid)->get('courttwo_reservation',1);
        $result = $query->row();
        
        if($reservationid == $result->reservation_id)
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
        $query = $this->db->select('*')->where('reservation_id', $reservationid)->get('clubhouse_reservation',1);
        $result = $query->row();
        
        if($reservationid == $result->reservation_id)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

	function cancelreservation_courtone($reservationid)
	{
		$this->db->where('reservation_id', $reservationid);
        $delete = $this->db->delete('courtone_reservation');
        return $delete;
	}

	function cancelreservation_courttwo($reservationid)
	{
		$this->db->where('reservation_id', $reservationid);
        $delete = $this->db->delete('courttwo_reservation');
        return $delete;
	}

	function cancelreservation_clubhouse($reservationid)
	{
		$this->db->where('reservation_id', $reservationid);
        $delete = $this->db->delete('clubhouse_reservation');
        return $delete;
	}

}
