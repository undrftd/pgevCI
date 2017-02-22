<?php

class User_Home extends MY_Controller {

  function __construct()
  {   
    parent::__construct();

    $session_admin = $this->session->userdata('isAdmin');
    $session_deact = $this->session->userdata('status');
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
  }
  
  function index()
  {
		$this->model_dues_user->setsession();
  	$data['count'] = $this->model_tracking_user->count_activetickets();
  	$data['rate'] = $this->model_dues_user->get_rate();
  	$data['latest'] = $this->model_announcements->get_latestannouncement();
    $data['courtone'] = $this->model_reservation_user->count_reservationcourtone();
    $data['courttwo'] = $this->model_reservation_user->count_reservationcourttwo();
    $data['clubhouse'] = $this->model_reservation_user->count_reservationclubhouse();
  	$this->session->set_userdata('referred_from', current_url());
    $this->template->load('user_template', 'view_userhome', $data);
  }

}
