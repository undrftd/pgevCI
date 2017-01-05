<?php

class Login extends CI_Controller
{

    function index()
    {
        $data['main_content'] = 'view_login';
        $this->load->view('includes/login_template', $data);
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
        $data['main_content'] = 'view_login';
        $data['message'] = "The username and password you entered did not match our records. Please double-check and try again. ";
        $this->load->view('includes/login_template', $data);
    }
    }   

    function userdeact()
    {
        $data['main_content'] = 'view_userdeact';
        $this->load->view('includes/accdeact_template', $data);
    }

    function admindeact()
    {
        $data['main_content'] = 'view_admindeact';
        $this->load->view('includes/accdeact_template', $data);
    }

    function signout()
    {
        $user_data = $this->session->all_userdata();
            foreach ($user_data as $key => $value) {
                if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                    $this->session->unset_userdata($key);
                }
            }
        $this->session->sess_destroy();
        redirect('login/');
    }
}
