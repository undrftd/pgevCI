<?php

class Admin extends CI_Controller {

    function __construct()
    {
        
        parent::__construct();
        $this->is_logged_in();
        $this->load->model('model_accounts');
    }

    function is_logged_in() 
    {
        $is_logged_in = $this->session->userdata('is_logged_in');
        
        if(!isset($is_logged_in) || $is_logged_in != true) {
            echo 'You have no permission to access this page.' ;
            die();
        }
    }

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