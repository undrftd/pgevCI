<?php

class Model_ticketing_user extends CI_Model {

	function send_requestcomplaint()
    {
        $postrequest_data = array(
        	'userid' => $this->session->userdata('userid'),
            'request_type' => $this->input->post('type'),
            'content' => $this->input->post('content')
        );
         $insert = $this->db->insert('tickets', $postrequest_data);
         return $insert;
	}	

}
