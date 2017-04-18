<?php

class User_Reservation extends MY_Controller {

	function __construct()
    {
      parent::__construct();

      $session_admin = $this->session->userdata('isAdmin');
      $session_deact = $this->session->userdata('status');
      $session_data = $this->model_accounts->checksession();
      $session_username = $this->session->userdata('username');

      $method = $this->router->fetch_method();


      if(($session_admin == TRUE) && $method != 'login')
      {
          $this->session->set_flashdata('message', 'You need to login to access this location' );
          redirect('admin_ticketing/new_tickets');
      }
      elseif(($session_deact == 'deact') && $method != 'login')
      {
          $this->session->set_flashdata( 'message', 'You need to login to access this location' );
          redirect('user_deact');
      }
      if($session_data->username != $session_username)
      {
          redirect('login/signout');
      }
    }

	function court_one()
	{
        $data['approvedreserve'] = $this->model_reservation->count_approved();
        $data['deniedreserve'] = $this->model_reservation->count_denied();
        $data['count'] = $this->model_tracking_user->count_activetickets();
		$data['date'] = date("Y/m/d");
		$data['result'] = $this->model_reservation_user->getcourtone_defaultavailability();
		$this->template->load('user_template', 'view_userreservation_courtone', $data);
	}

	function check_availability_courtone()
	{
		$searchquery = $this->input->get('search', TRUE);

	    if(isset($searchquery) and !empty($searchquery))
	    {
            $data['approvedreserve'] = $this->model_reservation->count_approved();
            $data['deniedreserve'] = $this->model_reservation->count_denied();
            $data['count'] = $this->model_tracking_user->count_activetickets();
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
        $data['approvedreserve'] = $this->model_reservation->count_approved();
        $data['deniedreserve'] = $this->model_reservation->count_denied();
        $data['count'] = $this->model_tracking_user->count_activetickets();
		$data['date'] = date("Y/m/d");
		$data['result'] = $this->model_reservation_user->getcourttwo_defaultavailability();
		$this->template->load('user_template', 'view_userreservation_courttwo', $data);
	}

	function check_availability_courttwo()
	{
		$searchquery = $this->input->get('search', TRUE);

	    if(isset($searchquery) and !empty($searchquery))
	    {
            $data['approvedreserve'] = $this->model_reservation->count_approved();
            $data['deniedreserve'] = $this->model_reservation->count_denied();
            $data['count'] = $this->model_tracking_user->count_activetickets();
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
        $data['approvedreserve'] = $this->model_reservation->count_approved();
        $data['deniedreserve'] = $this->model_reservation->count_denied();
        $data['count'] = $this->model_tracking_user->count_activetickets();
		$data['date'] = date("Y/m/d");
		$data['result'] = $this->model_reservation_user->getclubhouse_defaultavailability();
		$this->template->load('user_template', 'view_userreservation_clubhouse', $data);
	}

	function check_availability_clubhouse()
	{
		$searchquery = $this->input->get('search', TRUE);

	    if(isset($searchquery) and !empty($searchquery))
	    {
            $data['approvedreserve'] = $this->model_reservation->count_approved();
            $data['deniedreserve'] = $this->model_reservation->count_denied();
            $data['count'] = $this->model_tracking_user->count_activetickets();
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
        $data['approvedreserve'] = $this->model_reservation->count_approved();
        $data['deniedreserve'] = $this->model_reservation->count_denied();
        $data['count'] = $this->model_tracking_user->count_activetickets();
		$this->template->load('user_template', 'view_userreservation_addcourtone', $data);
	}

	function create_reservation_courtone()
	{
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
		$this->form_validation->set_rules('datepick', 'Date', 'required|no_olddate|max_time|xss_clean');
        $this->form_validation->set_rules('reservestart', 'Reservation Start', 'required|unique_reserve_courtone|hourselection|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            $data['approvedreserve'] = $this->model_reservation->count_approved();
            $data['deniedreserve'] = $this->model_reservation->count_denied();
            $data['count'] = $this->model_tracking_user->count_activetickets();
            $this->template->load('user_template', 'view_userreservation_addcourtone', $data);
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
        $data['approvedreserve'] = $this->model_reservation->count_approved();
        $data['deniedreserve'] = $this->model_reservation->count_denied();
        $data['count'] = $this->model_tracking_user->count_activetickets();
		$this->template->load('user_template', 'view_userreservation_addcourttwo', $data);
	}

	function create_reservation_courttwo()
	{
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
		$this->form_validation->set_rules('datepick', 'Date', 'required|no_olddate|max_time|xss_clean');
        $this->form_validation->set_rules('reservestart', 'Reservation Start', 'required|unique_reserve_courttwo|hourselection|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            $data['approvedreserve'] = $this->model_reservation->count_approved();
            $data['deniedreserve'] = $this->model_reservation->count_denied();
            $data['count'] = $this->model_tracking_user->count_activetickets();
            $this->template->load('user_template', 'view_userreservation_addcourttwo', $data);
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
        $data['approvedreserve'] = $this->model_reservation->count_approved();
        $data['deniedreserve'] = $this->model_reservation->count_denied();
        $data['count'] = $this->model_tracking_user->count_activetickets();
		$this->template->load('user_template', 'view_userreservation_addclubhouse', $data);
	}

	function create_reservation_clubhouse()
	{
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
		$this->form_validation->set_rules('datepick', 'Date', 'required|no_olddate|xss_clean');
        $this->form_validation->set_rules('reservestart', 'Reservation Start', 'required|unique_reserve_clubhouse|hourselection|min_fourhours|xss_clean');
        $this->form_validation->set_rules('reserveend', 'Reservation Start', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            $data['approvedreserve'] = $this->model_reservation->count_approved();
            $data['deniedreserve'] = $this->model_reservation->count_denied();
            $data['count'] = $this->model_tracking_user->count_activetickets();
            $this->template->load('user_template', 'view_userreservation_addclubhouse', $data);
        }
        else
        {
            if($query = $this->model_reservation_user->create_reservation_clubhouse())
            {
                $this->session->set_flashdata('reservefeedback', 'You have successfully reserved a date for the Clubhouse. Please wait for the administrators to accept your reservation.');
                redirect('user_reservation/clubhouse');
            }
        }
	}

	function reservations_courtone()
	{
		$config['base_url'] = site_url('user_reservation/reservations_courtone');
        $config['total_rows'] = $this->model_reservation_user->count_reservationcourtone();
        $config['per_page'] =  20;
        $config['num_links'] = 5;
        $config['use_page_numbers'] = FALSE;
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
        $data['courtonelinks'] = $this->pagination->create_links();

        $data['approvedreserve'] = $this->model_reservation->count_approved();
        $data['deniedreserve'] = $this->model_reservation->count_denied();
        $data['count'] = $this->model_tracking_user->count_activetickets();
		$data['myreserve'] = $this->model_reservation_user->getmyreservation_courtone($config['per_page'], $this->uri->segment(3));
		$this->template->load('user_template', 'view_userreservation_reservation_courtone', $data);
	}

	function reservations_courttwo()
	{
		$config['base_url'] = site_url('user_reservation/reservations_courttwo');
        $config['total_rows'] = $this->model_reservation_user->count_reservationcourttwo();
        $config['per_page'] =  20;
        $config['num_links'] = 5;
        $config['use_page_numbers'] = FALSE;
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
        $data['courttwolinks'] = $this->pagination->create_links();

        $data['approvedreserve'] = $this->model_reservation->count_approved();
        $data['deniedreserve'] = $this->model_reservation->count_denied();
        $data['count'] = $this->model_tracking_user->count_activetickets();
		$data['myreserve'] = $this->model_reservation_user->getmyreservation_courttwo($config['per_page'], $this->uri->segment(3));
		$this->template->load('user_template', 'view_userreservation_reservation_courttwo', $data);
	}

	function reservations_clubhouse()
	{
		$config['base_url'] = site_url('user_reservation/reservations_clubhouse');
        $config['total_rows'] = $this->model_reservation_user->count_reservationclubhouse();
        $config['per_page'] =  20;
        $config['num_links'] = 5;
        $config['use_page_numbers'] = FALSE;
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
        $data['clubhouselinks'] = $this->pagination->create_links();

        $data['approvedreserve'] = $this->model_reservation->count_approved();
        $data['deniedreserve'] = $this->model_reservation->count_denied();
        $data['count'] = $this->model_tracking_user->count_activetickets();
		$data['myreserve'] = $this->model_reservation_user->getmyreservation_clubhouse($config['per_page'], $this->uri->segment(3));
		$this->template->load('user_template', 'view_userreservation_reservation_clubhouse', $data);
	}

	function cancelreservation_courtone($reservationid)
	{
		if($this->model_reservation_user->url_check_courtone($reservationid))
        {
            $this->session->set_flashdata('reservefeedback', 'You have successfully cancelled your reservation.');
            $this->model_reservation_user->cancelreservation_courtone($reservationid);
            redirect('user_reservation/reservations_courtone');
        }
        else
        {
            $this->session->set_flashdata('reservefail', 'You cannot cancel a non-existent reservation.');
            redirect('user_reservation/reservations_courtone');
        }
	}

	function cancelreservation_courttwo($reservationid)
	{
		if($this->model_reservation_user->url_check_courttwo($reservationid))
        {
            $this->session->set_flashdata('reservefeedback', 'You have successfully cancelled your reservation.');
            $this->model_reservation_user->cancelreservation_courttwo($reservationid);
            redirect('user_reservation/reservations_courttwo');
        }
        else
        {
            $this->session->set_flashdata('reservefail', 'You cannot cancel a non-existent reservation.');
            redirect('user_reservation/reservations_courttwo');
        }
	}

	function cancelreservation_clubhouse($reservationid)
	{
		if($this->model_reservation_user->url_check_clubhouse($reservationid))
        {
            $this->session->set_flashdata('reservefeedback', 'You have successfully cancelled your reservation.');
            $this->model_reservation_user->cancelreservation_clubhouse($reservationid);
            redirect('user_reservation/reservations_clubhouse');
        }
        else
        {
            $this->session->set_flashdata('reservefail', 'You cannot cancel a non-existent reservation.');
            redirect('user_reservation/reservations_clubhouse');
        }
	}

}
