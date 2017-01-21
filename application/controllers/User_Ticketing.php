<?php
class User_Ticketing extends CI_Controller {

	public function index()
	{
		$this->template->load('user_template', 'view_userticketing');	
	}

	function requests_complaints()
	{
		$this->template->load('user_template', 'view_userrequestscomplaints');
	}

	function send_requestcomplaint()
	{
		$this->load->model('model_ticketing_user');
		$this->model_ticketing_user->send_requestcomplaint();
		redirect('user_ticketing/requests_complaints');
	}

}
