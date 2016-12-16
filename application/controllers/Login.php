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


        if($valid && $isAdmin)
        {
            $data = array(
                'userid' => $this->input->post('userid'),
                'is_logged_in' => true
            );

            $this->session->set_userdata($data); 
            redirect('admin/ticketing');
        }
        else if($valid && $isAdmin == false) 
        {
            $data = array(
                'userid' => $this->input->post('userid'),
                'is_logged_in' => true
            );
        
            $this->session->set_userdata($data);
            redirect('site/user');
        }
        else if($valid == false && $isAdmin == false){
            
            $data['main_content'] = 'view_login';
            $data['message'] = "Invalid username or passwordInvalid username or passwordInvalid username or passwordInvalid username or passwordInvalid username or passwordInvalid username or passwordInvalid username or passwordInvalid username or passwordInvalid username or passwordInvalid username or passwordInvalid username or passwordInvalid username or password";
            
            $this->load->view('includes/login_template', $data);
        }
    }      
    }
