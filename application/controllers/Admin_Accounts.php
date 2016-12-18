<?php

class Admin_Accounts extends MY_Controller {

 	function index()
    {
    	$this->load->model('model_accounts');
    	$data['users'] = $this->model_accounts->get_users();
    	$data['admin'] = $this->model_accounts->get_admin();
    	$data['deact'] = $this->model_accounts->get_deact();
    	$data['main_content'] = 'view_adminaccounts';
		$this->load->view('includes/admin_accounts_template', $data);
    }

    function adduser()
    {
    	$data['main_content'] = 'view_adminaddaccounts';
		$this->load->view('includes/admin_addaccount_template', $data);	
    	$this->load->model('model_accounts');	
	}	

	function createuser()
    {
    	$this->load->model('model_accounts');

    	if($query = $this->model_accounts->create_account()) {
				
				redirect('admin_accounts');
    }
}
    
 
	
	/*function acc_deactivate()
    {
    	if(isset($_GET['userid']))
    	{
        	$id=$_GET['userid'];
        	$this->load->model('model_accounts');
        	$this->model_accounts->deactivate($id);
       		redirect('admin_accounts');
    	}
	}*/
}	
