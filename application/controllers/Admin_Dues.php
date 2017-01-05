<?php

class Admin_Dues extends MY_Controller{

	function index()
    {
    	$config['base_url'] = site_url('admin_dues/index');
        $config['total_rows'] = $this->model_dues->count_accounts();
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
        $data['accountlinks'] = $this->pagination->create_links();

        $data['accounts'] = $this->model_dues->get_accounts($config['per_page'], $this->uri->segment(3));
    	$data['main_content'] ='view_admindues';
    	$this->load->view('includes/admin_dues_template', $data);
    }
}