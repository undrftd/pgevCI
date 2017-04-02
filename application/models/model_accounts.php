<?php

class Model_accounts extends CI_Model {

    function validate()
    {
        $this->db->where('username', $this->input->post('username'));   
        $query = $this->db->get('accounts');
        $result = $query->row();

        if($query->num_rows() == 1)
        {
            $password = $this->input->post('password');
            $stored_hash = $result->password;
            if ($this->bcrypt->check_password($password, $stored_hash))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    function check_role()
    {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('role', 1);
        $query = $this->db->get('accounts');
        $result = $query->row();

        if($query->num_rows() == 1)
        {
             $data = array(
                'userid' => $result->userid,
                'username' => $result->username,
                'password' => $this->input->post('password'),
                'firstname' => $result->firstname,
                'lastname' => $result->lastname,
                'birthdate' => $result->birthdate,
                'middlename' => $result->middlename,
                'email' => $result->email,
                'address' => $result->address,
                'monthly_dues' => $result->monthly_dues,
                'arrears' => $result->arrears,
                'isAdmin' => true,
                'contactnum' => $result->contactnum,
                'role' => $result->role
            );
            $this->session->set_userdata($data);
            return true;
        }
        else
        {
            return false;
        }
    }

    function check_user()
    {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('role', 0);
        $query = $this->db->get('accounts');
        $result = $query->row();

        if($query->num_rows() == 1)
        {
             $data = array(
                'userid' => $result->userid,
                'username' => $result->username,
                'password' => $this->input->post('password'),
                'firstname' => $result->firstname,
                'lastname' => $result->lastname,
                'middlename' => $result->middlename,
                'birthdate' => $result->birthdate,
                'email' => $result->email,
                'address' => $result->address,
                'monthly_dues' => $result->monthly_dues,
                'arrears' => $result->arrears,
                'isAdmin' => false,
                'contactnum' => $result->contactnum,
                'role' => $result->role
            );
            $this->session->set_userdata($data);
            return true;
        }
        else
        {
            return false;
        }
    }

    function check_active()
    {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('isActive', 1);
        $query = $this->db->get('accounts');
        $result = $query->row();

        if($query->num_rows() == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function check_unverified()
    {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('isActive', 2);
        $query = $this->db->get('accounts');
        $result = $query->row();

        if($query->num_rows() == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function url_check_email()
    {
        $query= $this->db->select('email')->where('email', $this->input->post('email'))->get('accounts',1);
        
        if($query->num_rows() > 0)
        {
            $row = $query->row();
            if($row->email == $this->input->post('email'))
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }

    function update_resetkey($resetkey)
    {
        $reset_data = array(
                'reset_key' => $resetkey
            );
        $this->db->where('email', $this->input->post('email'));
        $this->db->update('accounts', $reset_data);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function reset_password()
    {
        $resetkey = $this->input->post('resetkey');

        $reset_data = array(
                'password' =>  $this->bcrypt->hash_password($this->input->post('password')),
                'reset_key' => ''
            );

        $this->db->where('reset_key', $resetkey);
        $this->db->update('accounts', $reset_data);
    }

    function checkreset_key($resetkey)
    {
        $this->db->where('reset_key', $resetkey);
        $this->db->from('accounts');
        return $this->db->count_all_results();
    }

    function checkemail_key($emailkey)
    {
        $this->db->where('email_key', $emailkey);
        $this->db->from('accounts');
        return $this->db->count_all_results();
    }

     function get_users($limit, $offset)
    {
       $this->db->limit($limit,$offset);
       $users = $this->db->select('*')->from('accounts')-> where('role', 0)-> where('isActive', 1)->get();

        if($users->num_rows() > 0)
        {
            return $users->result();
        }
        else
        {
            return $users->result();
        }
    }

    function count_homeowner()
    {
        $query = $this->db->select('*')->from('accounts')-> where('role', 0)-> where('isActive', 1)->get();
        return $query->num_rows();
    }

    function get_admin($limit, $offset)
    {
       $this->db->limit($limit,$offset);
       $admin = $this->db->select('*')->from('accounts')-> where('role', 1)-> where('isActive', 1)->get();

       if($admin->num_rows() > 0)
        {
            return $admin->result();
        }
        else
        {
            return $admin->result();
        }
    }

    function count_admin()
    {
        $query = $this->db->select('*')->from('accounts')-> where('role', 1)-> where('isActive', 1)->get();
        return $query->num_rows();
    }

    function get_deact($limit, $offset)
    {
       $this->db->limit($limit,$offset);
       $deact = $this->db->select('*')->from('accounts')-> where('isActive', 0)->get();

       if($deact->num_rows() > 0)
       {
            return $deact->result();
       }
       else
       {
            return $deact->result();
       }
    }

    function count_deact()
    {
        $query = $this->db->select('*')->from('accounts')-> where('isActive', 0)->get();
        return $query->num_rows();
    }


    function create_account()
    {
        $emailkey = md5(uniqid());
        $new_account_insert_data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'middlename' => $this->input->post('middlename'),
            'birthdate' => $this->input->post('birthdate'),
            'username' => $this->input->post('username'),
            'password' => $this->bcrypt->hash_password($this->input->post('password')),
            'address' => $this->input->post('address'),
            'email' => $this->input->post('email'),
            'contactnum' => $this->input->post('contactnum'),
            'role' => $this->input->post('role'),
            'email_key' => $emailkey
        );
        $this->load->library("email");

                    $this->email->from('pgevadmin@parkwoodgreens.com', 'Parkwood Greens Executive Village Administration');
                    $this->email->to($this->input->post('email'));
                    $this->email->set_mailtype('html');
                    $array = $this->session->userdata('firstname');
                    $this->email->subject("Email Verification - Parkwood Greens Executive Village CRM");
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

  <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
    <tr>
      <td align="center" valign="top">
          <table border="0" cellpadding="20" cellspacing="0" width="600" id="emailContainer">
              <tr>
                  <td align="center" valign="top">
                      <table border="0" cellpadding="20" cellspacing="0" width="100%" id="emailHeader">
                          <tr>
                              <td align="center" valign="top">
                                <div id="header" class="text-center" style="background-color: #f2f2f2; padding: 30px;">
                                  <p style="font-family: \'Roboto\', sans-serif; color: #999999; font-weight: 700; font-size: 20px;">Parkwood Greens Executive Village CRM</p>
                                </div>

                                <br>

                              </td>
                          </tr>
                      </table>
                  </td>
              </tr>
              <tr>
                  <td align="center" valign="top">
                      <table border="0" cellpadding="20" cellspacing="0" width="100%" id="emailBody">
                          <tr>
                              <td align="center" valign="top">

                                <div class="row" style="font-family: \'Roboto\', sans-serif;">

                                  <div id="content" class="text-center" style="padding: 10px; line-height: 25px;">

                                    <strong><p class="text-left" style="font-size: 16px;"> Hello </p></strong>

                                    <p class="text-left" style="font-size: 13px; color: #595959"> You recently requested for a PGEV-CRM account. Please click the button below to verify your email address. </p>

                                    <br>

                                    <a href="'. base_url() . 'login/email_verification/' . $emailkey . '"><button type="submit" class="btn btn-custom-4" style="background-color: white; border: 2px solid #27ae60; padding: 15px; width: 60%; border-radius: 2px; font-size: 0.95em; opacity: 1; transition: all 0.4s ease-in; color: #27ae60; font-weight: 700;">Verify Your Email</button></a>

                                    <br><br><br>

                                    <p class="text-left" style="font-size: 13px; color: #595959"> Thanks, <br> Parkwood Greens Executive Village Administrators </p>

                                    <br><hr>

                                    <small class="text-left" style="font-size: 13px; color: #4d4d4d;"> If you are having trouble accessing the password reset button, copy and paste the URL below into your web browser </small>

                                    <br><br>

                                    <a href="'. base_url() . 'login/email_verification/' . $emailkey . '" style="font-size: 13px;">' . base_url() . 'login/email_verification/' . $emailkey .' </a> <br><br>

                                  </div>

                                </div>

                              </td>

                          </tr>
                      </table>
                  </td>
              </tr>
              <tr>
                  <td align="center" valign="top">
                      <table border="0" cellpadding="20" cellspacing="0" width="100%" id="emailFooter">
                          <tr>
                              <td align="center" valign="top">
                                <div id="footer" class="text-center" style="background-color: #f2f2f2; padding: 30px; font-family: \'Roboto\', sans-serif; color: #999999; font-weight: 700;">
                                  <p> 2017 Parkwood Greens Executive Village. All rights reserved </p>
                                  <br>
                                  <p> Pasig City, Philippines </p>
                                </div>
                              </td>
                          </tr>
                      </table>
                  </td>
              </tr>
          </table>
      </td>
    </tr>
  </table>



    <!-- jQuery (necessary for Bootstrap\'s JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
';
                    $this->email->message($message);
                    $this->email->send();

         $insert = $this->db->insert('accounts', $new_account_insert_data);
         return $insert;
    }

    function verify_email()
    {
        $emailkey = $this->uri->segment(3);
        $email_data = array(
                'isActive' =>  1,
                'email_key' => ''
            );

        $this->db->where('email_key', $emailkey);
        $this->db->update('accounts', $email_data);
    }

    function countuser_search($searchquery)
    {
         $query = $this->db->select('*')
                            ->from('accounts')
                            ->where('(role = 0 AND isActive = 1)',NULL,FALSE)
                            ->where('(CONCAT(firstname," ",lastname) LIKE "%'.$searchquery .'%" OR firstname LIKE "%'.$searchquery .'%" OR lastname LIKE "%'.$searchquery .'%" OR username LIKE "%'.$searchquery .'%" OR address LIKE "%'.$searchquery .'%" )',NULL,FALSE)->get();
         return $query->num_rows();
    }

    function countadmin_search($searchquery)
    {
         $query = $this->db->select('*')
                            ->from('accounts')
                            ->where('(role = 1 AND isActive = 1)',NULL,FALSE)
                            ->where('(CONCAT(firstname," ",lastname) LIKE "%'.$searchquery .'%" OR firstname LIKE "%'.$searchquery .'%" OR lastname LIKE "%'.$searchquery .'%" OR username LIKE "%'.$searchquery .'%" OR address LIKE "%'.$searchquery .'%" )',NULL,FALSE)->get();
         return $query->num_rows();
    }

    function countdeact_search($searchquery)
    {
         $query = $this->db->select('*')
                            ->from('accounts')
                            ->where('(isActive = 0)',NULL,FALSE)
                            ->where('(CONCAT(firstname," ",lastname) LIKE "%'.$searchquery .'%" OR firstname LIKE "%'.$searchquery .'%" OR lastname LIKE "%'.$searchquery .'%" OR username LIKE "%'.$searchquery .'%" OR address LIKE "%'.$searchquery .'%" )',NULL,FALSE)->get();
         return $query->num_rows();
    }

    function search_homeowner($searchquery)
    {
      $this->db->select('*')->from('accounts');
      $this->db->where('(role = 0 AND isActive = 1)',NULL,FALSE);
      $this->db->where('(CONCAT(firstname," ",lastname) LIKE "%'.$searchquery .'%" OR firstname LIKE "%'.$searchquery .'%" OR lastname LIKE "%'.$searchquery .'%" OR username LIKE "%'.$searchquery .'%" OR address LIKE "%'.$searchquery .'%" )',NULL,FALSE);
      $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return $query->result();
        }

    }

    function search_admin($searchquery)
    {
      $this->db->select('*')->from('accounts');
      $this->db->where('(role = 1 AND isActive = 1)',NULL,FALSE);
      $this->db->where('(CONCAT(firstname," ",lastname) LIKE "%'.$searchquery .'%" OR firstname LIKE "%'.$searchquery .'%" OR lastname LIKE "%'.$searchquery .'%" OR username LIKE "%'.$searchquery .'%" OR address LIKE "%'.$searchquery .'%" )',NULL,FALSE);
      $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return $query->result();
        }

    }

    function search_deact($searchquery)
    {
      $this->db->select('*')->from('accounts');
      $this->db->where('(isActive = 0)',NULL,FALSE);
      $this->db->where('(CONCAT(firstname," ",lastname) LIKE "%'.$searchquery .'%" OR firstname LIKE "%'.$searchquery .'%" OR lastname LIKE "%'.$searchquery .'%" OR username LIKE "%'.$searchquery .'%" OR address LIKE "%'.$searchquery .'%" )',NULL,FALSE);
      $query = $this->db->get();


        if($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return $query->result();
        }

    }

    function viewmore_user($userid)
    {
         $query= $this->db->select('*')->where('userid', $userid)->where('role', 0)->get('accounts',1);
         return $query->row();
    }

    function viewmore_admin($userid)
    {
         $query= $this->db->select('*')->where('userid', $userid)->where('role', 1)->get('accounts',1);
         return $query->row();
    }

    function viewmore_deact($userid)
    {
         $query= $this->db->select('*')->where('userid', $userid)->where('isActive', 0)->get('accounts',1);
         return $query->row();
    }

    function url_check_myaccount($userid)
    {
        if($userid == $this->session->userdata('userid'))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    function url_check_user($userid)
    {
        $query= $this->db->select('userid')->where('userid', $userid)->where('role', 0)->where('isActive', 1)->get('accounts',1);
        $row = $query->row();

        if($query->num_rows() > 0)
        {
            if($userid == $row->userid)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }

    function url_check_admin($userid)
    {
        $query= $this->db->select('userid')->where('userid', $userid)->where('role', 1)->where('isActive', 1)->get('accounts',1);
        $row = $query->row();

        if($query->num_rows() > 0)
        {
            if($userid == $row->userid)
            {
                 return TRUE;
            }
            else
            {
                 return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }

    function url_check_deact($userid)
    {
        $query= $this->db->select('userid')->where('userid', $userid)->where('isActive', 0)->get('accounts',1);
        $row = $query->row();

        if($query->num_rows() > 0)
        {
            if($userid == $row->userid)
            {
                 return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }

    function acc_delete($userid)
    {
        $this->db->where('userid', $userid);
        $delete = $this->db->delete('accounts');
        return $delete;
    }

    function acc_update($userid)
    {
         $account_update_data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'middlename' => $this->input->post('middlename'),
            'birthdate' => $this->input->post('birthdate'),
            'username' => $this->input->post('username'),
            'address' => $this->input->post('address'),
            'email' => $this->input->post('email'),
            'contactnum' => $this->input->post('contactnum'),
            'role' => $this->input->post('role')
        );

        /* $account_update_other = array(
            'userid' => $this->input->post('userid')
        );

         $this->db->where('username', $username);
         $this->db->update('announcements', $account_update_other);
         $this->db->where('username', $username);
         $this->db->update('bulletin', $account_update_other);
         $this->db->where('username', $username);
         $this->db->update('upload_carsticker', $account_update_other);
         $this->db->where('username', $username);
         $this->db->update('upload_renovation', $account_update_other);
         $this->db->where('username', $username);
         $this->db->update('upload_workpermit', $account_update_other);
         $this->db->where('username', $username);
         $this->db->update('clubhouse_reservation', $account_update_other);
         $this->db->where('username', $username);
         $this->db->update('courtone_reservation', $account_update_other);
         $this->db->where('username', $username);
         $this->db->update('courttwo_reservation', $account_update_other);
         $this->db->where('username', $username);
         $this->db->update('tickets', $account_update_other);*/
         
         $this->db->where('userid', $userid);
         return $this->db->update('accounts', $account_update_data);
         
     }

    function myaccount_update($userid)
    {
         $account_update_data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'middlename' => $this->input->post('middlename'),
            'birthdate' => $this->input->post('birthdate'),
            'username' => $this->input->post('username'),
            'password' => $this->bcrypt->hash_password($this->input->post('password')),
            'address' => $this->input->post('address'),
            'email' => $this->input->post('email'),
            'contactnum' => $this->input->post('contactnum'),
        );

         $password_update_data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'middlename' => $this->input->post('middlename'),
            'birthdate' => $this->input->post('birthdate'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'address' => $this->input->post('address'),
            'email' => $this->input->post('email'),
            'contactnum' => $this->input->post('contactnum'),
        );

         /*$account_update_other = array(
            'username' => $this->input->post('username')
        ); */
         
         $this->session->set_userdata($password_update_data);

         $this->db->where('userid', $userid);
         $update = $this->db->update('accounts', $account_update_data);
         return $update;
    }


    function acc_deact($userid)
    {
        $date = date("m/d/Y", now());
        $account_deact_data = array('isActive' => 0, 'date_deactivated' => $date);
        $this->db->where('userid', $userid);
        $deact = $this->db->update('accounts', $account_deact_data);
        return $deact;
    }

    function acc_reactivate($userid)
    {
        $account_react_data = array('isActive' => 1, 'date_deactivated' => "");
        $this->db->where('userid', $userid);
        $reactivate = $this->db->update('accounts', $account_react_data);
        return $reactivate;
    }

    function checksession()
    {
        $query = $this->db->select('*')->from('accounts')->where('userid', $this->session->userdata('userid'))->get();

        return $query->row();
    }

    function getemail_user()
    {
        $query = $this->db->select('email')->from('accounts')->where('role', 0)->get();
        return $query->result_array();
    }

    function getemail_admin()
    {
        $query = $this->db->select('email')->from('accounts')->where('role', 1)->get();
        return $query->result_array();
    }

    function getsingle_mail($userid)
    {
        $query = $this->db->select('email')->from('accounts')->where('userid', $userid)->get();
        return $query->result_array();
    }

    function getall_mail()
    {
        $query = $this->db->select('email')->from('accounts')->get();
        return $query->result_array();
    }
}
