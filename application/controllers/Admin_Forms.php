<?php

class Admin_Forms extends CI_Controller {

	public function car_sticker()
	{
		$this->load->model('model_forms');
		$data['carsticker'] = $this->model_forms->get_car_request();
		$data['count'] = $this->model_forms->count_car_request();
		$this->template->load('admin_template', 'view_adminforms_carsticker', $data);
	}

	public function work_permit()
	{
		$this->template->load('admin_template', 'view_adminforms_workpermit');
	}

	public function renovation()
	{
		$this->template->load('admin_template', 'view_adminforms_renovation');
	}

	function download($filename) 
	{
		$path = 'C:/xampp/htdocs/pgevCI/application/uploads/' . $filename;
        $data = file_get_contents($path);
		$name = $filename;

		force_download($name, $data);
	}   


}