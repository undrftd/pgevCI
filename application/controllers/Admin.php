<?php

class Admin extends CI_Controller {

	function ticketing()
    {
    	$data['main_content'] = 'view_adminticketing';
		$this->load->view('includes/adticket_template', $data);
    }

    function accounts()
    {
    	$this->load->model('model_accounts');
    	$data['query'] = $this->model_accounts->display_acc();
    	$data['main_content'] = 'view_adminaccounts';
		$this->load->view('includes/adaccounts_template', $data);
    }
}