<?php

class Admin_Deact extends MY_Controller {

	  function __construct()
    {   
      parent::__construct();

      $session_admin = $this->session->userdata('isAdmin');
      $session_deact = $this->session->userdata('status');
      $method = $this->router->fetch_method();

      if(($session_admin == FALSE) && $method != 'login')
      {
          $this->session->set_flashdata( 'message', 'You need to login to access this location' );
          redirect('user_home');
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
      
    }
    
    function index()
    {
      $this->session->set_userdata('referred_from', current_url());
      $this->template->load('template', 'view_admindeact');
    }

}
