<?php
class Model_accounts_user extends CI_Model {

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


  function myaccount_userupdate($userid)
  {
       $account_update_data = array(

          'password' => $this->input->post('password'),
          'email' => $this->input->post('email'),
          'contactnum' => $this->input->post('contactnum'),
      );
       $this->session->set_userdata($account_update_data);
       $this->db->select('*')->where('userid', $userid);
       $update = $this->db->update('accounts', $account_update_data);
       return $update;
  }
}
