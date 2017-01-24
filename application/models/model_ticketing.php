<?php

class Model_ticketing extends CI_Model {

	function get_newtickets($limit, $offset)
	{
		$this->db->limit($limit, $offset);
		$query = $this->db->select('*')->from('accounts')->join('tickets', 'accounts.userid = tickets.userid' )->order_by("(request_type='EFR' || request_type='ERB' || request_type='EBT' || request_type='ESP' ) desc, date_requested asc")->where('status', 2)->get();

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return $query->result();
		}
	}

	function count_newtickets()
	{
		$query = $this->db->select('*')->from('accounts')->join('tickets', 'accounts.userid = tickets.userid' )->where('status', 2)->get();
		return $query->num_rows();
	}

	function get_progresstickets($limit, $offset)
	{
		$this->db->limit($limit, $offset);
		$query = $this->db->select('*')->from('accounts')->join('tickets', 'accounts.userid = tickets.userid' )->order_by("(request_type='EFR' || request_type='ERB' || request_type='EBT' || request_type='ESP' ) desc, date_requested asc")->where('status', 1)->get();

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return $query->result();
		}
	}

	function count_progresstickets()
	{
		$query = $this->db->select('*')->from('accounts')->join('tickets', 'accounts.userid = tickets.userid' )->where('status', 1)->get();
		return $query->num_rows();
	}

	function get_closedtickets($limit, $offset)
	{
		$this->db->limit($limit, $offset);
		$query = $this->db->select('*')->from('accounts')->join('tickets', 'accounts.userid = tickets.userid' )->order_by("(request_type='EFR' || request_type='ERB' || request_type='EBT' || request_type='ESP' ) desc, date_closed desc")->where('status', 0)->get();

		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return $query->result();
		}
	}

	function count_closedtickets()
	{
		$query = $this->db->select('*')->from('accounts')->join('tickets', 'accounts.userid = tickets.userid' )->where('status', 0)->get();
		return $query->num_rows();
	}

	function get_newticketdetails($ticketid)
    {
         $query= $this->db->select('*')->from('accounts')->join('tickets', 'accounts.userid = tickets.userid' )->where('ticketid', $ticketid)->get();
         return $query->row();
    }

    function url_check_tickets($ticketid)
    {
    	$query = $this->db->select('*')->where('ticketid', $ticketid)->get('tickets', 1);
    	$result = $query->row();

    	if($ticketid == $result->ticketid)
    	{
    		return TRUE;
    	}
    	else
    	{
    		return FALSE;
    	}
    }

    function set_timeopened($ticketid)
    {
    	$set_time_data = array(
            'date_opened' => time()
        );

    	$this->db->where('ticketid', $ticketid);
    	$update = $this->db->update('tickets', $set_time_data);
    	return $update;

    }

    function save_ticket($ticketid)
    {
    	$save_ticket_data = array(
    		'status' => $this->input->post('status')
    	);

    	$this->db->where('ticketid', $ticketid);
    	$update = $this->db->update('tickets', $save_ticket_data);
    	return $update;
    }

	

}
