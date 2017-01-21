<?php

class Model_ticketing_user extends CI_Model {

	function send_requestcomplaint()
    {
        $postrequest_data = array(
        	'userid' => $this->session->userdata('userid'),
            'request_type' => $this->input->post('type'),
            'attachment' => $this->upload->file_name,
            'content' => $this->input->post('content')
        );
         $insert = $this->db->insert('tickets', $postrequest_data);
         return $insert;
	}	

	function get_ticketid()
	{
		$query = $this->db->select('*')->order_by('ticketid',"desc")->where('userid', $this->session->userdata('userid'))->get('tickets', 1);
		return $query->row();
	}

}
