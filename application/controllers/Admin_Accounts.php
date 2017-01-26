<?php

class Admin_Accounts extends MY_Controller {

 	function homeowner()
    {
        $config['base_url'] = site_url('admin_accounts/homeowner');
        $config['total_rows'] = $this->model_accounts->count_homeowner();
        $config['per_page'] =  20;
        $config['num_links'] = 5;
        $config['use_page_numbers'] = FALSE;
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
        $this->template->load('admin_template', 'view_adminaccounts_user', $data);
    }

    function administrator()
    {
        $config_admin['base_url'] = site_url('admin_accounts/administrator');
        $config_admin['total_rows'] = $this->model_accounts->count_admin();
        $config_admin['per_page'] =  20;
        $config_deact['num_links'] = 5;
        $config_admin['use_page_numbers'] = FALSE;
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
        $this->template->load('admin_template', 'view_adminaccounts_admin', $data);
    }

    function deactivated()
    {
        $config_deact['base_url'] = site_url('admin_accounts/deactivated');
        $config_deact['total_rows'] = $this->model_accounts->count_deact();
        $config_deact['per_page'] =  20;
        $config_deact['num_links'] = 5;
        $config_deact['use_page_numbers'] = FALSE;
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
        $this->template->load('admin_template', 'view_adminaccounts_deact', $data);
    }

    function adduser()
    {
    	$this->template->load('admin_template', 'view_adminaddaccounts');
	}

    function alpha_dash_space($str)
    {
        return ( ! preg_match("/^([a-z ])+$/i", $str)) ? FALSE : TRUE;
    }

    function num_dash_par($str)
    {
        return ( ! preg_match("/^([-0-9()])+$/i", $str)) ? FALSE : TRUE;
    }

