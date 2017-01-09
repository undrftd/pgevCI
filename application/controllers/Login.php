<?php

class Login extends CI_Controller
{

    function index()
    {
        $this->template->load('template', 'view_login');
    }

    function validate_login()
    {
        $this->load->model('model_accounts');
        $valid = $this->model_accounts->validate();
        $isAdmin = $this->model_accounts->check_role();
        $isActive = $this->model_accounts->check_active();

        if($valid && $isAdmin && $isActive) // Active Admin
        {
            redirect('admin_ticketing');
        }
        else if(($valid && $isActive) && $isAdmin == false)  // Active User
        {
            redirect('user_home');
        }
        else if(($valid && $isAdmin) && $isActive == false)  //Deactivated Admin
        {
            redirect('login/admindeact');
        }
        else if($valid && ($isActive && $isAdmin) == false) //Deactivated User
        {

            redirect('login/userdeact');
        }
        else if($valid == false) //Invalid Account
        {
            $data['message'] = "The username and password you entered did not match our records. Please double-check and try again. ";
            $this->template->load('template', 'view_login', $data);
        }
    }   

    function userdeact()
    {
        $this->template->load('template', 'view_userdeact');
    }

    function admindeact()
    {
        $this->template->load('template', 'view_admindeact');
    }

    function signout()
    {
        $user_data = $this->session->all_userdata();
        
        foreach ($user_data as $key => $value) 
        {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') 
            {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect('login/');
    }
}
