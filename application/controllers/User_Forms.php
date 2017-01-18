<?php

class User_Forms extends MY_Controller {

	public function car_sticker()
	{
		$this->template->load('user_template', 'view_userforms_carsticker');	
	}

	function work_permit()
	{
		$this->template->load('user_template', 'view_userforms_workpermit');
	}

	function renovation()
	{
		$this->template->load('user_template', 'view_userforms_renovation');
	}
}
