<?php

class User_Reservation extends MY_Controller {

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
    
	function court_one()
	{
		$data['date'] = date("Y/m/d");
		$data['result'] = $this->model_reservation_user->getcourtone_defaultavailability();
		$this->template->load('user_template', 'view_userreservation_courtone', $data);
	}

	function check_availability_courtone()
	{
		$searchquery = $this->input->get('search', TRUE);

	    if(isset($searchquery) and !empty($searchquery))
	    {	
    		$data['date'] = $searchquery;
			$data['result'] = $this->model_reservation_user->getcourtone_availability($searchquery);
			$this->template->load('user_template', 'view_userreservation_courtone', $data);
	    }
	    else
	    {
	     	redirect('user_reservation/court_one');
	    }
	}

	function court_two()
	{
		$data['date'] = date("Y/m/d");
		$data['result'] = $this->model_reservation_user->getcourttwo_defaultavailability();
		$this->template->load('user_template', 'view_userreservation_courttwo', $data);
	}

	function check_availability_courttwo()
	{
		$searchquery = $this->input->get('search', TRUE);

	    if(isset($searchquery) and !empty($searchquery))
	    {	
    		$data['date'] = $searchquery;
			$data['result'] = $this->model_reservation_user->getcourttwo_availability($searchquery);
			$this->template->load('user_template', 'view_userreservation_courttwo', $data);
	    }
	    else
	    {
	     	redirect('user_reservation/court_two');
	    }
	}

	function clubhouse()
	{
		$data['date'] = date("Y/m/d");
		$data['result'] = $this->model_reservation_user->getclubhouse_defaultavailability();
		$this->template->load('user_template', 'view_userreservation_clubhouse', $data);
	}

	function check_availability_clubhouse()
	{
		$searchquery = $this->input->get('search', TRUE);

	    if(isset($searchquery) and !empty($searchquery))
	    {	
    		$data['date'] = $searchquery;
			$data['result'] = $this->model_reservation_user->getclubhouse_availability($searchquery);
			$this->template->load('user_template', 'view_userreservation_clubhouse', $data);
	    }
	    else
	    {
	     	redirect('user_reservation/clubhouse');
	    }
	}

	function add_reservation_courtone()
	{
		$this->template->load('user_template', 'view_userreservation_addcourtone');	
	}

	function create_reservation_courtone()
	{
		$this->form_validation->set_rules('datepick', 'Date', 'required');
        $this->form_validation->set_rules('reservestart', 'Reservation Start', 'required|hourselection|unique_reserve_courtone|max_twohours');

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->load('user_template', 'view_userreservation_addcourtone');
        }
        else
        {
            if($query = $this->model_reservation_user->create_reservation_courtone())
             {
                $this->session->set_flashdata('reservefeedback', 'You have successfully reserved a date for Basketball Court One. Please wait for the administrators to accept your reservation.');
                redirect('user_reservation/court_one');
             }
        }
	}

	function add_reservation_courttwo()
	{
		$this->template->load('user_template', 'view_userreservation_addcourttwo');
	}

	function create_reservation_courttwo()
	{
		$this->form_validation->set_rules('datepick', 'Date', 'required');
        $this->form_validation->set_rules('reservestart', 'Reservation Start', 'required|hourselection|unique_reserve_courttwo|max_twohours');

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->load('user_template', 'view_userreservation_addcourttwo');
        }
        else
        {
            if($query = $this->model_reservation_user->create_reservation_courttwo())
             {
                $this->session->set_flashdata('reservefeedback', 'You have successfully reserved a date for Basketball Court Two. Please wait for the administrators to accept your reservation.');
                redirect('user_reservation/court_two');
             }
        }
	}

	function add_reservation_clubhouse()
	{
		$this->template->load('user_template', 'view_userreservation_addclubhouse');
	}

	function create_reservation_clubhouse()
	{
		$this->form_validation->set_rules('datepick', 'Date', 'required');
        $this->form_validation->set_rules('reservestart', 'Reservation Start', 'required|hourselection|unique_reserve_clubhouse|max_twohours');

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->load('user_template', 'view_userreservation_addclubhouse');
        }
        else
        {
            if($query = $this->model_reservation_user->create_reservation_clubhouse())
             {
                $this->session->set_flashdata('reservefeedback', 'You have successfully reserved a date for Basketball Court Two. Please wait for the administrators to accept your reservation.');
                redirect('user_reservation/clubhouse');
             }
        }
	}

}

