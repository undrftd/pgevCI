<?php

class Admin_Dues extends MY_Controller{

	function homeowner()
    {
    	$config['base_url'] = site_url('admin_dues/homeowner');
        $config['total_rows'] = $this->model_dues->count_user();
        $config['per_page'] =  5;
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

        $data['users'] = $this->model_dues->get_users($config['per_page'], $this->uri->segment(3));
    	$data['main_content'] ='view_admindues_user';
    	$this->load->view('includes/admin_dues_template', $data);
    }

    function administrator()
    {
        $config['base_url'] = site_url('admin_dues/administrator');
        $config['total_rows'] = $this->model_dues->count_admin();
        $config['per_page'] =  5;
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
        $data['main_content'] ='view_admindues_admin';
        $this->load->view('includes/admin_dues_template', $data); 
    }

    function billstart()
    {
        $this->model_dues->billstart_user();  
    }

    function cleardues($userid)
    {
        $data['main_content'] ='view_admindues_user';
        $this->load->view('includes/admin_dues_template', $data); 
    }
}