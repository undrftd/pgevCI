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

	function get_newticketdetails($ticketid)
    {
         $query= $this->db->select('*')->from('accounts')->join('tickets', 'accounts.userid = tickets.userid' )->where('ticketid', $ticketid)->get();
         return $query->row();
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

	

}
