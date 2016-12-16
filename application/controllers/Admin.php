<?php

class Admin extends CI_Controller {

	function ticketing()
    {
    	$data['main_content'] = 'view_adminticketing';
		$this->load->view('includes/adticket_template', $data);
    }
}