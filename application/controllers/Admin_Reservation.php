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
		$data['date'] = date("Y/m/d");
		$data['myreserve'] = $this->model_reservation->getreservation_courtone();
		$this->template->load('admin_template', 'view_adminreservation_courtone', $data);
	}

	function check_reservations_courtone()
	{
		$searchquery = $this->input->get('search', TRUE);

	    if(isset($searchquery) and !empty($searchquery))
	    {	
    		$data['date'] = $searchquery;
			$data['myreserve'] = $this->model_reservation->getcourtone_availability($searchquery);
			$this->template->load('admin_template', 'view_adminreservation_courtone', $data);
	    }
	    else
	    {
	     	redirect('admin_reservation/court_one');
	    }
	}

	function court_two()
	{
		$data['date'] = date("Y/m/d");
		$data['myreserve'] = $this->model_reservation->getreservation_courttwo();
		$this->template->load('admin_template', 'view_adminreservation_courttwo', $data);
	}

	function check_reservations_courttwo()
	{
		$searchquery = $this->input->get('search', TRUE);

	    if(isset($searchquery) and !empty($searchquery))
	    {	
    		$data['date'] = $searchquery;
			$data['myreserve'] = $this->model_reservation->getcourttwo_availability($searchquery);
			$this->template->load('admin_template', 'view_adminreservation_courttwo', $data);
	    }
	    else
	    {
	     	redirect('admin_reservation/court_two');
	    }
	}

	function clubhouse()
	{
		$data['date'] = date("Y/m/d");
		$data['myreserve'] = $this->model_reservation->getreservation_clubhouse();
		$this->template->load('admin_template', 'view_adminreservation_clubhouse', $data);
	}

	function check_reservations_clubhouse()
	{
		$searchquery = $this->input->get('search', TRUE);

	    if(isset($searchquery) and !empty($searchquery))
	    {	
    		$data['date'] = $searchquery;
			$data['myreserve'] = $this->model_reservation->getclubhouse_availability($searchquery);
			$this->template->load('admin_template', 'view_adminreservation_clubhouse', $data);
	    }
	    else
	    {
	     	redirect('admin_reservation/clubhouse');
	    }
	}


}