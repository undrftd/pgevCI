<?php

class User_Accounts extends MY_Controller {

    function __construct()
    {   
      parent::__construct();

      $session_admin = $this->session->userdata('isAdmin');
      $method = $this->router->fetch_method();

      if(($session_admin == TRUE) && $method != 'login')
      {
          $this->session->set_flashdata('message', 'You need to login to access this location' );
          redirect('admin_ticketing/new_tickets');
      }
    }

    function index()
    {
        $this->template->load('user_template', 'view_useraccounts');
    }

    function alpha_dash_space($str)
    {
        return ( ! preg_match("/^([a-z ])+$/i", $str)) ? FALSE : TRUE;
     }

    function update_useraccount($userid)
    {
      $this->form_validation->set_error_delimiters('<div class="error">','</div>');
      $this->form_validation->set_message('is_unique', '{field} already exists!');
      $this->form_validation->set_message('alpha_dash_space', '{field} may only contain alphabetical characters and spaces.');
      $this->form_validation->set_message('matches', 'Passwords do not match!');

      $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]');
      $this->form_validation->set_rules('cpassword', 'Password', 'required|matches[password]');
      $this->form_validation->set_rules('email', 'E-mail Address', 'required|valid_email');
      $this->form_validation->set_rules('contactnum', 'Contact Number', 'required|min_length[7]');

      if ($this->form_validation->run() == FALSE)
      {
          $this->template->load('user_template', 'view_useraccounts');
      }
      else
      {
          if($query = $this->model_accounts_user->myaccount_userupdate($userid))
           {
              $this->session->set_flashdata('accountsfeedback', 'You have successfully updated your account.');
              redirect('user_accounts');
           }
      }
    }
}
