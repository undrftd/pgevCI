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

    function accdeact()
    {
    	$data['main_content'] = 'view_accountdeact';
		$this->load->view('includes/accdeact_template', $data);
    }
}