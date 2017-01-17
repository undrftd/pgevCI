<?php

class Model_dues_user extends CI_Model{

  function url_check_myaccount($userid)
  {
    $query = $this->db->select('*')->where('userid' , $userid);
    if ('userid == $userid')
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }

  }
}

?>
