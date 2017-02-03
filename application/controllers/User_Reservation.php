<?php

class User_Reservation extends MY_Controller {

	public function court_one()
	{
		$data['date'] = date("Y/m/d");
		$data['result'] = $this->model_reservation_user->get_defaultavailability();
		$this->template->load('user_template', 'view_userreservation_courtone', $data);
	}

	function check_availability_courtone()
	{
		$searchquery = $this->input->get('search', TRUE);

	    if(isset($searchquery) and !empty($searchquery))
	    {
	    	if($this->model_reservation_user->check_reservationdatabase($searchquery))
	    	{	
	    		$data['date'] = $this->model_reservation_user->get_availabledate();
	    		$data['pickerdate'] = $this->model_reservation_user->get_searchdate($searchquery);
				$data['result'] = $this->model_reservation_user->get_availability($searchquery);
				$this->template->load('user_template', 'view_userreservation_courtone', $data);
	    	}
	    	else
	    	{
	    		$data['result'] = $this->model_reservation_user->get_availability($searchquery);
	    		$data['date'] = $searchquery;
	    		$this->template->load('user_template', 'view_userreservation_courtone', $data);
	    	}
	    }
	    else
	    {
	     	redirect('User_reservation/court_one');
	    }
	}

}

