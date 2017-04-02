<?php

class User_Deact extends MY_Controller {

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
      elseif(($session_deact != 'deact') && $method != 'login' && $session_admin == TRUE)
      {
          $this->session->set_flashdata( 'message', 'You need to login to access this location' );
          redirect('admin_ticketing/new_tickets');
      }
      elseif(($session_deact != 'deact') && $method != 'login' && $session_admin == FALSE)
      {
          $this->session->set_flashdata( 'message', 'You need to login to access this location' );
          redirect('user_home');
      }
      else
      {
          redirect('unverified');
      }
    }

    function index()
    {
      $this->session->set_userdata('referred_from', current_url());
      $this->template->load('template', 'view_userdeact');
    }

}
//!= FALSE && $session_admin != TRUE
