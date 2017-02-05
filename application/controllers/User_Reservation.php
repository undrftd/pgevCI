<?php

class User_Reservation extends MY_Controller {

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
	     	redirect('user_reservation/court_clubhouse');
	    }
	}

	function add_reservation_courtone()
	{
		$this->template->load('user_template', 'view_userreservation_addcourtone');	
	}

	function add_reservation_courttwo()
	{
		$this->template->load('user_template', 'view_userreservation_addcourttwo');
	}

	function add_reservation_clubhouse()
	{
		$this->template->load('user_template', 'view_userreservation_addclubhouse');
	}

}

