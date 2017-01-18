<?php

class Admin_Forms extends CI_Controller {

	public function car_sticker()
	{
		$this->template->load('admin_template', 'view_adminforms_carsticker');
	}

	public function work_permit()
	{
		$this->template->load('admin_template', 'view_adminforms_workpermit');
	}

	public function renovation()
	{
		$this->template->load('admin_template', 'view_adminforms_renovation');
	}


}