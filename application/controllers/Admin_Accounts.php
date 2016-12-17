<?php

class Admin_Accounts extends MY_Controller {

 	function index()
    {
    	$this->load->model('model_accounts');
    	$data['users'] = $this->model_accounts->display_users();
    	$data['admin'] = $this->model_accounts->display_admin();
    	$data['deact'] = $this->model_accounts->display_deact();
    	$data['main_content'] = 'view_adminaccounts';
		$this->load->view('includes/adaccounts_template', $data);
    }
}
