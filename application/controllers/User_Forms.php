<?php

class User_Forms extends MY_Controller {

	public function car_sticker()
	{
		$this->template->load('user_template', 'view_userforms_carsticker', array('error' => ' ' ));	
	}

	function work_permit()
	{
		$this->template->load('user_template', 'view_userforms_workpermit');
	}

	function renovation()
	{
		$this->template->load('user_template', 'view_userforms_renovation');
	}

	function download($filename) 
	{
		$path = 'C:/xampp/htdocs/pgevCI/application/downloads/' . $filename;
        $data = file_get_contents($path);
		$name = $filename;

		force_download($name, $data);
	}    

	function upload_carsticker()
	{
		$config['upload_path']          = 'C:/xampp/htdocs/pgevCI/application/uploads';
        $config['allowed_types']        = 'doc|docx|jpg|pdf|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file'))
        {
        	$this->model_forms_user->upload_carsticker();
        	$this->session->set_flashdata('carsuccess', 'Success');          
        	$this->template->load('user_template', 'view_userforms_carsticker'); 	
        }
        else
        {
            $this->session->set_flashdata('carfail', 'Failed');  
            $this->template->load('user_template', 'view_userforms_carsticker');
	    }
	}	      

	function upload_workpermit()
	{
		$config['upload_path']          = 'C:/xampp/htdocs/pgevCI/application/uploads';
        $config['allowed_types']        = 'doc|docx|jpg|pdf|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file'))
        {
        	$this->model_forms_user->upload_workpermit();
        	$this->session->set_flashdata('permitsuccess', 'Success');          
        	$this->template->load('user_template', 'view_userforms_workpermit'); 	
        }
        else
        {
            $this->session->set_flashdata('permitfail', 'Failed');  
            $this->template->load('user_template', 'view_userforms_workpermit');
	    }
	}	        

	function upload_renovation()
	{
		$config['upload_path']          = 'C:/xampp/htdocs/pgevCI/application/uploads';
        $config['allowed_types']        = 'doc|docx|jpg|pdf|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file'))
        {
        	$this->model_forms_user->upload_renovation();
        	$this->session->set_flashdata('renovatesuccess', 'Success');          
        	$this->template->load('user_template', 'view_userforms_renovation'); 	
        }
        else
        {
            $this->session->set_flashdata('renovatefail', 'Failed');  
            $this->template->load('user_template', 'view_userforms_renovation');
	    }
	}	              

}
