<?php

class User_Suggestions extends MY_Controller {

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
        $this->template->load('user_template','view_usersuggestions', $data); 
    }
   
    function send_email()
    {
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules("message", "Message", "required|min_length[20]|xss_clean");
 
        if ($this->form_validation->run() == FALSE)
        {
            $data['approvedreserve'] = $this->model_reservation->count_approved();
            $data['deniedreserve'] = $this->model_reservation->count_denied();
            $data['count'] = $this->model_tracking_user->count_activetickets();
            $data['message']="" ;
            $this->template->load('user_template', 'view_usersuggestions', $data);
        }
        else
        {
            $data['approvedreserve'] = $this->model_reservation->count_approved();
            $data['deniedreserve'] = $this->model_reservation->count_denied();
            $data['count'] = $this->model_tracking_user->count_activetickets();
            $this->session->set_flashdata('suggestfeedback', 'Your suggestion has been successfully submitted. Thank you for your time and concern in our community.');
          
            $this->load->library("email");
            
            $this->email->from("pgevadmin@parkwoodgreens.com");
            $this->email->to("parkwoodexecutive@gmail.com");
            $this->email->set_header('Header1', 'NAME');
            $this->email->subject("Community Suggestions -" . " " . $this->session->userdata('firstname') . " " . $this->session->userdata('lastname') . " " . "(" . $this->session->userdata('email') . ")");
            $emaildata = $this->email->message(set_value("message"));
            
            $this->email->send();
            $this->template->load('user_template','view_usersuggestions', $data); 
        }
    }
}