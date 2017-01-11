<?php

class Admin_Dues extends MY_Controller{

	function homeowner()
    {
    	$config['base_url'] = site_url('admin_dues/homeowner');
        $config['total_rows'] = $this->model_dues->count_user();
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

        $data['rate'] = $this->model_dues->get_rate();
        $data['users'] = $this->model_dues->get_users($config['per_page'], $this->uri->segment(3));
    	$this->template->load('admin_template', 'view_admindues_user', $data);
    }

    function administrator()
    {
        $config['base_url'] = site_url('admin_dues/administrator');
        $config['total_rows'] = $this->model_dues->count_admin();
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

        $data['admin'] = $this->model_dues->get_admin($config['per_page'], $this->uri->segment(3));
        $this->template->load('admin_template', 'view_admindues_admin', $data);
    }

    function search_homeowner()
    {
         $searchquery = $this->input->get('search', TRUE);
         $searchmodelquery = $this->model_dues->search_homeowner($searchquery);

         if(isset($searchquery) and !empty($searchquery))
         {
            $config['base_url'] = site_url('admin_dues/search_homeowner/');
            $config['reuse_query_string'] = TRUE;
            $config['total_rows'] = $this->model_dues->countuser_search($searchquery);
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

            $data['rate'] = $this->model_dues->get_rate();
            $data['users'] = array_slice($searchmodelquery, $this->uri->segment(3),$config['per_page']);
            $this->template->load('admin_template', 'view_admindues_user', $data);
        }
        else
        {
           redirect('admin_dues/homeowner');
        }   
    }

    function billstart()
    {
        $this->model_dues->billstart_user();
        redirect('admin_dues/homeowner');         
    }

    function viewdues_user($userid)
    {
        if($this->model_dues->url_check_user($userid))
        {     
            $data['view'] = $this->model_dues->viewmore_user($userid);
            $this->template->load('admin_template', 'view_adminmoredues_user', $data);
        }
        else                                        
        {
            $this->session->set_flashdata('duesfail', 'There is no account associated with that User ID. Please double-check the User ID.');
            redirect('admin_dues/homeowner');   
        }
    }

    function cleardues_user($userid)
    {
        if($this->model_dues->url_check_user($userid))
        {  
            $this->model_dues->cleardues_user($userid);
            $this->session->set_flashdata('duesmorefeedback', 'You have successfully cleared the user\'s monthly dues.');
            
            $data['view'] = $this->model_dues->viewmore_user($userid);
            $this->template->load('admin_template', 'view_adminmoredues_user', $data);
        }
        else
        {
            $this->session->set_flashdata('duesfail', 'You cannnot clear a non-existent account\'s dues. Please double-check the User ID.');         
            redirect('admin_dues/homeowner');  
        }
    }

    function cleararrears_user($userid)
    {
        if($this->model_dues->url_check_user($userid))
        {     
            $this->model_dues->cleararrears_user($userid);
            $this->session->set_flashdata('duesmorefeedback', 'You have successfully cleared the user\'s arrears. ');
            
            $data['view'] = $this->model_dues->viewmore_user($userid);
            $this->template->load('admin_template', 'view_adminmoredues_user', $data);
        }
        else
        {
            $this->session->set_flashdata('duesfail', 'You cannnot clear a non-existent account\'s arrears. Please double-check the User ID.');         
            redirect('admin_dues/homeowner'); 
        }
    }

    function updatedues_user($userid)
    {
        if($this->model_dues->url_check_user($userid))
        { 
            $this->form_validation->set_error_delimiters('<div class="error">','</div>');

            $this->form_validation->set_rules('monthly_dues', 'Monthly Dues', 'trim|required|numeric');
            $this->form_validation->set_rules('arrears', 'Arrears', 'trim|required|numeric');

            if($this->form_validation->run() == FALSE)
            {
                $data['view'] = $this->model_accounts->viewmore_user($userid);
                $this->template->load('admin_template', 'view_adminmoredues_user', $data);
            }
            else if($query = $this->model_dues->updatedues_user($userid))
            {
                $this->session->set_flashdata('duesmorefeedback', 'You have successfully updated the user\'s dues.');
                $data['view'] = $this->model_accounts->viewmore_user($userid);
                $this->template->load('admin_template', 'view_adminmoredues_user', $data);
            }
        }
        else
        {
            $this->session->set_flashdata('duesfail', 'You cannot update a non-existent account. Please double-check the User ID.');         
            redirect('admin_dues/homeowner'); 
        }
    }

    function viewrates()
    {
        $data['rate'] = $this->model_dues->get_rate();
        $this->template->load('admin_template', 'view_admineditrate', $data);
    }

    function updaterates()
    {

            $this->form_validation->set_error_delimiters('<div class="error">','</div>');

            $this->form_validation->set_rules('securityfee', 'Security Fee', 'trim|required|numeric');
            $this->form_validation->set_rules('assocfee', 'Association Fee', 'trim|required|numeric');

            if ($this->form_validation->run() == FALSE)
            {
                $data['rate'] = $this->model_dues->get_rate();
                $this->template->load('admin_template', 'view_admineditrate', $data);
            }
            else
            {
                $this->model_dues->editrates();
                $data['rate'] = $this->model_dues->get_rate();
                $this->session->set_flashdata('ratefeedback', 'You have successfully updated the monthly dues rate.');
                $this->template->load('admin_template', 'view_admineditrate', $data);
            } 
    }

    function clearrecords_user()
    {
        $this->model_dues->clearrecords_user();
        redirect('admin_dues/homeowner');
    }
}