	function createuser()
    {
        $this->usertracking->track_this();
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_message('is_unique', '{field} already exists!');
        $this->form_validation->set_message('alpha_dash_space', '{field} may only contain alphabetical characters and spaces.');
        $this->form_validation->set_message('num_dash_par', '{field} may only contain numbers, dashes, and parentheses.');

        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|callback_alpha_dash_space');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[accounts.username]');
        $this->form_validation->set_rules('password', 'Password', 'required'); //min_length[8]
        $this->form_validation->set_rules('address', 'Address', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('email', 'E-mail Address', 'required|valid_email');
        $this->form_validation->set_rules('contactnum', 'Contact Number', 'required|callback_num_dash_par|min_length[7]');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->load('admin_template', 'view_adminaddaccounts');
        }
        else
        {
            if($query = $this->model_accounts->create_account())
             {
                $this->session->set_flashdata('accountsfeedback', 'You have successfully added an account.');
                redirect('admin_accounts/homeowner');
             }
        }
	}

    function search_homeowner()
    {
         $searchquery = $this->input->get('search', TRUE);
         $searchmodelquery = $this->model_accounts->search_homeowner($searchquery);

         if(isset($searchquery) and !empty($searchquery))
         {
            $config['base_url'] = site_url('admin_accounts/search_homeowner/');
            $config['reuse_query_string'] = TRUE;
            $config['total_rows'] = $this->model_accounts->countuser_search($searchquery);
            $config['per_page'] =  20;
            $config['num_links'] = 5;
            $config['use_page_numbers'] = FALSE;
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

            $data['users'] = array_slice($searchmodelquery, $this->uri->segment(3),$config['per_page']);
            $this->template->load('admin_template', 'view_adminaccounts_user', $data);
        }
        else
        {
           redirect('admin_accounts/homeowner');
        }

    }

    function search_admin()
    {
         $searchquery = $this->input->get('search', TRUE);
         $searchmodelquery = $this->model_accounts->search_admin($searchquery);

         if(isset($searchquery) and !empty($searchquery))
         {
            $config['base_url'] = site_url('admin_accounts/search_admin/');
            $config['reuse_query_string'] = TRUE;  
            $config['total_rows'] = $this->model_accounts->countadmin_search($searchquery);
            $config['per_page'] =  20;
            $config['num_links'] = 5;
            $config['use_page_numbers'] = FALSE;
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
            $data['adminlinks'] = $this->pagination->create_links();

            $data['admin'] = array_slice($searchmodelquery, $this->uri->segment(3),$config['per_page']);
            $this->template->load('admin_template', 'view_adminaccounts_admin', $data);
        }
        else
        {
           redirect('admin_accounts/homeowner');
        }
    }

    function search_deact()
    {
         $searchquery = $this->input->get('search');
         $searchmodelquery = $this->model_accounts->search_deact($searchquery);

         if(isset($searchquery) and !empty($searchquery))
         {
            $config['base_url'] = site_url('admin_accounts/search_deact/');
            $config['reuse_query_string'] = TRUE;    
            $config['total_rows'] = $this->model_accounts->countdeact_search($searchquery);
            $config['per_page'] =  20;
            $config['num_links'] = 5;
            $config['use_page_numbers'] = FALSE;
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
            $data['deactlinks'] = $this->pagination->create_links();

            $data['deact'] = array_slice($searchmodelquery, $this->uri->segment(3),$config['per_page']);
            $this->template->load('admin_template', 'view_adminaccounts_deact', $data);
         }
         else
         {
            redirect('admin_accounts/deactivated');
         }

    }

    function viewmore_user($userid)
    {
        if($this->model_accounts->url_check_user($userid))
        {
            $data['view'] = $this->model_accounts->viewmore_user($userid);
            $this->template->load('admin_template', 'view_adminviewmore_user', $data);
        }
        else
        {
            $this->session->set_flashdata('accountsfail', 'There is no account associated with that User ID. Please double-check the User ID.');
            redirect('admin_accounts/homeowner');
        }
    }

    function viewmore_admin($userid)
    {
        if($this->model_accounts->url_check_admin($userid))
        {
            if($userid != $this->session->userdata('userid'))
            {
                $data['view'] = $this->model_accounts->viewmore_admin($userid);
                $this->template->load('admin_template', 'view_adminviewmore_admin', $data);
            }
            else
            {
                redirect('admin_profile');
            }
        }
        else
        {
            $this->session->set_flashdata('accountsfail', 'There is no account associated with that User ID. Please double-check the User ID.');
            redirect('admin_accounts/administrator');
        }
    }

    function viewmore_deact($userid)
    {
        if($this->model_accounts->url_check_deact($userid))
        {
            $data['view'] = $this->model_accounts->viewmore_deact($userid);
            $this->template->load('admin_template', 'view_adminviewmore_deact', $data);
        }
        else
        {
            $this->session->set_flashdata('accountsfail', 'There is no account associated with that User ID. Please double-check the User ID.');
            redirect('admin_accounts/deactivated');
        }
    }

    function accdelete_user($userid)
    {
        $this->usertracking->track_this();
        if($this->model_accounts->url_check_user($userid))
        {
            $this->session->set_flashdata('accountsfeedback', 'You have successfully deleted the account.');
            $this->model_accounts->acc_delete($userid);
            redirect('admin_accounts/homeowner');
        }
        else
        {
            $this->session->set_flashdata('accountsfail', 'You cannot delete a non-existent account. Please double-check the User ID.');
            redirect('admin_accounts/homeowner');
        }
    }

    function accdelete_admin($userid)
    {
        $this->usertracking->track_this();
        if($this->model_accounts->url_check_admin($userid))
        {
            if($userid != $this->session->userdata('userid'))
            {
                $this->session->set_flashdata('accountsfeedback', 'You have successfully deleted the account.');
                $this->model_accounts->acc_delete($userid);
                redirect('admin_accounts/administrator');
            }
            else
            {
                $this->session->set_flashdata('accountsfail', 'You cannot delete your own account.');
                redirect('admin_accounts/administrator');
            }
        }
        else
        {
            $this->session->set_flashdata('accountsfail', 'You cannot delete a non-existent account. Please double-check the User ID.');
            redirect('admin_accounts/administrator');
        }
    }

    function accdelete_deact($userid)
    {
        $this->usertracking->track_this();
        if($this->model_accounts->url_check_deact($userid))
        {
            $this->session->set_flashdata('accountsfeedback', 'You have successfully deleted the account.');
            $this->model_accounts->acc_delete($userid);
            redirect('admin_accounts/deactivated');
        }
        else
        {
            $this->session->set_flashdata('accountsfail', 'You cannot delete a non-existent account. Please double-check the User ID.');
            redirect('admin_accounts/deactivated');
        }
    }

    function accupdate_user($userid)
    {
        $this->usertracking->track_this();
        if($this->model_accounts->url_check_user($userid))
        {
            $this->form_validation->set_error_delimiters('<div class="error">','</div>');
            $this->form_validation->set_message('is_unique', '{field} already exists!');
            $this->form_validation->set_message('alpha_dash_space', '{field} may only contain alphabetical characters and spaces.');

            $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|callback_alpha_dash_space');
            $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|callback_alpha_dash_space');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|edit_unique[accounts.username.'.$userid.']');
            $this->form_validation->set_rules('address', 'Address', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('email', 'E-mail Address', 'required|valid_email');
            $this->form_validation->set_rules('contactnum', 'Contact Number', 'required|callback_num_dash_par|min_length[7]');
            $this->form_validation->set_rules('role', 'Role', 'required');

            if ($this->form_validation->run() == FALSE)
            {
                $data['view'] = $this->model_accounts->viewmore_user($userid);
                $this->template->load('admin_template', 'view_adminviewmore_user', $data);
            }
            else
            {
                if($query = $this->model_accounts->acc_update($userid))
                 {
                    $this->session->set_flashdata('accountsfeedback', 'You have successfully updated the account.');
                    redirect('admin_accounts/homeowner');
                 }
            }
        }
        else
        {
            $this->session->set_flashdata('accountsfail', 'You cannot update a non-existent account. Please double-check the User ID.');
            redirect('admin_accounts/homeowner');
        }
    }

    function accupdate_admin($userid)
    {
        $this->usertracking->track_this();
        if($this->model_accounts->url_check_admin($userid))
        {
            if($userid != $this->session->userdata('userid'))
            {
                $this->form_validation->set_error_delimiters('<div class="error">','</div>');
                $this->form_validation->set_message('is_unique', '{field} already exists!');
                $this->form_validation->set_message('alpha_dash_space', '{field} may only contain alphabetical characters and spaces.');

                $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|callback_alpha_dash_space');
                $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|callback_alpha_dash_space');
                $this->form_validation->set_rules('username', 'Username', 'trim|required|edit_unique[accounts.username.'.$userid.']');
                $this->form_validation->set_rules('address', 'Address', 'required|alpha_numeric_spaces');
                $this->form_validation->set_rules('email', 'E-mail Address', 'required|valid_email');
                $this->form_validation->set_rules('contactnum', 'Contact Number', 'required|callback_num_dash_par|min_length[7]');
                $this->form_validation->set_rules('role', 'Role', 'required');

                if ($this->form_validation->run() == FALSE)
                {
                    $data['view'] = $this->model_accounts->viewmore_admin($userid);
                    $this->template->load('admin_template', 'view_adminviewmore_admin', $data);
                }
                else
                {
                    if($query = $this->model_accounts->acc_update($userid))
                     {
                        $this->session->set_flashdata('accountsfeedback', 'You have successfully updated the account.');
                        redirect('admin_accounts/administrator');
                     }
                }
            }
            else
            {
                redirect('admin_profile');
            }
        }
        else
        {
            $this->session->set_flashdata('accountsfail', 'You cannot update a non-existent account. Please double-check the User ID.');
            redirect('admin_accounts/administrator');
        }
    }
    function accupdate_deact($userid)
    {
        $this->usertracking->track_this();
        if($this->model_accounts->url_check_deact($userid))
        {
            $this->form_validation->set_error_delimiters('<div class="error">','</div>');
            $this->form_validation->set_message('is_unique', '{field} already exists!');
            $this->form_validation->set_message('alpha_dash_space', '{field} may only contain alphabetical characters and spaces.');

            $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|callback_alpha_dash_space');
            $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|callback_alpha_dash_space');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|edit_unique[accounts.username.'.$userid.']');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('email', 'E-mail Address', 'required|valid_email');
            $this->form_validation->set_rules('contactnum', 'Contact Number', 'required|callback_num_dash_par|min_length[7]');
            $this->form_validation->set_rules('role', 'Role', 'required');

            if ($this->form_validation->run() == FALSE)
            {
                $data['view'] = $this->model_accounts->viewmore_deact($userid);
                $this->template->load('admin_template', 'view_adminviewmore_deact', $data);
            }
            else
            {
                if($query = $this->model_accounts->acc_update($userid))
                 {
                    $this->session->set_flashdata('accountsfeedback', 'You have successfully updated the account.');
                    redirect('admin_accounts/deactivated');
                 }
            }
        }
        else
        {
            $this->session->set_flashdata('accountsfail', 'You cannot update a non-existent account. Please double-check the User ID.');
            redirect('admin_accounts/deactivated');
        }
    }

	function accdeact_user($userid)
    {
        $this->usertracking->track_this();
        if($this->model_accounts->url_check_user($userid))
        {
            $this->model_accounts->acc_deact($userid);
            $this->session->set_flashdata('accountsfeedback', 'You have successfully deactivated the account.');
            redirect('admin_accounts/homeowner');
        }
        else
        {
            $this->session->set_flashdata('accountsfail', 'You cannot deactivate a non-existent or an already deactivated account. Please double-check the User ID.');
            redirect('admin_accounts/homeowner');
        }
    }

    function accdeact_admin($userid)
    {
        $this->usertracking->track_this();
        if($this->model_accounts->url_check_admin($userid))
        {
            if($userid != $this->session->userdata('userid'))
            {
                $this->model_accounts->acc_deact($userid);
                $this->session->set_flashdata('accountsfeedback', 'You have successfully deactivated the account.');
                redirect('admin_accounts/administrator');
            }
            else
            {
                $this->session->set_flashdata('accountsfail', 'You cannot deactivate your own account.');
                redirect('admin_accounts/administrator');
            }
        }
        else
        {
            $this->session->set_flashdata('accountsfail', 'You cannot deactivate a non-existent or an already deactivated account. Please double-check the User ID.');
            redirect('admin_accounts/administrator');
        }
    }

    function acc_reactivate($userid)
    {
        $this->usertracking->track_this();
        if($this->model_accounts->url_check_deact($userid))
        {
            $this->session->set_flashdata('accountsfeedback', 'You have successfully reactivated the account.');
            $this->model_accounts->acc_reactivate($userid);
            redirect('admin_accounts/deactivated');
        }
        else
        {
            $this->session->set_flashdata('accountsfail', 'You cannot reactivate a non-existent or active account. Please double-check the User ID.');
            redirect('admin_accounts/deactivated');
        }
    }
}
