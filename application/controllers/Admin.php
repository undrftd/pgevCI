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
    	$data['users'] = $this->model_accounts->display_users();
    	$data['admin'] = $this->model_accounts->display_admin();
    	$data['deact'] = $this->model_accounts->display_deact();
    	$data['main_content'] = 'view_adminaccounts';
		$this->load->view('includes/adaccounts_template', $data);
    }

    function accdeact()
    {
    	$data['main_content'] = 'view_accountdeact';
		$this->load->view('includes/accdeact_template', $data);
    }
}