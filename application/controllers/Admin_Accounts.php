<?php

class Admin_Accounts extends MY_Controller {

 	function index()
    {
    	$this->load->model('model_accounts');
    	//$data['users'] = $this->model_accounts->get_users();
    	//$data['admin'] = $this->model_accounts->get_admin();
    	//$data['deact'] = $this->model_accounts->get_deact();
       // $data['accounts'] = $query->result();

        $query2 = $this->db->get('accounts');
        $config['base_url'] = site_url('admin_accounts/index');
        $config['total_rows'] = $query2->num_rows();
        $config['per_page'] =  20;
        
        $this->pagination->initialize($config);  
        
        $data['users'] = $this->model_accounts->get_users($config['per_page'], $this->uri->segment(3));
        $data['admin'] = $this->model_accounts->get_admin($config['per_page'], $this->uri->segment(3));
        $data['deact'] = $this->model_accounts->get_deact($config['per_page'], $this->uri->segment(3));
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

    	if($query = $this->model_accounts->create_account()) 
    	{
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
