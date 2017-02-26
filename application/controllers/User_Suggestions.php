<?php

class User_Suggestions extends MY_Controller {

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
        $this->template->load('user_template','view_usersuggestions'); 
    }
   
    function send_email()
    {
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules("message", "Message", "required|min_length[60]");
 
        if ($this->form_validation->run() == FALSE)
        {
            $data['message']="" ;
            $this->template->load('user_template', 'view_usersuggestions', $data);
        }
        else
        {
            $this->session->set_flashdata('suggestfeedback', 'Your suggestion has been successfully submitted. Thank you for your time and concern in our community.');
            
            $this->load->library("email");
            
            $this->email->from(set_value("email"), set_value("fullName"));
            $this->email->to("excontent14@gmail.com");
            $array = $this->session->userdata('firstname');
            $this->email->subject("Community Suggestions -" . " " . $this->session->userdata('firstname') . " " . $this->session->userdata('lastname') . "(" . $this->session->userdata('email') . ")");
            $this->email->message(set_value("message"));
            
            $this->email->send();
            $this->template->load('user_template','view_usersuggestions'); 
        }
    }
}