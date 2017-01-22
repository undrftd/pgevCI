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
        $config['max_size']             = '52428800';
        $config['max_width']            = 1920;
        $config['max_height']           = 1080;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file'))
        {
        	$this->model_forms_user->upload_carsticker();
        	$this->session->set_flashdata('carsuccess', 'File has been successfully uploaded. For the mean time, please wait for the forms to be processed by the admin.');          
        	redirect('user_forms/car_sticker');
        }
        else
        {
            $this->session->set_flashdata('carfail', $this->upload->display_errors());  
            redirect('user_forms/car_sticker');
	    }
	}	      

	function upload_workpermit()
	{
		$config['upload_path']          = 'C:/xampp/htdocs/pgevCI/application/uploads';
        $config['allowed_types']        = 'doc|docx|jpg|pdf|png';
        $config['max_size']             = '52428800';
        $config['max_width']            = 1920;
        $config['max_height']           = 1080;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file'))
        {
        	$this->model_forms_user->upload_workpermit();
        	$this->session->set_flashdata('permitsuccess', 'File has been successfully uploaded. For the mean time, please wait for the forms to be processed by the admin.');          
        	redirect('user_forms/work_permit');	
        }
        else
        {
            $this->session->set_flashdata('permitfail', $this->upload->display_errors());  
            redirect('user_forms/work_permit'); 
	    }
	}	        

	function upload_renovation()
	{
		$config['upload_path']          = 'C:/xampp/htdocs/pgevCI/application/uploads';
        $config['allowed_types']        = 'doc|docx|jpg|pdf|png';
        $config['max_size']             = '52428800';
        $config['max_width']            = 1920;
        $config['max_height']           = 1080;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file'))
        {
        	$this->model_forms_user->upload_renovation();
        	$this->session->set_flashdata('renovatesuccess', 'File has been successfully uploaded. For the mean time, please wait for the forms to be processed by the admin.');          
        	redirect('user_forms/renovation');	
        }
        else
        {
            $this->session->set_flashdata('renovatefail', $this->upload->display_errors());  
            redirect('user_forms/renovation');  
	    }
	}	              

}
