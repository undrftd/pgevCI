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
		$last_row= $this->db->select('*')->order_by('ticketid',"desc")->limit(1)->get('tickets')->row();
		$query = $this->db->select('*')->order_by('ticketid',"desc")->where('userid', $this->session->userdata('userid'))->limit(1)->get('tickets');
		return $query->row();
	}

}
