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
    
	function index()
	{
        $data['totalfire'] = $this->model_statistics->count_totalfire();
        $data['progressfire'] = $this->model_statistics->count_progressfire();
        $data['closedfire'] = $this->model_statistics->count_closedfire();
    	$data['totalgrasscutting'] = $this->model_statistics->count_totalgrasscutting();
    	$data['progressgrasscutting'] = $this->model_statistics->count_progressgrasscutting();
    	$data['closedgrasscutting'] = $this->model_statistics->count_closedgrasscutting();
        $data['totalgarbage'] = $this->model_statistics->count_totalgarbage();
        $data['progressgarbage'] = $this->model_statistics->count_progressgarbage();
        $data['closedgarbage'] = $this->model_statistics->count_closedgarbage();
        $data['totalpest'] = $this->model_statistics->count_totalpest();
        $data['progresspest'] = $this->model_statistics->count_progresspest();
        $data['closedpest'] = $this->model_statistics->count_closedpest();
        $data['totalpost'] = $this->model_statistics->count_totalpost();
        $data['progresspost'] = $this->model_statistics->count_progresspost();
        $data['closedpost'] = $this->model_statistics->count_closedpost();
        $data['totalpipeline'] = $this->model_statistics->count_totalpipeline();
        $data['progresspipeline'] = $this->model_statistics->count_progresspipeline();
        $data['closedpipeline'] = $this->model_statistics->count_closedpipeline();
        $data['totaldrainage'] = $this->model_statistics->count_totaldrainage();
        $data['progressdrainage'] = $this->model_statistics->count_progressdrainage();
        $data['closeddrainage'] = $this->model_statistics->count_closeddrainage();
        $data['totalshortcircuit'] = $this->model_statistics->count_totalshortcircuit();
        $data['progressshortcircuit'] = $this->model_statistics->count_progressshortcircuit();
        $data['closedshortcircuit'] = $this->model_statistics->count_closedshortcircuit();
        $data['totalmonthlydues'] = $this->model_statistics->count_totalmonthlydues();
        $data['progressmonthlydues'] = $this->model_statistics->count_progressmonthlydues();
        $data['closedmonthlydues'] = $this->model_statistics->count_closedmonthlydues();
        $data['totalothers'] = $this->model_statistics->count_totalothers();
        $data['progressothers'] = $this->model_statistics->count_progressothers();
        $data['closedothers'] = $this->model_statistics->count_closedothers();
        $data['totalrobbery'] = $this->model_statistics->count_totalrobbery();
        $data['progressrobbery'] = $this->model_statistics->count_progressrobbery();
        $data['closedrobbery'] = $this->model_statistics->count_closedrobbery();
        $data['totalbrokentube'] = $this->model_statistics->count_totalbrokentube();
        $data['progressbrokentube'] = $this->model_statistics->count_progressbrokentube();
        $data['closedbrokentube'] = $this->model_statistics->count_closedbrokentube();
        $data['totalsuspiciousperson'] = $this->model_statistics->count_totalsuspiciousperson();
        $data['progresssuspiciousperson'] = $this->model_statistics->count_progresssuspiciousperson();
        $data['closedsuspiciousperson'] = $this->model_statistics->count_closedsuspiciousperson();
        $data['totalcctv'] = $this->model_statistics->count_totalcctv();
        $data['progresscctv'] = $this->model_statistics->count_progresscctv();
        $data['closedcctv'] = $this->model_statistics->count_closedcctv();
    	$this->template->load('admin_template', 'view_adminstatistics', $data);
	}

}
