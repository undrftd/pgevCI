<?php

class Model_forms_user extends CI_Model {

	function upload_carsticker()
	{
		$this->db->insert('upload_carsticker', array('filename' => $this->upload->file_name, 'userid' => $this->session->userdata('userid')));
	}

	function upload_workpermit()
	{
		$this->db->insert('upload_workpermit', array('filename' => $this->upload->file_name, 'userid' => $this->session->userdata('userid')));
	}

	function upload_renovation()
	{
		$this->db->insert('upload_renovation', array('filename' => $this->upload->file_name, 'userid' => $this->session->userdata('userid')));
	}

}

