<?php

class User_Home extends MY_Controller {

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
      elseif($session_deact == 'unverified' && $method != 'login')
      {
        redirect('unverified');
      } 

      if($session_data->username != $session_username)
      {
          redirect('login/signout');
      }
    }
    
    function index()
    {
      $data['approvedreserve'] = $this->model_reservation->count_approved();
      $data['deniedreserve'] = $this->model_reservation->count_denied();
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
