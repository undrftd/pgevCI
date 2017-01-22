<?php

class Model_ticketing_user extends CI_Model {

	function send_requestcomplaint()
    {
        $postrequest_data = array(
        	'userid' => $this->session->userdata('userid'),
            'request_type' => $this->input->post('type'),
            'attachment' => $this->upload->file_name,
            'content' => $this->input->post('content'),
            'date' => time()
        );
        //$this->db->set('date', 'NOW()', FALSE);
        $insert = $this->db->insert('requests_complaints', $postrequest_data);
        return $insert;
	}	

	function get_requestid()
	{
		$query = $this->db->select('*')->order_by('ticketid',"desc")->where('userid', $this->session->userdata('userid'))->get('requests_complaints', 1);
		return $query->row();
	}

    function send_emergency()
    {
        $postrequest_data = array(
            'userid' => $this->session->userdata('userid'),
            'request_type' => $this->input->post('type'),
            'attachment' => $this->upload->file_name,
            'content' => $this->input->post('content'),
            'date' => time()
        );
        //$this->db->set('date', 'NOW()', FALSE);
        $insert = $this->db->insert('emergency_ticket', $postrequest_data);
        return $insert;
    }   

    function get_emergencyid()
    {
        $query = $this->db->select('*')->order_by('ticketid',"desc")->where('userid', $this->session->userdata('userid'))->get('emergency_ticket', 1);
        return $query->row();
    }

}
