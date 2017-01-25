<?php

class Model_tracking_user extends CI_Model {

	function get_recenttickets()
	{
		/*$this->db->select('*')->from('requests_complaints')->where('userid', $this->session->userdata('userid'))->order_by('ticketid',"desc")->limit(1,0);
		$query1 = $this->db->get_compiled_select();

		$this->db->select('*')->from('emergency_ticket')->where('userid', $this->session->userdata('userid'))->order_by('ticketid',"desc")->limit(1,0);
		$query2 = $this->db->get_compiled_select();

		$query = $this->db->query($query1 . ' UNION ' . $query2);*/

		$query = $this->db->select('*')->order_by('ticketid',"desc")->where('userid', $this->session->userdata('userid'))->get('tickets', 5);
		if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return $query->result();
        }
	}

	function get_history($limit, $offset)
	{
		$this->db->limit($limit,$offset);
		$query = $this->db->select('*')->from('tickets')->order_by("status desc,date_requested desc")->where('userid', $this->session->userdata('userid'))->get();
		
		if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return $query->result();
        }
	}

	function count_tickets()
    {
        $query = $this->db->select('*')->from('tickets')->where('userid', $this->session->userdata('userid'))->get();
        return $query->num_rows();
    }	

    function set_finished($ticketid)
    {
    	$set_finished_data = array(
    		'homeowner_feedback' => 0
    		);

    	$this->db->where('ticketid', $ticketid);
    	$update = $this->db->update('tickets', $set_finished_data);

    	return $update;
    } 

    function url_check_ticket($ticketid)
    {
    	$query = $this->db->select('*')->from('tickets')->where('ticketid', $ticketid)->get();
    	$result = $query->row();
    	
    	if($result->ticketid == $ticketid)
    	{
    		return TRUE;
    	}
    	else
    	{
    		return FALSE;
    	}
    }

}
