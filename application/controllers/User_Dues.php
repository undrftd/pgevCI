<?php

class User_Dues extends MY_Controller {
  
  function __construct()
  {   
	parent::__construct();

	$session_admin = $this->session->userdata('isAdmin');
	$method = $this->router->fetch_method();

	if(($session_admin == TRUE) && $method != 'login')
	{
	  $this->session->set_flashdata('message', 'You need to login to access this location' );
	  redirect('admin_ticketing/new_tickets');
	} 	
  }

  function index()
  {
  	$this->model_dues_user->setsession();
  	$data['rate'] = $this->model_dues_user->get_rate();
 	$this->template->load('user_template', 'view_userdues', $data);
  }

}
