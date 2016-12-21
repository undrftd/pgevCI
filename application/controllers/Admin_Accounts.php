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
        $this->form_validation->set_error_delimiters('<div style="color: red" class="error">','</div>'); //for design improvement: SWAG
        $this->form_validation->set_message('is_unique', '{field} already exists!');

        $this->form_validation->set_rules('firstname', 'First Name', 'required|alpha');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required|alpha');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[accounts.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');//min_length[8]
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('email', 'E-mail Address', 'required|valid_email');
        $this->form_validation->set_rules('contactnum', 'Contact Number', 'required|min_length[7]');
        $this->form_validation->set_rules('role', 'Role', 'required');

        $this->load->model('model_accounts');

        if ($this->form_validation->run() == FALSE)
        {
            $data['main_content'] = 'view_adminaddaccounts';
            $this->load->view('includes/admin_addaccount_template', $data); 
        }
        else
        {
            if($query = $this->model_accounts->create_account()) 
             {
                redirect('admin_accounts');
             }
        }


    	/*$this->load->model('model_accounts');

    	if($query = $this->model_accounts->create_account()) 
    	{
			redirect('admin_accounts');
    	}*/
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
