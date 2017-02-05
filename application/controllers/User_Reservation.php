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
		$data['resulttwo'] = $this->model_reservation_user->getcourttwo_defaultavailability();
		$this->template->load('user_template', 'view_userreservation_courttwo', $data);
	}

	function check_availability_courttwo()
	{
		$searchquery = $this->input->get('search', TRUE);

	    if(isset($searchquery) and !empty($searchquery))
	    {	
    		$data['date'] = $searchquery;
			$data['resulttwo'] = $this->model_reservation_user->getcourttwo_availability($searchquery);
			$this->template->load('user_template', 'view_userreservation_courttwo', $data);
	    }
	    else
	    {
	     	redirect('user_reservation/court_two');
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

}

