<?php

class Model_tracking_user extends CI_Model {

	function get_tickets()
	{
		/*$this->db->select('*')->from('requests_complaints')->where('userid', $this->session->userdata('userid'))->order_by('ticketid',"desc")->limit(1,0);
		$query1 = $this->db->get_compiled_select();

		$this->db->select('*')->from('emergency_ticket')->where('userid', $this->session->userdata('userid'))->order_by('ticketid',"desc")->limit(1,0);
		$query2 = $this->db->get_compiled_select();

		$query = $this->db->query($query1 . ' UNION ' . $query2);*/


		$query = $this->db->select('*')->order_by('ticketid',"desc")->where('userid', $this->session->userdata('userid'))->get('requests_complaints', 5);
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
