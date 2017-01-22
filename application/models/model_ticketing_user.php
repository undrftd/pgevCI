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

	function get_ticketid()
	{
		$query = $this->db->select('*')->order_by('ticketid',"desc")->where('userid', $this->session->userdata('userid'))->get('requests_complaints', 1);
		return $query->row();
	}

}
