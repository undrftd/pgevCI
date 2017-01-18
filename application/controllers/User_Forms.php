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

	function do_upload()
	{
		$config['upload_path']          = '/uploads/';
        $config['allowed_types']        = 'doc|docx|pdf|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['filename']  			= url_title($this->input->post('file'));

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file'))
        {
        	$this->db->insert('form_uploads', array('filename' => $this->upload->filename));
        	$this->session->set_flashdata('msg', 'Success');
            
        $this->template->load('user_template', 'view_userforms_workpermit'); 
        }
        /*else
        {
            $error = array('error' => $this->upload->display_errors());

            $this->template->load('user_template', 'view_userforms_renovation', $error);
	    }*/
	}	               

}
