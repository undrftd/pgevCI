<?php

class User_announcements extends MY_Controller
{
    function index()
    {
      $this->template->load('user_template','view_userannouncements');
    }

}
