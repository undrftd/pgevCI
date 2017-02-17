<?php

class Model_ticketing_user extends CI_Model {

	function send_ticket()
    {
        $postrequest_data = array(
        	'username' => $this->session->userdata('username'),
            'request_type' => $this->input->post('type'),
            'attachment' => $this->upload->file_name,
            'content' => $this->input->post('content'),
            'date_requested' => time()
        );
        //$this->db->set('date', 'NOW()', FALSE);
        $insert = $this->db->insert('tickets', $postrequest_data);
        return $insert;
	}	

    function send_cctv()
    {
        $postrequest_data = array(
            'username' => $this->session->userdata('username'),
            'request_type' => 'CTV',
            'attachment' => $this->upload->file_name,
            'content' => $this->input->post('content'),
            'date_requested' => time(),
            'date_cctv' => $this->input->post('datepick')
        );
        //$this->db->set('date', 'NOW()', FALSE);
        $insert = $this->db->insert('tickets', $postrequest_data);
        return $insert;
    }   

	function get_ticketid()
	{
		$query = $this->db->select('*')->order_by('ticketid',"desc")->where('username', $this->session->userdata('username'))->get('tickets', 1);
		return $query->row();
	}

    /*function send_emergency()
    {
        $postrequest_data = array(
            'username' => $this->session->userdata('username'),
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
        $query = $this->db->select('*')->order_by('ticketid',"desc")->where('username', $this->session->userdata('username'))->get('emergency_ticket', 1);
        return $query->row();
    }*/

}
