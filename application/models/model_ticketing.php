<?php

class Model_ticketing extends CI_Model {

	function get_newtickets()
	{
		$query = $this->db->select('*')->from('accounts')->join('tickets', 'accounts.userid = tickets.userid' )->where('status', 2)->get();

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
