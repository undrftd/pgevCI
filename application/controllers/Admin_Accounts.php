<?php

class Admin_Accounts extends MY_Controller {

 	function homeowner()
    {
    	$this->load->model('model_accounts');
        
        $query = $this->db->select('*')->from('accounts')-> where('role', 0)-> where('isActive', 1)->get();
        $config['base_url'] = site_url('admin_accounts/homeowner');
        $config['total_rows'] = $query->num_rows();
        $config['per_page'] =  50;
        $config_deact['num_links'] = 5;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);  
        $data['homeownerlinks'] = $this->pagination->create_links(); 

        $data['users'] = $this->model_accounts->get_users($config['per_page'], $this->uri->segment(3));
        $data['main_content'] = 'view_adminaccounts';
        $this->load->view('includes/admin_accounts_template', $data);
    }
    
    function administrator()
    {
        $this->load->model('model_accounts');
        $query_admin = $this->db->select('*')->from('accounts')-> where('role', 1)-> where('isActive', 1)->get();
        $config_admin['base_url'] = site_url('admin_accounts/administrator');
        $config_admin['total_rows'] = $query_admin->num_rows();
        $config_admin['per_page'] =  50;
        $config_deact['num_links'] = 5;
        $config_admin['use_page_numbers'] = TRUE;
        $config_admin['full_tag_open'] = "<ul class='pagination'>";
        $config_admin['full_tag_close'] ="</ul>";
        $config_admin['num_tag_open'] = '<li>';
        $config_admin['num_tag_close'] = '</li>';
        $config_admin['cur_tag_open'] = "<li class='disabled'><li class='active'><a>";
        $config_admin['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config_admin['next_tag_open'] = "<li>";
        $config_admin['next_tagl_close'] = "</li>";
        $config_admin['prev_tag_open'] = "<li>";
        $config_admin['prev_tagl_close'] = "</li>";
        $config_admin['first_tag_open'] = "<li>";
        $config_admin['first_tagl_close'] = "</li>";
        $config_admin['last_tag_open'] = "<li>";
        $config_admin['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config_admin);
        $data['adminlinks'] = $this->pagination->create_links(); 

        $data['admin'] = $this->model_accounts->get_admin($config_admin['per_page'], $this->uri->segment(3));
        $data['main_content'] = 'view_adminaccounts_admin';
        $this->load->view('includes/admin_accounts_template', $data);
    }

    function deactivated()
    {
        $query_deact = $this->db->select('*')->from('accounts')-> where('isActive', 0)->get();
        $config_deact['base_url'] = site_url('admin_accounts/deactivated');
        $config_deact['total_rows'] = $query_deact->num_rows();
        $config_deact['per_page'] =  50;
        $config_deact['num_links'] = 5;
        $config_deact['use_page_numbers'] = TRUE;
        $config_deact['full_tag_open'] = "<ul class='pagination'>";
        $config_deact['full_tag_close'] ="</ul>";
        $config_deact['num_tag_open'] = '<li>';
        $config_deact['num_tag_close'] = '</li>';
        $config_deact['cur_tag_open'] = "<li class='disabled'><li class='active'><a>";
        $config_deact['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config_deact['next_tag_open'] = "<li>";
        $config_deact['next_tagl_close'] = "</li>";
        $config_deact['prev_tag_open'] = "<li>";
        $config_deact['prev_tagl_close'] = "</li>";
        $config_deact['first_tag_open'] = "<li>";
        $config_deact['first_tagl_close'] = "</li>";
        $config_deact['last_tag_open'] = "<li>";
        $config_deact['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config_deact);  
        $data['deactlinks'] = $this->pagination->create_links();

        $data['deact'] = $this->model_accounts->get_deact($config_deact['per_page'], $this->uri->segment(3));
        $data['main_content'] = 'view_adminaccounts_deact';
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
        $this->form_validation->set_error_delimiters('<div class="error">','</div>'); 
        $this->form_validation->set_message('is_unique', '{field} already exists!');

        $this->form_validation->set_rules('firstname', 'First Name', 'required|alpha');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required|alpha');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[accounts.username]');
        $this->form_validation->set_rules('password', 'Password', 'required'); //min_length[8]
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
	}

    function search_homeowner()
    {
         $this->load->model('model_accounts');
         $firstname = $this->input->post('search');

         if(isset($firstname) and !empty($firstname))
         {
            $data['users'] = $this->model_accounts->search_homeowner($firstname);
            $data['main_content'] = 'view_adminaccounts';
            $data['homeownerlinks']='';
            $this->load->view('includes/admin_accounts_template', $data);
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
