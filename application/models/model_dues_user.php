<?php

class Model_dues_user extends CI_Model{


  function first_last($userid)
  {
      $query = $this->db->select('*')->where('userid', $userid)->select("CONCAT(' ', firstname, lastname) AS name", FALSE);


      if ($query->num_rows() > 0)
          {
              return $query->result();
          }
          else
          {
              return FALSE;
          }
  }

  function setsession()
  {
    $query = $this->db->select('*')->where('userid', $this->session->userdata('userid'))->get('accounts', 1);
    $row = $query->row();

    $data = array(
        'monthly_dues' => $row->monthly_dues,
        'arrears' => $row->arrears,
      );
    $this->session->set_userdata($data);
  }

  function total_value($userid)
  {
    $total = $this->db->select('*')->where('userid', $userid)->select('SUM(monthly_dues) + SUM(arrears) as total', FALSE);


    if ($total->num_rows() > 0)
        {
            return $total->result();
        }
        else
        {
            return FALSE;
        }
  }




}

?>
