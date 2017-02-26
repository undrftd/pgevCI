<?php

class Model_ticketing extends CI_Model {

	function get_newtickets($limit, $offset)
	{
		$this->db->limit($limit, $offset);
		$query = $this->db->select('*')->from('accounts')->join('tickets', 'accounts.username = tickets.username' )->order_by("(request_type='EFR' || request_type='ERB' || request_type='EBT' || request_type='ESP' ) desc, date_requested asc")->where('status', 2)->get();

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
		$query = $this->db->select('*')->from('accounts')->join('tickets', 'accounts.username = tickets.username' )->where('status', 2)->get();
		return $query->num_rows();
	}

	function get_progresstickets($limit, $offset)
	{
		$this->db->limit($limit, $offset);
		$query = $this->db->select('*')->from('accounts')->join('tickets', 'accounts.username = tickets.username' )->order_by("(request_type='EFR' || request_type='ERB' || request_type='EBT' || request_type='ESP' ) desc, date_requested asc")->where('status', 1)->get();

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
		$query = $this->db->select('*')->from('accounts')->join('tickets', 'accounts.username = tickets.username' )->where('status', 1)->get();
		return $query->num_rows();
	}

	function get_closedtickets($limit, $offset)
	{
		$this->db->limit($limit, $offset);
		$query = $this->db->select('*')->from('accounts')->join('tickets', 'accounts.username = tickets.username' )->order_by("date_closed desc")->where('status', 0)->get();

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
		$query = $this->db->select('*')->from('accounts')->join('tickets', 'accounts.username = tickets.username' )->where('status', 0)->get();
		return $query->num_rows();
	}

  function countclosed_search($searchquery)
  {
    $query = $this->db->select('*')->from('tickets')->join('accounts', 'accounts.username = tickets.username')->where('status', 0)->where('(CONCAT(firstname," ",lastname) LIKE "%'.$searchquery .'%" OR firstname LIKE "%'.$searchquery .'%" OR lastname LIKE "%'.$searchquery .'%" OR accounts.username LIKE "%'.$searchquery .'%" OR request_type LIKE "%'.$searchquery .'%" OR ticketid LIKE "%'.$searchquery .'%" )',NULL,FALSE)->get(); 
    return $query->num_rows();
  }

  function search_closedtickets($searchquery)
  {
    $this->db->select('*')->from('tickets')->join('accounts', 'accounts.username = tickets.username');
    $this->db->where('status', 0);
    $this->db->where('(CONCAT(firstname," ",lastname) LIKE "%'.$searchquery .'%" OR firstname LIKE "%'.$searchquery .'%" OR lastname LIKE "%'.$searchquery .'%" OR accounts.username LIKE "%'.$searchquery .'%" OR CONCAT(request_type,"-",ticketid) LIKE "%'.$searchquery .'%" )',NULL,FALSE);
    $query = $this->db->get();

      if($query->num_rows() > 0)
      {
          return $query->result();
      }
      else
      {
          return $query->result();
      }
  }

	function get_ticketdetails($ticketid)
    {
         $query= $this->db->select('*')->from('accounts')->join('tickets', 'accounts.username = tickets.username' )->where('ticketid', $ticketid)->get();
         return $query->row();
    }

    function url_check_tickets($ticketid)
    {
    	$query = $this->db->select('*')->where('ticketid', $ticketid)->get('tickets', 1);
    	$result = $query->row();

      if($query->num_rows() > 0)
      {
        if($ticketid == $result->ticketid)
        {
          return TRUE;
        }
        else
        {
          return FALSE;
        }
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

   	function is_opened($ticketid)
   	{
   	 	$query = $this->db->select('*')->where('ticketid', $ticketid)->get('tickets',1);
      $result = $query->row();

      if($query->num_rows() > 0)
      {
        if($result->date_opened)
        {
        	return TRUE;
        }
        else
        {
        	return FALSE;
        }
      }
      else
      {
        return FALSE;
      }
   	}

   	function is_closed($ticketid)
   	{
   	 	$query = $this->db->select('*')->where('ticketid', $ticketid)->get('tickets',1);
        $result = $query->row();

        if($query->num_rows() > 0)
        {
          if($result->date_closed)
          {
          	return TRUE;
          }
          else
          {
          	return FALSE;
          }
        }
        else
        {
          return FALSE;
        }
   	}

   	function is_newticket($ticketid)
   	{
   		$query = $this->db->select('*')->where('ticketid', $ticketid)->get('tickets',1);
      $result = $query->row();

        if($query->num_rows() > 0)
        {
          if($result->status == 2)
          {
          	return TRUE;
          }
          else
          {
          	return FALSE;
          }
        }
        else
        {
          return FALSE;
        }
   	}

   	function is_progressticket($ticketid)
   	{
   		$query = $this->db->select('*')->where('ticketid', $ticketid)->get('tickets',1);
        $result = $query->row();

        if($query->num_rows() > 0)
        {
          if($result->status == 1)
          {
          	return TRUE;
          }
          else
          {
          	return FALSE;
          }
        }
        else
        {
          return FALSE;
        }
   	}

   	function is_closedticket($ticketid)
   	{
   		$query = $this->db->select('*')->where('ticketid', $ticketid)->get('tickets',1);
        $result = $query->row();

        if($query->num_rows() > 0)
        {
          if($result->status == 0)
          {
          	return TRUE;
          }
          else
          {
          	return FALSE;
          }
        }
        else
        {
          return FALSE;
        }
   	}


   	function is_attachment($ticketid)
   	{
   		$query = $this->db->select('*')->where('ticketid', $ticketid)->get('tickets',1);
        $result = $query->row();

        if($query->num_rows() > 0)
        {
          if($result->attachment != NULL || $result->attachment != "")
          {
          	return TRUE;
          }
          else
          {
          	return FALSE;
          }
        }
        else
        {
          return FALSE;
        }
   	}

   	function get_attachmentname($ticketid)
   	{
   		$query = $this->db->select('*')->where('ticketid', $ticketid)->get('tickets',1);
        $result = $query->row();

        return $result->attachment;
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

    function save_closedticket($ticketid)
    {
    	$save_ticket_data = array(
    		'status' => $this->input->post('status'),
        'closed_remarks' =>$this->input->post('admin-remarks'),
    		'date_closed' => time()
    	);

    	$this->db->where('ticketid', $ticketid);
    	$update = $this->db->update('tickets', $save_ticket_data);
    	return $update;
    }

}
