<?php

class Admin_Reservation extends MY_Controller {

	function __construct()
    {   
      parent::__construct();

      $session_admin = $this->session->userdata('isAdmin');
      $method = $this->router->fetch_method();

      if(($session_admin == FALSE) && $method != 'login')
      {
          $this->session->set_flashdata('message', 'You need to login to access this location' );
          redirect('admin_ticketing/new_tickets');
      }
    }

	function court_one()
	{
		$data['myreserve'] = $this->model_reservation->getreservation_courtone();
		$this->template->load('admin_template', 'view_adminreservation_courtone', $data);
	}

	function court_two()
	{
		$data['myreserve'] = $this->model_reservation->getreservation_courttwo();
		$this->template->load('admin_template', 'view_adminreservation_courttwo', $data);
	}

	function clubhouse()
	{
		$data['myreserve'] = $this->model_reservation->getreservation_clubhouse();
		$this->template->load('admin_template', 'view_adminreservation_clubhouse', $data);
	}


}