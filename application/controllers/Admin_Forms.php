<?php

class Admin_Forms extends MY_Controller {

        public function car_sticker()
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

	public function work_permit()
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

	public function renovation()
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

	function download_carsticker($filename) 
	{
		$this->model_forms->set_cardownloadstatus($filename);

		$path = 'C:/xampp/htdocs/pgevCI/application/uploads/' . $filename;
                $data = file_get_contents($path);
		$name = $filename;

		force_download($name, $data);
	}   

	function download_workpermit($filename) 
	{
		$this->model_forms->set_workdownloadstatus($filename);

		$path = 'C:/xampp/htdocs/pgevCI/application/uploads/' . $filename;
                $data = file_get_contents($path);
	       	$name = $filename;

		force_download($name, $data);
	} 

	function download_renovation($filename) 
	{
		$this->model_forms->set_renovationdownloadstatus($filename);

		$path = 'C:/xampp/htdocs/pgevCI/application/uploads/' . $filename;
                $data = file_get_contents($path);
		$name = $filename;

		force_download($name, $data);
	} 

	function delete_carsticker($filename)
	{
		$this->session->set_flashdata('deletesuccess', 'You have successfully deleted the account.');
                $this->model_accounts->acc_delete($filename);
                redirect('admin_forms/car_sticker');
	}


}