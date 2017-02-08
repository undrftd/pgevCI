<?php

class Admin_Statistics extends MY_Controller {

	function __construct()
    {   
      parent::__construct();

      $session_admin = $this->session->userdata('isAdmin');
      $method = $this->router->fetch_method();

      if(($session_admin == FALSE) && $method != 'login')
      {
          $this->session->set_flashdata( 'message', 'You need to login to access this location' );
          redirect('user_home');
      }
    }
    
	public function index()
	{
		$data['totalgrasscutting'] = $this->model_statistics->count_totalgrasscutting();
		$data['progressgrasscutting'] = $this->model_statistics->count_progressgrasscutting();
		$data['closedgrasscutting'] = $this->model_statistics->count_closedgrasscutting();
		$this->template->load('admin_template', 'view_adminstatistics', $data);
	}

}
