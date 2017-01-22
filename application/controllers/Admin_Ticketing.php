<?php

class Admin_Ticketing extends MY_Controller {

	function index()
    {
    	$this->session->set_userdata('referred_from', current_url());
    	$data['result'] = $this->model_ticketing->get_newtickets();
    	$this->template->load('admin_template', 'view_adminticketing', $data);
    }
}