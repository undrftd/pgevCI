<?php

class User_Reservation extends MY_Controller {

	public function index()
	{
		$this->template->load('user_template', 'view_userreservation');
	}

}

