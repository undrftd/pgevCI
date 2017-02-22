<?php

class Login extends CI_Controller
{

    function index()
    {
        if($this->session->userdata('is_logged_in'))
        {
            $referred_from = $this->session->userdata('referred_from');
            redirect($referred_from);
        }
        else
        {
            $this->template->load('template', 'view_login');
        }
    }

    function validate_login()
    {
        $this->load->model('model_accounts');
        $valid = $this->model_accounts->validate();
        $isAdmin = $this->model_accounts->check_role();
        $isUser = $this->model_accounts->check_user();
        $isActive = $this->model_accounts->check_active();

        if($valid && $isAdmin && $isActive) // Active Admin
        {
            $data = array(
                'is_logged_in' => true
            );
            $this->session->set_userdata($data);
            redirect('admin_ticketing/new_tickets');
        }
        else if($valid && $isActive && $isUser)  // Active User
        {
            $data = array(
                'is_logged_in' => true
            );
            $this->session->set_userdata($data);
            redirect('user_home');
        }
        else if(($valid && $isAdmin) && $isActive == false)  //Deactivated Admin
        {
            $data = array(
                'is_logged_in' => true,
                'status' => 'deact',
            );
            $this->session->set_userdata($data);
            redirect('admin_deact');
        }
        else if($valid && ($isActive && $isAdmin) == false) //Deactivated User
        {
            $data = array(
                'is_logged_in' => true,
                'status' => 'deact',
            );
            $this->session->set_userdata($data);
            redirect('user_deact');
        }
        else if($valid == false) //Invalid Account
        {
            $data['message'] = "Sorry, the username and password you entered did not match our records. Please double-check and try again. ";
            $this->template->load('template', 'view_login', $data);
        }
    }

    function reset_password()
    {
        $this->template->load('template','view_resetpassword');
    }

    function reset_emailvalidation()
    {
        $this->form_validation->set_rules('email', 'E-mail Address', 'required|valid_email|trim');
        if ($this->form_validation->run())
        {
            $resetkey = md5(uniqid());

            $this->load->model('model_accounts');

            if($this->model_accounts->url_check_email())
            {
                if($this->model_accounts->update_resetkey($resetkey))
                {
                    $this->load->library("email");

                    $this->email->from(set_value("email"), set_value("fullName"));
                    $this->email->to($this->input->post('email'));
                    $this->email->set_mailtype('html');
                    $array = $this->session->userdata('firstname');
                    $this->email->subject("Password Reset - Parkwood Greens Executive Village CRM");
                    $message = '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>Parkwood Greens Executive Village - Reset Password </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="overflow-x: hidden;">

    <br>

    <div id="header" class="text-center" style="background-color: #f2f2f2; padding: 30px;">
      <p style="font-family: \'Roboto\', sans-serif; color: #999999; font-weight: 700; font-size: 20px;">Parkwood Greens Exeuctive Village CRM</p>
    </div>

    <br>

    <div class="row" style="font-family: \'Roboto\', sans-serif;">

      <div class="col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">

        <div id="content" class="text-center" style="padding: 10px; line-height: 25px;">
          <strong><p class="text-left" style="font-size: 16px;"> Hi, </p></strong>

          <p class="text-left" style="font-size: 13px; color: #595959"> You recently requested to reset your password for your Parkwood Greens Exeuctive Village CRM account. Click the' . $this->session->userdata('firstname') . ' button below to reset it.  </p>

          <br>

          <button type="submit" class="btn btn-custom-4" style="background-color: white; border: 2px solid #27ae60; padding: 15px; width: 60%; border-radius: 2px; font-size: 0.95em; opacity: 1; transition: all 0.4s ease-in; color: #27ae60; font-weight: 700;">Reset your password</button>

          <br><br><br>

          <p class="text-left" style="font-size: 13px; color: #595959"> If you did not request a password reset, please feel free to ignore it. Be noted that this link will expire after use. </p>

          <p class="text-left" style="font-size: 13px; color: #595959"> Thanks, <br> Parkwood Greens Exeuctive Village Administrators </p>

          <br><hr>

          <small class="text-left" style="font-size: 13px; color: #4d4d4d;"> If you are having trouble accessing the password reset button, copy and paste the URL below into your web browser </small>

          <br><br>

          <a href="'. base_url() . 'login/reset_password_verification/' . $resetkey . '" style="font-size: 13px;">' . base_url() . 'login/reset_password_verification/' . $resetkey .' </a>
        </div>

      </div>

    </div>

    <br><br>

    <div id="footer" class="text-center" style="background-color: #f2f2f2; padding: 30px; font-family: \'Roboto\', sans-serif; color: #999999; font-weight: 700;">
      <p> 2017 Parkwood Greens Executive Village. All rights reserved </p>
      <br>
      <p> 420 Dino Street </p>
      <p> Pasig, Philippines </p>
    </div>

    <!-- jQuery (necessary for Bootstrap\'s JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
';
                    $this->email->message($message);
                    $this->email->send();

                    $this->session->set_flashdata('resetfeedback', 'The reset link has been successfully sent to your email. Please check your inbox.');
                    redirect('login/reset_password');
                }
                else
                {
                    redirect('login/reset_password');
                }
            }
            else
            {
                $this->session->set_flashdata('resetfail', 'There is no account associated with that email address. Please double-check the email address.');
                redirect('login/reset_password');
            }

        }
        else
        {
           echo "Fail";
        }
    }

    function reset_password_verification()
    {
        $resetkey = $this->uri->segment(3);

        if(!$resetkey)
        {
            $this->session->set_flashdata('resetfail', 'Unable to proceed to the password resetting process. Please make sure the reset link has not expired yet or the link is from the email.');
            $this->template->load('template','view_resetpassword');
        }
        else
        {
            $this->load->model('model_accounts');

            if($this->model_accounts->checkreset_key($resetkey) == 1)
            {
                $this->template->load('template', 'view_resetpasswordverification');
            }
            else
            {
                $this->session->set_flashdata('resetfail', 'Unable to proceed to the password resetting process. Please make sure the reset link has not expired yet or the link is from the email.');
                $this->template->load('template','view_resetpassword');
            } 
        }  
    }

    function reset_password_validation()
    {
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('confpassword', 'Confirm Password', 'required|matches[password]');
        if ($this->form_validation->run())
        {
            $this->load->model('model_accounts');
            $this->model_accounts->reset_password();

            $this->session->set_flashdata('resetvfeedback', 'You have successfully reset your password.');
            $this->template->load('template', 'view_resetpasswordverification');
            $this->output->set_header('refresh:2; url=' . base_url());

        }
        else
        {
            $this->template->load('template', 'view_resetpasswordverification');
        }
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
