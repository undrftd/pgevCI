<?php

class Admin_Forms extends MY_Controller {

    function car_sticker()
	{
		$config['base_url'] = site_url('admin_forms/car_sticker');
        $config['total_rows'] = $this->model_forms->count_carsticker();
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
        $data['carstickerlinks'] = $this->pagination->create_links();

		$data['carsticker'] = $this->model_forms->get_carsticker($config['per_page'], $this->uri->segment(3));
		$data['count'] = $this->model_forms->count_carsticker();
		$this->template->load('admin_template', 'view_adminforms_carsticker', $data);
	}

	function work_permit()
	{
		$config['base_url'] = site_url('admin_forms/work_permit');
        $config['total_rows'] = $this->model_forms->count_workpermit();
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
        $data['workpermitlinks'] = $this->pagination->create_links();

		$data['workpermit'] = $this->model_forms->get_workpermit($config['per_page'], $this->uri->segment(3));
		$data['count'] = $this->model_forms->count_workpermit();
		$this->template->load('admin_template', 'view_adminforms_workpermit', $data);
	}

	function renovation()
	{
		$config['base_url'] = site_url('admin_forms/renovation');
        $config['total_rows'] = $this->model_forms->count_renovation();
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
        $data['renovationlinks'] = $this->pagination->create_links();

		$data['renovation'] = $this->model_forms->get_renovation($config['per_page'], $this->uri->segment(3));
		$data['count'] = $this->model_forms->count_renovation();
		$this->template->load('admin_template', 'view_adminforms_renovation', $data);
	}

    function search_carsticker()
    {
        $searchquery = $this->input->get('search', TRUE);
        $searchmodelquery = $this->model_forms->search_carsticker($searchquery);

        if(isset($searchquery) and !empty($searchquery))
        {
            $config['base_url'] = site_url('admin_forms/search_carsticker/');
            $config['reuse_query_string'] = TRUE;
            $config['total_rows'] = $this->model_forms->countsticker_search($searchquery);
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
            $data['carstickerlinks'] = $this->pagination->create_links();

            $data['count'] = $this->model_forms->count_carsticker();
            $data['carsticker'] = array_slice($searchmodelquery, $this->uri->segment(3),$config['per_page']);
            $this->template->load('admin_template', 'view_adminforms_carsticker', $data);
        }
        else
        {
            redirect('admin_forms/car_sticker');
        }
    }

    function search_workpermit()
    {
        $searchquery = $this->input->get('search', TRUE);
        $searchmodelquery = $this->model_forms->search_workpermit($searchquery);

        if(isset($searchquery) and !empty($searchquery))
        {
            $config['base_url'] = site_url('admin_forms/search_workpermit/');
            $config['reuse_query_string'] = TRUE;
            $config['total_rows'] = $this->model_forms->countpermit_search($searchquery);
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
            $data['workpermitlinks'] = $this->pagination->create_links();

            $data['count'] = $this->model_forms->count_carsticker();
            $data['workpermit'] = array_slice($searchmodelquery, $this->uri->segment(3),$config['per_page']);
            $this->template->load('admin_template', 'view_adminforms_workpermit', $data);
        }
        else
        {
            redirect('admin_forms/work_permit');
        }
    }

    function search_renovation()
    {
        $searchquery = $this->input->get('search', TRUE);
        $searchmodelquery = $this->model_forms->search_renovation($searchquery);

        if(isset($searchquery) and !empty($searchquery))
        {
            $config['base_url'] = site_url('admin_forms/search_carsticker/');
            $config['reuse_query_string'] = TRUE;
            $config['total_rows'] = $this->model_forms->countrenovation_search($searchquery);
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
            $data['renovationlinks'] = $this->pagination->create_links();

            $data['count'] = $this->model_forms->count_renovation();
            $data['renovation'] = array_slice($searchmodelquery, $this->uri->segment(3),$config['per_page']);
            $this->template->load('admin_template', 'view_adminforms_renovation', $data);
        }
        else
        {
           redirect('admin_forms/car_sticker');
        }
    }


	function download_carsticker($formid) 
	{
        if($this->model_forms->url_check_carsticker($formid))
        {
            $this->model_forms->set_cardownloadstatus($formid);
            $query = $this->db->select('*')->where('formid', $formid)->get('upload_carsticker',1);
            $result = $query->row();

            $path = 'C:/xampp/htdocs/pgevCI/application/uploads/' . $result->filename;
            $data = file_get_contents($path);
            $name = $result->filename;
        
            force_download($name, $data);
        }
        else
        {
            $this->session->set_flashdata('carstickerfail', 'You cannot download a non-existent car sticker form request.');
            redirect('admin_forms/car_sticker');
        }
	}   

	function download_workpermit($formid) 
	{
        if($this->model_forms->url_check_workpermit($formid))
        {
            $this->model_forms->set_workdownloadstatus($formid);
            $query = $this->db->select('*')->where('formid', $formid)->get('upload_workpermit',1);
            $result = $query->row();

            $path = 'C:/xampp/htdocs/pgevCI/application/uploads/' . $result->filename;
            $data = file_get_contents($path);
	       	$name = $result->filename;

            force_download($name, $data);
        }
        else
        {
            $this->session->set_flashdata('workpermitfail', 'You cannot download a non-existent work permit form request.');
            redirect('admin_forms/work_permit');
        }
	} 

	function download_renovation($formid) 
	{
        if($this->model_forms->url_check_workpermit($formid))
        {
            $this->model_forms->set_renovationdownloadstatus($formid);
            $query = $this->db->select('*')->where('formid', $formid)->get('upload_renovation',1);
            $result = $query->row();

            $path = 'C:/xampp/htdocs/pgevCI/application/uploads/' . $result->filename;
            $data = file_get_contents($path);
            $name = $result->filename;

            force_download($name, $data);
        }
        else
        {
            $this->session->set_flashdata('renovationfail', 'You cannot download a non-existent renovation form request.');
            redirect('admin_forms/renovation');
        }
	} 

	function delete_carsticker($formid)
	{
        if($this->model_forms->url_check_carsticker($formid))
        {
            $this->session->set_flashdata('cardeletesuccess', 'You have successfully deleted the car sticker form request.');
            $this->model_forms->delete_carsticker($formid);
            redirect('admin_forms/car_sticker');
        }
        else
        {
            $this->session->set_flashdata('carstickerfail', 'You cannot delete a non-existent car sticker form request.');
            redirect('admin_forms/car_sticker');
        }
	}

    function delete_workpermit($formid)
    {
        if($this->model_forms->url_check_workpermit($formid))
        {
            $this->session->set_flashdata('workdeletesuccess', 'You have successfully deleted the work permit form request.');
            $this->model_forms->delete_workpermit($formid);
            redirect('admin_forms/work_permit');
        }
        else
        {
            $this->session->set_flashdata('workpermitfail', 'You cannot delete a non-existent work permit form request.');
            redirect('admin_forms/work_permit');
        }
    }

    function delete_renovation($formid)
    {
        if($this->model_forms->url_check_renovation($formid))
        {
            $this->session->set_flashdata('renovatedeletesuccess', 'You have successfully deleted the renovation form request.');
            $this->model_forms->delete_renovation($formid);
            redirect('admin_forms/renovation');
        }
        else
        {
            $this->session->set_flashdata('renovationfail', 'You cannot delete a non-existent renovation form request.');
            redirect('admin_forms/renovation');
        }
    }

}