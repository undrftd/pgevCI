<?php

class Model_dues_user extends CI_Model{
  

  function get_rate()
  {
      $query = $this->db->select('*')->where('rateid',1)->get('rate', 1);
      return $query->row();
  }

 function setsession()
  {
    $query = $this->db->select('*')->where('userid', $this->session->userdata('userid'))->get('accounts', 1);
    $row = $query->row();

    $data = array(
            'monthly_dues' => $row->monthly_dues,
            'arrears' => $row->arrears
      );

    $this->session->set_userdata($data);

  }


}
