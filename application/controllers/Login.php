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
            $data = array(
                'userid' => $this->input->post('userid'),
                'is_logged_in' => true
            );

            $this->session->set_userdata($data); 
            redirect('admin/ticketing');
        }
        else if(($valid && $isActive) && $isAdmin == false)  // Active User
        {
            $data = array(
                'userid' => $this->input->post('userid'),
                'is_logged_in' => true
            );
        
            $this->session->set_userdata($data);
            redirect('user/home');
        }
        else if(($valid && $isAdmin) && $isActive == false)  //Deactivated Admin
        {
            $data = array(
                'userid' => $this->input->post('userid'),
                'is_logged_in' => true
            );

            $this->session->set_userdata($data); 
            redirect('admin/accdeact');
        }
        else if($valid && ($isActive && $isAdmin) == false) //Deactivated User
        {
            $data = array(
                'userid' => $this->input->post('userid'),
                'is_logged_in' => true
            );
        
            $this->session->set_userdata($data);
            redirect('user/accdeact');
        }
        else if($valid == false) //Invalid Account
        {
            
            $data['main_content'] = 'view_login';
            $data['message'] = "";
            
            $this->load->view('includes/login_template', $data);
        }
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
