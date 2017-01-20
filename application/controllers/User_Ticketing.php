<?php
class User_Ticketing extends CI_Controller {

	public function index()
	{
		$this->template->load('user_template', 'view_userticketing');	
	}

}
