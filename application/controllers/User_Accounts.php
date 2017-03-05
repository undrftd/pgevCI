<?php

class User_Accounts extends MY_Controller {

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

    function index()
    {
        $data['approvedreserve'] = $this->model_reservation->count_approved();
        $data['deniedreserve'] = $this->model_reservation->count_denied();
        $data['count'] = $this->model_tracking_user->count_activetickets();
        $this->template->load('user_template', 'view_useraccounts', $data);
    }

    function alpha_dash_space($str)
    {
        return ( ! preg_match("/^([a-z ])+$/i", $str)) ? FALSE : TRUE;
    }

    function num_dash_par($str)
    {
        return ( ! preg_match("/^([-0-9()])+$/i", $str)) ? FALSE : TRUE;
    }

    function update_useraccount($userid)
    {
      $this->form_validation->set_error_delimiters('<div class="error">','</div>');
      $this->form_validation->set_message('is_unique', '{field} already exists!');
      $this->form_validation->set_message('alpha_dash_space', '{field} may only contain alphabetical characters and spaces.');
      $this->form_validation->set_message('num_dash_par', '{field} may only contain numbers, dashes, and parentheses.');
      $this->form_validation->set_message('matches', 'Passwords do not match!');

      $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|xss_clean');
      $this->form_validation->set_rules('cpassword', 'Password', 'required|matches[password]|xss_clean');
      $this->form_validation->set_rules('email', 'E-mail Address', 'required|valid_email|edit_unique[accounts.email.'.$userid.']|xss_clean');
      $this->form_validation->set_rules('contactnum', 'Contact Number', 'required|callback_num_dash_par|min_length[7]|xss_clean');

      if ($this->form_validation->run() == FALSE)
      {
          $data['approvedreserve'] = $this->model_reservation->count_approved();
          $data['deniedreserve'] = $this->model_reservation->count_denied();
          $data['count'] = $this->model_tracking_user->count_activetickets();
          $this->template->load('user_template', 'view_useraccounts', $data);
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
