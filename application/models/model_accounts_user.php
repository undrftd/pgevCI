<?php
class Model_accounts_user extends CI_Model {

  function url_check_myaccount($username)
  {

      if($username == $this->session->userdata('username'))
      {
          return TRUE;
      }
      else
      {
          return FALSE;
      }
  }


  function myaccount_userupdate($username)
  {
       $account_update_data = array(
          'password' => $this->bcrypt->hash_password($this->input->post('password')),
          'email' => $this->input->post('email'),
          'contactnum' => $this->input->post('contactnum'),
      );
       $this->session->set_userdata($account_update_data);
       $this->db->select('*')->where('username', $username);
       $update = $this->db->update('accounts', $account_update_data);
       return $update;
  }
}
