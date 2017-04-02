<?php

class Admin_Profile extends MY_Controller{

	function __construct()
    {   
      parent::__construct();

      $session_admin = $this->session->userdata('isAdmin');
      $session_deact = $this->session->userdata('status');
      $session_data = $this->model_accounts->checksession();
      $session_username = $this->session->userdata('username');
      
      $method = $this->router->fetch_method();

      if(($session_admin == FALSE) && $method != 'login')
      {
          $this->session->set_flashdata( 'message', 'You need to login to access this location' );
          redirect('user_home');
      }
      elseif(($session_deact == 'deact') && $method != 'login')
      {
          $this->session->set_flashdata( 'message', 'You need to login to access this location' );
          redirect('admin_deact');
      }
      else
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
		$data['count'] = $this->model_ticketing->count_newtickets();
    	$data['reserve'] = $this->model_reservation->count_allnewreserve();
    	$data['forms'] = $this->model_forms->count_allnewforms();
		$this->template->load('admin_template', 'view_adminprofile', $data);
	}

	function alpha_dash_space($str)
    {
        return ( ! preg_match("/^([a-z ])+$/i", $str)) ? FALSE : TRUE;
    }

    function num_dash_par($str)
    {
        return ( ! preg_match("/^([-0-9()])+$/i", $str)) ? FALSE : TRUE;
    }

    public function alpha_comma($str) 
    {
        return ( !preg_match('/^[a-z,. 0-9 \-]+$/i',$str)) ? FALSE : TRUE;
    }

    function validEmail($email)
    {
        // Check the formatting is correct
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        return FALSE;
        }
        // Next check the domain is real.
        $domain = explode("@", $email, 2);
        return checkdnsrr($domain[1]); // returns TRUE/FALSE;
    }

	function update_account($userid)
	{
		$this->usertracking->track_this();
		if($this->model_accounts->url_check_myaccount($userid))
		{
			$this->form_validation->set_error_delimiters('<div class="error">','</div>');
	        $this->form_validation->set_message('is_unique', '{field} already exists!');
	        $this->form_validation->set_message('alpha_dash_space', '{field} may only contain alphabetical characters and spaces.');
	        $this->form_validation->set_message('matches', 'Passwords do not match!');
	         $this->form_validation->set_message('num_dash_par', '{field} may only contain numbers, dashes, and parentheses.');

	        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|callback_alpha_dash_space|xss_clean');
	        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|callback_alpha_dash_space|xss_clean');
	        $this->form_validation->set_rules('birthdate', 'Birthdate', 'required|birthvalidate|xss_clean');
	        $this->form_validation->set_rules('username', 'Username', 'trim|required|edit_unique[accounts.username.'.$userid.']|xss_clean');
	        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean');
	        $this->form_validation->set_rules('passconf', 'Password', 'required|matches[password]|xss_clean');
	        $this->form_validation->set_rules('address', 'Address', 'required|callback_alpha_comma|xss_clean');
	        $this->form_validation->set_rules('email', 'E-mail Address', 'required|valid_email|xss_clean');
	        $this->form_validation->set_rules('contactnum', 'Contact Number', 'required|callback_num_dash_par|min_length[7]|xss_clean');

	        if ($this->form_validation->run() == FALSE)
	        {
	        	$data['count'] = $this->model_ticketing->count_newtickets();
    			$data['reserve'] = $this->model_reservation->count_allnewreserve();
    			$data['forms'] = $this->model_forms->count_allnewforms();
	        	$this->template->load('admin_template', 'view_adminprofile', $data);
	        }
	        elseif ($this->validemail($this->input->post('email')) == FALSE)
	        {
	            $data['count'] = $this->model_ticketing->count_newtickets();
	            $data['reserve'] = $this->model_reservation->count_allnewreserve();
	            $data['forms'] = $this->model_forms->count_allnewforms();
	            $data['message'] = 'This email is invalid.';
	        	$this->template->load('admin_template', 'view_adminprofile', $data);
	        }
	        else
	        {
	            if($query = $this->model_accounts->myaccount_update($userid))
	             {
	                $this->session->set_flashdata('profilefeedback', 'You have successfully updated the account.');
	                redirect('admin_profile');
	             }
	        }
	    }
	    else
	    {
	    	$this->session->set_flashdata('profilefail', 'You can only edit your own account.');
	        redirect('admin_profile');
	    }
	}


}
