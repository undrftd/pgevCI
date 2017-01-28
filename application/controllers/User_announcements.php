<?php

class User_announcements extends MY_Controller
{
    function announcements()
    {
      $data['order'] = $this->model_announcements_user->select_announcements();
      $this->template->load('user_template','view_userannouncements',$data);
    }

}
