<?php

class Admin_Ticketing extends MY_Controller {

	function index()
    {
    	$data['main_content'] = 'view_adminticketing';
		$this->load->view('includes/admin_ticket_template', $data);
    }
}